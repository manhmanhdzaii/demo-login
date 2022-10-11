<?php
include_once('Controller.php');
include_once('../Model/User.php');
class UserController extends Controller
{
    function check($name, $password)
    {
        $users = new User();
        $result = $users->login($name, $password);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_array($result);
                $_SESSION['name'] = $user['name'];
                header('Location: ../index.php');
            }
        }
    }
    function store()
    {
        $users = new User();
        $name = $_REQUEST['user_name'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $result = $users->insert($name, $email, $password);
        if ($result) {
            setcookie("success", "Đăng ký tài khoản thành công", time() + 5, "/");
            header('Location: login.php');
        }
    }
    function forgot()
    {
        $users = new User();
        $email = $_REQUEST['email'];
        $result = $users->forgot($email);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                header("Location: change_pass.php?email=$email");
            }
        }
    }
    function change_pass($email)
    {
        $users = new User();
        $password = $_REQUEST['password'];
        $result = $users->change_pass($email, $password);
        if ($result) {
            setcookie("success", "Đổi mật khẩu thành công", time() + 5, "/");
            header('Location: login.php');
        }
    }
}