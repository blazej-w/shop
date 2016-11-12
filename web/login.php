<?php

require_once '../src/connection.php';
require_once '../src/User.php';

session_start();

if ('POST' === $_SERVER['REQUEST_METHOD']) {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        throw new Exception('Invalid email');
    }

    if (isset($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        throw new Exception('Invalid password');
    }
    
    $user = User::findByEmail($email, $conn);
        
    $logged = $user->checkPassword($password);
    
    if ($logged) {
        $_SESSION['userId'] = $user->getId();
    }
}

header('Location: index.php');