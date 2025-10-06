<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ServerDataModel extends Model
{
    // Use the server database connection
    protected $connection = 'server_mysql';
    
    // Disable timestamps if your server database doesn't use them
    public $timestamps = true;
    
    /**
     * Fetch users from server database
     */
    public static function getServerUsers($limit = 100)
    {
        return self::on('server_mysql')
            ->select('*')
            ->from('users') // Replace with your actual table name
            ->limit($limit)
            ->get();
    }
    
    /**
     * Fetch profiles from server database
     */
    public static function getServerProfiles($limit = 100)
    {
        return self::on('server_mysql')
            ->select('*')
            ->from('profiles') // Replace with your actual table name
            ->limit($limit)
            ->get();
    }
    
    /**
     * Custom query to server database
     */
    public static function customServerQuery($query)
    {
        return DB::connection('server_mysql')->select($query);
    }
}