<?php
    session_start();
    if ($_SESSION['Active'] == false) {
        header('Location:login.php');
    }
    if (!isset($_SESSION['Username'])) 
    {
        $_SESSION['Username'] = 'Guest';
    }
    if (!isset($_SESSION['users'])) 
    {
        $_SESSION['users'] = array('john' => 'password');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">