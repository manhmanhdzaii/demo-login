<?php
session_start();
if (isset($_SESSION['name'])) {
    header('Location: ../index.php');
}
if (isset($_REQUEST['action'])) {
    include('../Controller/UserController.php');
    $user_name = $_REQUEST['user_name'];
    $password = $_REQUEST['password'];
    $user = new UserController();
    $user->check($user_name, $password);
}
$err = array('user_name' => '', 'password' => '');
if ($_REQUEST) {
    if ($_REQUEST['user_name'] == '') {
        $err['user_name'] = 'Tên đăng nhập không được để trống';
    }
    if ($_REQUEST['password'] == '') {
        $err['password'] = 'Mật khẩu không được để trống';
    }
    if ($_REQUEST['password'] != '' && $_REQUEST['user_name'] != '') {
        $err['user_name'] = 'Tài khoản hoặc mật khẩu chưa chính xác';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Đăng nhập </title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
    <p class="box_head"><a href="/demo-login/view/register.php" class="link_head"> Đăng ký </a></p>
    <form action="?action=login" method="post" class="login_form" enctype="multipart/form-data">
        <?php
        if (isset($_COOKIE['success'])) {
            echo '<p class="success">' . $_COOKIE['success'] . '<p>';
        }
        ?>
        <div class="d_flex">
            <p class="min_w_100"> Tên đăng nhập </p>
            <div class="div">
                <input type="text" placeholder="Nhập tên đăng nhập" class="box_input" name="user_name"
                    value="<?php echo isset($_REQUEST['user_name']) ? $_REQUEST['user_name'] : ""; ?>">
                <p class="err">
                    <?php echo $err['user_name']; ?>
                </p>
            </div>
        </div>
        <div class="d_flex">
            <p class="min_w_100"> Mật khẩu </p>
            <div class="div">
                <input type="password" placeholder="Nhập mật khẩu" class="box_input" name="password">
                <p class="err">
                    <?php echo $err['password']; ?>
                </p>
            </div>
        </div>
        <div class="box_login">
            <input type="submit" value="Gửi" class="login_submit">
            <a href="/demo-login/view/forgot.php"> Quên mật khẩu ? </a>
        </div>
    </form>
</body>

</html>