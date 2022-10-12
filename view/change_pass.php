<?php
session_start();
if (isset($_SESSION['name'])) {
    header('Location: ../index.php');
}
$err = array('password' => '', 're_password' => '');
$email = $_GET['email'];
if ($_POST) {
    $register = true;
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
        $user->change_pass($email);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Đổi mật khẩu </title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
    <p class="box_head"><a href="/demo-login/view/login.php" class="link_head"> Đăng nhập </a></p>
    <form action="?action=register&email=<?php echo $email; ?>" method="post" class="login_form"
        enctype="multipart/form-data">
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

</html>`