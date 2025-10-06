<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\DataMigrationController;
use App\Http\Controllers\Api\ProfileController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Database testing routes
Route::get('/test-local-db', [DataController::class, 'getLocalData']);
Route::get('/test-server-db', [DataController::class, 'getServerData']);
Route::get('/test-combined-db', [DataController::class, 'getCombinedData']);
Route::get('/test-custom-query', [DataController::class, 'customQuery']);

// Data migration routes
Route::get('/sync-users', [DataMigrationController::class, 'syncUsers']);
Route::get('/server-stats', [DataMigrationController::class, 'getServerStats']);
Route::get('/compare-data', [DataMigrationController::class, 'compareData']);

// API routes for profiles
Route::get('/api/featured-profiles', [ProfileController::class, 'getFeaturedProfiles']);
Route::get('/api/available-photos', [ProfileController::class, 'getAvailablePhotos']);
Route::get('/api/debug-server', [ProfileController::class, 'debugServerConnection']);
Route::get('/api/profiles/filter', [App\Http\Controllers\Api\ProfileController::class, 'getProfilesByFilter']);

// Simple database connection test
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
        DB::connection('server_mysql')->getPdo();
        $results['server_database'] = [
            'status' => 'SUCCESS',
            'database' => DB::connection('server_mysql')->getDatabaseName(),
            'tables' => DB::connection('server_mysql')->select('SHOW TABLES')
        ];
    } catch (Exception $e) {
        $results['server_database'] = [
            'status' => 'FAILED',
            'error' => $e->getMessage()
        ];
    }
    
    return response()->json($results, 200, [], JSON_PRETTY_PRINT);
});

// Additional demo routes
Route::get('/about', function () {
    return view('layouts.app', [
        'title' => 'About Us'
    ]);
})->name('about');

Route::get('/contact', function () {
    return view('layouts.app', [
        'title' => 'Contact Us'
    ]);
})->name('contact');
