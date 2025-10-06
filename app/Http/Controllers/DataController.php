<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\ServerDataModel;

class DataController extends Controller
{
    /**
     * Fetch data from local matrimony database
     */
    public function getLocalData()
    {
        // This uses your local 'matrimony' database (default connection)
        $localUsers = User::all();
        
        return response()->json([
            'source' => 'local_matrimony_db',
            'users' => $localUsers
        ]);
    }
    
    /**
     * Fetch data from server database
     */
    public function getServerData()
    {
        try {
            // This uses your server database
            $serverUsers = ServerDataModel::getServerUsers(10);
            
            return response()->json([
                'source' => 'server_db',
                'users' => $serverUsers
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Could not connect to server database',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Fetch data from both databases and merge
     */
    public function getCombinedData()
    {
        try {
            // Local data
            $localUsers = User::select('id', 'name', 'email')->get();
            
            // Server data
            $serverUsers = ServerDataModel::getServerUsers(10);
            
            return response()->json([
                'local_users' => $localUsers,
                'server_users' => $serverUsers,
                'total_local' => $localUsers->count(),
                'total_server' => $serverUsers->count()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error fetching combined data',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Custom query example
     */
    public function customQuery(Request $request)
    {
        $database = $request->get('database', 'local'); // 'local' or 'server'
        
        if ($database === 'server') {
            try {
                $results = DB::connection('server_db')
                    ->table('users')
                    ->where('status', 'active')
                    ->get();
                    
                return response()->json([
                    'source' => 'server_db',
                    'results' => $results
                ]);
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        } else {
            // Local database query
            $results = DB::table('users')
                ->where('email_verified_at', '!=', null)
                ->get();
                
            return response()->json([
                'source' => 'local_matrimony_db',
                'results' => $results
            ]);
        }
    }
}