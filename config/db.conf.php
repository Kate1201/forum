<?php
class db
{
    private static $instance = null;
    public static function get()
    {
        $host = 'localhost';
        $db   = 'forum';
        $user = 'root';
        $pass = 'vertrigo';
        $charset = 'utf8';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        if(self::$instance == null)
        {
            try
            {
                self::$instance = new PDO($dsn, $user, $pass);
            }
            catch(PDOException $e)
            {
                throw $e;
            }
        }
        return self::$instance;
    }
}