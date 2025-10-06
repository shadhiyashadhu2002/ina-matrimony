<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\ServerDataModel;

class DataMigrationController extends Controller
{
    /**
     * Sync users from server database to local matrimony database
     */
    public function syncUsers(Request $request)
    {
        try {
            // Get users from server database
            $serverUsers = DB::connection('server_mysql')
                ->table('users')
                ->limit($request->get('limit', 50))
                ->get();
            
            $imported = 0;
            $skipped = 0;
            
            foreach ($serverUsers as $serverUser) {
                // Check if user already exists in local database
                $existingUser = User::where('email', $serverUser->email)->first();
                
                if (!$existingUser) {
                    // Create new user in local matrimony database
                    User::create([
                        'name' => $serverUser->name,
                        'email' => $serverUser->email,
                        'password' => $serverUser->password ?? bcrypt('default123'),
                        'created_at' => $serverUser->created_at ?? now(),
                        'updated_at' => $serverUser->updated_at ?? now(),
                    ]);
                    $imported++;
                } else {
                    $skipped++;
                }
            }
            
            return response()->json([
                'success' => true,
                'message' => "Data sync completed",
                'imported' => $imported,
                'skipped' => $skipped,
                'total_processed' => $serverUsers->count()
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Get server database tables and their row counts
     */
    public function getServerStats()
    {
        try {
            $tables = DB::connection('server_mysql')->select('SHOW TABLES');
            $stats = [];
            
            foreach ($tables as $table) {
                $tableName = array_values((array) $table)[0];
                $count = DB::connection('server_mysql')
                    ->table($tableName)
                    ->count();
                    
                $stats[] = [
                    'table' => $tableName,
                    'rows' => $count
                ];
            }
            
            return response()->json([
                'server_database' => env('SERVER_DB_DATABASE'),
                'tables' => $stats
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Compare data between server and local databases
     */
    public function compareData()
    {
        try {
            // Local database stats
            $localUsers = User::count();
            
            // Server database stats
            $serverUsers = DB::connection('server_mysql')->table('users')->count();
            
            return response()->json([
                'local_matrimony' => [
                    'database' => env('DB_DATABASE'),
                    'users' => $localUsers
                ],
                'server_database' => [
                    'database' => env('SERVER_DB_DATABASE'),
                    'users' => $serverUsers
                ],
                'difference' => $serverUsers - $localUsers
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}