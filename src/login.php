<?php

require_once 'config.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email'])) {
        $mail = $_POST['email'];
    } else {
        throw new Exception('Invalid email');
    }
    
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        throw new Exception('Invalid password');
    }
}