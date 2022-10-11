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
    <title>Đăng ký</title>
</head>
<p style="text-align:right;"><a href="/demo-login/view/login.php" style="margin-right:10%; text-align:right;">Đăng
        nhập</a></p>
<form action="?action=forgot" method="post" style="width:max-content; display:block; margin:100px auto"
    enctype="multipart/form-data">
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
    <div>
        <input type="submit" value="Gửi"
            style="padding: 10px 40px;display:block; margin:30px auto;background: blue;color: white;border: none;">
    </div>
</form>

<body>

</body>

</html>