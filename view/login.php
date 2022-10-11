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
    <title>Đăng nhập</title>
</head>
<p style="text-align:right;"><a href="/demo-login/view/register.php" style="margin-right:10%; text-align:right;">Đăng
        ký</a></p>
<form action="?action=login" method="post" style="width:max-content; display:block; margin:100px auto"
    enctype="multipart/form-data">
    <?php
    if (isset($_COOKIE['success'])) {
        echo '<p style="width: 100%; background: blue;text-align: center;padding: 10px;color: white;font-size: 18px;">' . $_COOKIE['success'] . '<p>';
    }
    ?>
    <div style="display:flex">
        <p style="min-width:100px">Tên đăng nhập</p>
        <div class="div">
            <input type="text" placeholder="Nhập tên đăng nhập"
                style="width:300px; margin:0px 0px 0px 20px;height: 34px;" name="user_name"
                value="<?php echo isset($_REQUEST['user_name']) ? $_REQUEST['user_name'] : ""; ?>">
            <p style="color:red; font-size:12px; height:20px;margin:0;padding-left:20px">
                <?php echo $err['user_name']; ?>
            </p>
        </div>
    </div>

    <div style="display:flex">
        <p style="min-width:100px">Mật khẩu</p>
        <div class="div">
            <input type="password" placeholder="Nhập mật khẩu"
                style="width:300px; margin:0px 0px 0px 20px;height: 34px;" name="password">
            <p style="color:red; font-size:12px;height:20px; margin:0;padding-left:20px"><?php echo $err['password']; ?>
            </p>
        </div>


    </div>

    <div style="display: flex;  align-items: center;">
        <input type="submit" value="Gửi"
            style="padding: 10px 40px;display:block; margin:20px 20px 20px auto;background: blue;color: white;border: none;">
        <a href="/demo-login/view/forgot.php">Quên mật khẩu ?</a>

    </div>
</form>

<body>

</body>

</html>