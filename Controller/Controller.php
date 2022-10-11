<?php
class Controller
{
    public function view($viewName, $data)
    {
        $arr = explode('.', $viewName);
        $fileName = implode('/', $arr);
        $fileName .= ".php";
        include_once($fileName);
    }
}