<?php
header('Content-Type: application/json');
include('../../Controller/ApiUserController.php');
$user = new ApiUserController();
if (isset($_GET['id'])) {

    $result = $user->detail();
} else {
    $result = $user->index();
}


if (mysqli_num_rows($result) > 0) {
    $arr = [];
    if (mysqli_num_rows($result) > 1) {
        $arr['notifi'] = "Có " . mysqli_num_rows($result) .  " kết quả";
    }
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