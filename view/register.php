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
    <title>Đăng ký</title>
</head>
<p style="text-align:right;"><a href="/demo-login/view/login.php" style="margin-right:10%; text-align:right;">Đăng
        nhập</a></p>
<form action="?action=register" method="post" style="width:max-content; display:block; margin:100px auto"
    enctype="multipart/form-data">

    <div style="display:flex">
        <p style="min-width:100px">Họ và tên</p>
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
        <p style="min-width:100px">Email</p>
        <div class="div">
            <input type="text" placeholder="Nhập tên đăng nhập"
                style="width:300px; margin:0px 0px 0px 20px;height: 34px;" name="email"
                value="<?php echo isset($_REQUEST['email']) ? $_REQUEST['email'] : ""; ?>">
            <p style="color:red; font-size:12px; height:20px;margin:0;padding-left:20px">
                <?php echo $err['email']; ?>
            </p>
        </div>
    </div>

    <div style="display:flex">
        <p style="min-width:100px">Mật khẩu</p>
        <div class="div">
            <input type="password" placeholder="Nhập mật khẩu"
                style="width:300px; margin:0px 0px 0px 20px;height: 34px;" name="password"
                value="<?php echo isset($_REQUEST['password']) ? $_REQUEST['password'] : ""; ?>">
            <p style="color:red; font-size:12px;height:20px; margin:0;padding-left:20px"><?php echo $err['password']; ?>
            </p>
        </div>


    </div>
    <div style="display:flex">
        <p style="min-width:100px">Nhập lại mk</p>
        <div class="div">
            <input type="password" placeholder="Nhập mật khẩu"
                style="width:300px; margin:0px 0px 0px 20px;height: 34px;" name="re_password"
                value="<?php echo isset($_REQUEST['re_password']) ? $_REQUEST['re_password'] : ""; ?>">
            <p style="color:red; font-size:12px;height:20px; margin:0;padding-left:20px">
                <?php echo $err['re_password']; ?>
            </p>
        </div>


    </div>

    <div>
        <input type="submit" value="Gửi"
            style="padding: 10px 40px;display:block; margin:30px auto;background: blue;color: white;border: none;">
    </div>
</form>

<body>

</body>

</html>