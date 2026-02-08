<?php declare(strict_types = 1);
class Database{
    private static $conn = null;
     public static function getConnection(){
        try {
            if (Database::$conn === null) {
                $db_host     = getConfig('db_host');
                $db_username = getConfig('db_username');
                $db_password = getConfig('db_password');
                $db_name     = getConfig('db_name');
                Database::$conn = new mysqli( $db_host, $db_username, $db_password, $db_name );
            if (Database::$conn->connect_error) {
                    throw new Exception(Database::$conn->connect_error);
                }
            }
        return Database::$conn;
        } catch (Exception $error) {
            die("Connection Failed: " . $error->getMessage());
        }
    }
    public static function closeConnection(): void{
        if (Database::$conn !== null) {
            Database::$conn->close();
            Database::$conn = null;
        }
    }
}