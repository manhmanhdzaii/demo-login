<?php
include_once('Controller.php');
include_once('../../Model/User.php');
class ApiUserController extends Controller
{

    function detail()
    {
        $id = $_GET['id'];
        $users = new User();
        $result =  $users->getOne($id);
        return $result;
    }
    function index()
    {
        $users = new User();
        $result = $users->getAll();
        return $result;
    }
    function create()
    {
        $users = new User();
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $id = $users->insert_api($name, $email, $password);
        $result =  $users->getOne($id);
        return $result;
    }
    function update($put)
    {
        $users = new User();
        $id = $put['id'];
        $name = $put['name'];
        $email = $put['email'];
        $password = $put['password'];
        $result = $users->update_api($id, $name, $email, $password);
        $result =  $users->getOne($id);
        return $result;
    }
    function update_patch($put)
    {
        $users = new User();
        $colum1 = [];
        $colum2 = [];
        foreach ($put as $key => $value) {
            if ($key != 'id') {
                $colum1[] = $key;
                $colum2[] = $value;
            }
        }
        $result = $users->update_patch($colum1, $colum2, $put['id']);
        $result =  $users->getOne($put['id']);
        return $result;
    }
    function delete($id)
    {
        $users = new User();
        $result = $users->delete($id);
        return $result;
    }
}