<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/test-databases', function () {
    $results = [];
    
    // Test local matrimony database
    try {
        DB::connection()->getPdo();
        $results['local_matrimony'] = [
            'status' => 'SUCCESS',
            'database' => DB::connection()->getDatabaseName(),
            'tables' => DB::select('SHOW TABLES')
        ];
    } catch (Exception $e) {
        $results['local_matrimony'] = [
            'status' => 'FAILED',
            'error' => $e->getMessage()
        ];
    }
    
    // Test server database
    try {
        DB::connection('server_db')->getPdo();
        $results['server_database'] = [
            'status' => 'SUCCESS',
            'database' => DB::connection('server_db')->getDatabaseName(),
            'tables' => DB::connection('server_db')->select('SHOW TABLES')
        ];
    } catch (Exception $e) {
        $results['server_database'] = [
            'status' => 'FAILED',
            'error' => $e->getMessage()
        ];
    }
    
    return response()->json($results, 200, [], JSON_PRETTY_PRINT);
});