<?php

class Database
{
    private static $host = "localhost";
    private static $user = "root";
    private static $pass = "";
    private static $db   = "db_prediksi";

    public static function connect()
    {
        $conn = new mysqli(
            self::$host,
            self::$user,
            self::$pass,
            self::$db
        );

        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        return $conn;
    }
}