<?php
session_start();
if (isset($_SESSION['name'])) {
    echo "<h1> Xin chào " . $_SESSION['name'] . "</h1>";
} else {
    header('Location: view/login.php');
}