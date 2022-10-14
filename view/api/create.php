<?php
header('Content-Type: application/json');
include('../../Controller/ApiUserController.php');
$user = new ApiUserController();
$result = $user->create();
if (mysqli_num_rows($result) > 0) {
    $arr = [];
    $arr['notifi'] = "Đăng ký tài khoản thành công";
    $arr['user'] = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $arr_item = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'email' => $row['email'],
            'password' => $row['password'],
        );
        array_push($arr['user'], $arr_item);
    }
    echo json_encode($arr);
}