<?php
session_start();
if (isset($_SESSION['name'])) {
    header('Location: ../index.php');
}
$err = array('user_name' => '', 'password' => '', 'email' => '', 're_password' => '');
if ($_REQUEST) {
    $register = true;
    if ($_REQUEST['email'] == '') {
        $err['email'] = 'Email không được để trống';
        $register = false;
    } else {
        $err['email'] = 'Email không tồn tại trong hệ thống';
    }
    if ($register) {
        include('../Controller/UserController.php');
        $user = new UserController();
        $user->forgot();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Quên mật khẩu </title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
    <p class="box_head"><a href="/demo-login/view/login.php" class="link_head"> Đăng nhập </a></p>
    <form action="?action=forgot" method="post" class="login_form" enctype="multipart/form-data">
        <div class="d_flex">
            <p class="min_w_100"> Email </p>
            <div class="div">
                <input type="text" placeholder="Nhập tên đăng nhập" class="box_input" name="email"
                    value="<?php echo isset($_REQUEST['email']) ? $_REQUEST['email'] : ""; ?>">
                <p class="err">
                    <?php echo $err['email']; ?>
                </p>
            </div>
        </div>
        <div>
            <input type="submit" value="Gửi" class="ip_submit">
        </div>
    </form>
</body>

</html>