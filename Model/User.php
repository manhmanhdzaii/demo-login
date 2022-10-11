<?php
include_once('Database.php');

class User extends Database
{

    public function __construct()
    {
        parent::__construct();
    }
    public function login($name, $password)
    {
        $sql = "SELECT * FROM user WHERE email = '$name' and password = '$password'";
        $result = mysqli_query(parent::$conn, $sql);
        return $result;
    }
    public function insert($name, $email, $password)
    {
        $sql = "INSERT INTO user(name, email, password) VALUES ('$name', '$email', '$password')";
        $result = mysqli_query(parent::$conn, $sql);
        return $result;
    }
    public function forgot($email)
    {
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $result = mysqli_query(parent::$conn, $sql);
        return $result;
    }
    public function change_pass($email, $password)
    {
        $sql = "UPDATE user SET password = '$password' WHERE email = '$email'";
        $result = mysqli_query(parent::$conn, $sql);
        return $result;
    }
}