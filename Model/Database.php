<?php

class Database
{
    public static $conn;
    function __construct()
    {
        self::$conn = mysqli_connect('localhost:3306', 'root', '', 'demo-login') or die('Lỗi kết nối');
    }
}