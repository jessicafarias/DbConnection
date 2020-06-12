<?php namespace MyConnection;
    include_once 'DbConnection.php';

    class DatabaseFactory {
    private static $connection;

    public static function getDatabase(){

        if (self::$connection == null) {
            $url = "host";
            $user = "user";
            $passw = "password";
            $db = "name";
            self::$connection = new Database($url, $user, $passw, $db);
        }
        return self::$connection;
    }

} 
?>