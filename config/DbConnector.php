<?php
class DbConnector
{
    private static $host = "localhost";
    private static $db_name = "daily_scrum";
    private static $username = "root";
    private static $password = "";
    private static $conn=null;

    // public function getConnection()
    // {
    //     $this->conn = null;
    //     try {
    //         $this->conn = new PDO(
    //             "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
    //             $this->username,
    //             $this->password
    //         );
    //         $this->conn->exec("set names utf8");
    //     } catch (PDOException $exception) {
    //         echo "Connection error: " . $exception->getMessage();
    //     }

    //     return $this->conn;
    // }
    public static function getConnection() {
        if(is_null(self::$conn)) {
            try
            {
                self::$conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name,$username,$password);
            }
            catch (PDOException $exception) {
                echo "Connection error: " . $exception->getMessage();
            }
        }
        return self::$conn;
    }
}
