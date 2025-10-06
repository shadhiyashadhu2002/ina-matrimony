<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return view('login-success', ['user' => Auth::user()]);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function register(Request $request)
    {
        // Log the incoming request for debugging
        Log::info('Registration attempt', $request->all());
        
        try {
            // Validate basic fields
            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'gender' => 'required|in:male,female',
                'date_of_birth' => 'required|date',
                'email_phone' => 'required|string|max:255',
                'password' => 'required|string|min:8',
                'confirm_password' => 'required|string|same:password',
                'on_behalf' => 'required|string',
                'terms' => 'required|accepted',
            ]);

            // Check for uniqueness based on whether it's email or phone
            $isEmail = filter_var($request->email_phone, FILTER_VALIDATE_EMAIL);
            
            if ($isEmail) {
                // Check email uniqueness
                if (DB::table('users')->where('email', $request->email_phone)->exists()) {
                    return back()->withErrors(['email_phone' => 'This email is already registered.'])->withInput();
                }
            } else {
                // Check phone uniqueness and validate phone format
                if (strlen($request->email_phone) > 20) {
                    return back()->withErrors(['email_phone' => 'Phone number is too long (max 20 characters).'])->withInput();
                }
                if (DB::table('users')->where('phone', $request->email_phone)->exists()) {
                    return back()->withErrors(['email_phone' => 'This phone number is already registered.'])->withInput();
                }
            }
            
            Log::info('Validation passed');

            // Generate unique code for user
            $userCount = DB::table('users')->count() + 1;
            $code = 'INA' . str_pad($userCount, 6, '0', STR_PAD_LEFT);

            // Determine if input is email or phone
            $isEmail = filter_var($request->email_phone, FILTER_VALIDATE_EMAIL);
            $email = $isEmail ? $request->email_phone : null;
            $phone = !$isEmail ? $request->email_phone : null;

            // Create user in local database
            $user = User::create([
                'user_type' => 'member',
                'code' => $code,
                'membership' => 1,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'name' => $request->first_name . ' ' . $request->last_name,
                'email' => $email,
                'phone' => $phone,
                'phone2' => '',
                'password' => Hash::make($request->password),
                'photo_approved' => 1,
                'approved' => 1,
                'balance' => 0,
                'email_verified_at' => now(),
            ]);

            Log::info('User created', ['user_id' => $user->id, 'code' => $code]);

            // Insert detailed member information
            DB::table('members')->insert([
                'user_id' => $user->id,
                'gender' => $request->gender,
                'birthday' => $request->date_of_birth,
                'introduction' => 'Welcome to Ina Matrimony! Looking for a life partner.',
                'remaining_interest' => 50,
                'remaining_contact_view' => 25,
                'remaining_profile_viewer_view' => 100,
                'remaining_profile_image_view' => 100,
                'remaining_gallery_image_view' => 100,
                'remaining_photo_gallery' => 20,
                'auto_profile_match' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            Log::info('Member record created');

            // Return success response
            return back()->with('success', 'Registration successful! Welcome to Ina Matrimony. Your member code is: ' . $code);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed', ['errors' => $e->errors()]);
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Registration failed', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return back()->withErrors(['registration' => 'Registration failed: ' . $e->getMessage()])->withInput();
        }
    }

    public function showSuccess()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('login-success', ['user' => Auth::user()]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

    public function showProfile()
    {
        return view('my-profile');
    }
}
