<?php
header('Content-Type: application/json');
include('../../Controller/ApiUserController.php');
$user = new ApiUserController();
$put = array();
parse_str(file_get_contents('php://input'), $put);
$result = $user->delete($put['id']);


$arr = [];
$arr['notifi'] = "Xóa tài khoản thành công";

echo json_encode($arr);