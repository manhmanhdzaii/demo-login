<?php
session_start();
if (isset($_SESSION['name'])) {
    header('Location: ../index.php');
}
$err = array('user_name' => '', 'password' => '', 'email' => '', 're_password' => '');
if ($_REQUEST) {
    $register = true;
    if ($_REQUEST['user_name'] == '') {
        $err['user_name'] = 'Tên đăng nhập không được để trống';
        $register = false;
    }
    if ($_REQUEST['email'] == '') {
        $err['email'] = 'Email không được để trống';
        $register = false;
    }
    if ($_REQUEST['password'] == '') {
        $err['password'] = 'Mật khẩu không được để trống';
        $register = false;
    }
    if ($_REQUEST['re_password'] == '') {
        $err['re_password'] = 'Nhập lại mật khẩu không được để trống';
        $register = false;
    }
    if ($_REQUEST['password'] != '' && $_REQUEST['re_password'] != '') {
        if ($_REQUEST['password'] != $_REQUEST['re_password']) {
            $err['password'] = 'Mật khẩu không khớp';
            $register = false;
        }
    }
    if ($register) {
        include('../Controller/UserController.php');
        $user = new UserController();
        $user->store();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Đăng ký </title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
    <p class="box_head"><a href="/demo-login/view/login.php" class="link_head">Đăng nhập</a></p>
    <form action="?action=register" method="post" class="login_form" enctype="multipart/form-data">
        <div class="d_flex">
            <p class="min_w_100"> Họ và tên </p>
            <div class="div">
                <input type="text" placeholder="Nhập tên đăng nhập" class="box_input" name="user_name"
                    value="<?php echo isset($_REQUEST['user_name']) ? $_REQUEST['user_name'] : ""; ?>">
                <p class="err">
                    <?php echo $err['user_name']; ?>
                </p>
            </div>
        </div>
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
        <div class="d_flex">
            <p class="min_w_100"> Mật khẩu </p>
            <div class="div">
                <input type="password" placeholder="Nhập mật khẩu" class="box_input" name="password"
                    value="<?php echo isset($_REQUEST['password']) ? $_REQUEST['password'] : ""; ?>">
                <p class="err">
                    <?php echo $err['password']; ?>
                </p>
            </div>
        </div>
        <div class="d_flex">
            <p class="min_w_100"> Nhập lại mk </p>
            <div class="div">
                <input type="password" placeholder="Nhập mật khẩu" class="box_input" name="re_password"
                    value="<?php echo isset($_REQUEST['re_password']) ? $_REQUEST['re_password'] : ""; ?>">
                <p class="err">
                    <?php echo $err['re_password']; ?>
                </p>
            </div>
        </div>
        <div>
            <input type="submit" value="Gửi" class="ip_submit">
        </div>
    </form>
</body>

</html>