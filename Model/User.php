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
        $sql = "INSERT INTO user(name, email, password, active) VALUES ('$name', '$email', '$password', 0)";
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

    public function getOne($id)
    {
        $sql = "SELECT * FROM user WHERE id = '$id'";
        $result = mysqli_query(parent::$conn, $sql);
        return $result;
    }
    public function getAll()
    {
        $sql = "SELECT * FROM user";
        $result = mysqli_query(parent::$conn, $sql);
        return $result;
    }
    public function insert_api($name, $email, $password)
    {
        $sql = "INSERT INTO user(name, email, password) VALUES ('$name', '$email', '$password')";
        $result = mysqli_query(parent::$conn, $sql);
        $last_id = mysqli_insert_id(parent::$conn);
        return $last_id;
    }
    public function update_api($id, $name, $email, $password)
    {
        $sql = "UPDATE user SET name = '$name', email = '$email', password = '$password' WHERE id = '$id'";
        $result = mysqli_query(parent::$conn, $sql);
        return  $result;
    }
    public function update_patch($col1, $col2, $id)
    {
        $arr = array();
        for ($i = 0; $i < count($col1); $i++) {
            if ($col1[$i] != 'id') {
                $arr[] = "{$col1[$i]} = '{$col2[$i]}'";
            }
        }
        $str = implode(', ', $arr);
        $sql = "UPDATE user SET $str WHERE id = '$id'";
        $result = mysqli_query(parent::$conn, $sql);
        return  $result;
    }
    function delete($id)
    {
        $sql = "DELETE FROM user WHERE id = '$id'";
        $result = mysqli_query(parent::$conn, $sql);
        return  $result;
    }
}