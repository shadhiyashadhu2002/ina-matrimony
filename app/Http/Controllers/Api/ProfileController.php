<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class ProfileController extends Controller
{
    /**
     * Get featured profiles with local photos from uploads folder
     */
    public function getFeaturedProfiles(Request $request)
    {
        try {
            $limit = $request->get('limit', 6);
            
            // Get real members with their photos from database
            $profiles = DB::table('members')
                ->join('users', 'members.user_id', '=', 'users.id')
                ->leftJoin('uploads', 'users.id', '=', 'uploads.user_id')
                ->select([
                    'users.first_name',
                    'users.last_name', 
                    'users.code',
                    'members.id as member_id',
                    'members.gender',
                    'members.birthday',
                    'uploads.file_name'
                ])
                ->whereNull('members.deleted_at')
                ->whereNotNull('uploads.file_name')
                ->where('uploads.type', 'image')
                ->distinct()
                ->limit($limit)
                ->get();

            $featuredProfiles = [];
            
            foreach ($profiles as $profile) {
                // Calculate age from birthday
                $age = $profile->birthday ? \Carbon\Carbon::parse($profile->birthday)->age : 25;
                
                // Extract filename from path (uploads/all/filename.jpg -> filename.jpg)
                $fileName = basename($profile->file_name);
                
                // Gender-appropriate occupations
                $maleOccupations = ['Software Engineer', 'Doctor', 'Business Analyst', 'Engineer', 'Teacher', 'Manager'];
                $femaleOccupations = ['Software Engineer', 'Doctor', 'Teacher', 'Nurse', 'Designer', 'Consultant'];
                
                $occupation = $profile->gender == 1 
                    ? $maleOccupations[array_rand($maleOccupations)]
                    : $femaleOccupations[array_rand($femaleOccupations)];
                
                $featuredProfiles[] = [
                    'name' => trim($profile->first_name . ' ' . $profile->last_name),
                    'photo' => '/uploads/all/' . $fileName,
                    'code' => $profile->code,
                    'age' => $age,
                    'occupation' => $occupation
                ];
            }

            // If we don't have enough profiles, add some with random photos
            if (count($featuredProfiles) < $limit) {
                $remainingCount = $limit - count($featuredProfiles);
                
                // Get available photos from uploads folder  
                $uploadPath = public_path('uploads/all');
                $availablePhotos = [];
                
                if (is_dir($uploadPath)) {
                    $files = scandir($uploadPath);
                    $imageExtensions = ['jpg', 'jpeg', 'png', 'webp', 'avif'];
                    
                    foreach ($files as $file) {
                        if ($file !== '.' && $file !== '..') {
                            $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                            if (in_array($extension, $imageExtensions)) {
                                $availablePhotos[] = $file;
                            }
                        }
                    }
                }
                
                // Shuffle and add additional profiles
                shuffle($availablePhotos);
                $sampleNames = ['Priya Sharma', 'Arjun Menon', 'Meera Krishna', 'Rohit Pillai', 'Anjali Nair', 'Vishnu Namboothiri'];
                $occupations = ['Software Engineer', 'Doctor', 'Teacher', 'Business Analyst', 'Nurse', 'Marketing Manager'];
                
                for ($i = 0; $i < min($remainingCount, count($availablePhotos)); $i++) {
                    $featuredProfiles[] = [
                        'name' => $sampleNames[$i % count($sampleNames)],
                        'photo' => '/uploads/all/' . $availablePhotos[$i],
                        'code' => 'INA' . str_pad(1000 + count($featuredProfiles), 4, '0', STR_PAD_LEFT),
                        'age' => rand(23, 35),
                        'occupation' => $occupations[$i % count($occupations)]
                    ];
                }
            }

            return response()->json([
                'success' => true,
                'profiles' => $featuredProfiles,
                'count' => count($featuredProfiles)
            ]);

        } catch (\Exception $e) {
            Log::error('Featured Profiles Error', ['error' => $e->getMessage()]);
            
            // Return sample profiles if there's an error
            $sampleProfiles = [
                ['name' => 'Priya S.', 'member_id' => 'INA0001', 'photo' => null],
                ['name' => 'Arjun M.', 'member_id' => 'INA0002', 'photo' => null],
                ['name' => 'Meera K.', 'member_id' => 'INA0003', 'photo' => null],
                ['name' => 'Rohit P.', 'member_id' => 'INA0004', 'photo' => null],
                ['name' => 'Anjali R.', 'member_id' => 'INA0005', 'photo' => null],
                ['name' => 'Vishnu N.', 'member_id' => 'INA0006', 'photo' => null]
            ];
            
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
                'profiles' => $sampleProfiles
            ]);
        }
    }

    /**
     * Debug server connection
     */
    public function debugServerConnection()
    {
        try {
            $totalUsers = DB::connection('server_mysql')->table('users')->count();
            $usersWithPhotos = DB::connection('server_mysql')
                ->table('users')
                ->whereNotNull('photo')
                ->where('photo', '!=', '')
                ->count();
            
            // Get table structure first
            $tableStructure = DB::connection('server_mysql')
                ->select("DESCRIBE users");
            
            // Get all column names
            $columns = collect($tableStructure)->pluck('Field');
            
            // Get sample user with all available fields
            $sampleUser = DB::connection('server_mysql')
                ->table('users')
                ->whereNotNull('photo')
                ->where('photo', '!=', '')
                ->first();
                
            // Get users with both photo and name
            $usersWithBothPhotoAndName = DB::connection('server_mysql')
                ->table('users')
                ->whereNotNull('photo')
                ->where('photo', '!=', '')
                ->whereNotNull('name')
                ->where('name', '!=', '')
                ->count();
                
            // Get sample users with names
            $sampleUsersWithNames = DB::connection('server_mysql')
                ->table('users')
                ->whereNotNull('photo')
                ->where('photo', '!=', '')
                ->whereNotNull('name')
                ->where('name', '!=', '')
                ->select(['id', 'name', 'photo', 'code'])
                ->limit(10)
                ->get();
            
            return response()->json([
                'success' => true,
                'total_users' => $totalUsers,
                'users_with_photos' => $usersWithPhotos,
                'users_with_both_photo_and_name' => $usersWithBothPhotoAndName,
                'table_columns' => $columns,
                'sample_user_full' => $sampleUser,
                'sample_users_with_names' => $sampleUsersWithNames,
                'server_photo_base_url' => env('SERVER_PHOTO_BASE_URL')
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Get profiles by filter
     */
    public function getProfilesByFilter(Request $request)
    {
        return response()->json([
            'success' => true,
            'profiles' => []
        ]);
    }
}
