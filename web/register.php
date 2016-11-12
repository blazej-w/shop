<?php

require_once '../src/connection.php';
require_once '../src/User.php';

session_start();

if ('POST' === $_SERVER['REQUEST_METHOD']) {
    if (isset($_POST['email'])) {
        $userRegData['email'] = $_POST['email'];
    } else {
        throw new Exception('Invalid email');
    }

    if (isset($_POST['firstName'])) {
        $userRegData['firstName'] = $_POST['firstName'];
    } else {
        throw new Exception('Invalid Name');
    }
    
    if (isset($_POST['lastName'])) {
        $userRegData['lastName'] = $_POST['lastName'];
    } else {
        throw new Exception('Invalid Surname');
    }
    
    if (isset($_POST['address'])) {
        $userRegData['address'] = $_POST['address'];
    } else {
        throw new Exception('Invalid Surname');
    }
    
    if (isset($_POST['password'])) {
        $userRegData['password'] = $_POST['password'];
    } else {
        throw new Exception('Invalid password');
    }
    
    $result = User::createNewUser($userRegData, $conn);
    
    if ($result) {
        echo 'Register successful';
    } else {
        throw new Exception('Register unsuccessful');
    }
}

header('Location: index.php');