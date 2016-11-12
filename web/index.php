<?php

require_once '../src/connection.php';
require_once '../src/User.php';

session_start();

$user = null;

if (isset($_SESSION['userId'])) {
    $user = User::findById($_SESSION['userId'], $conn);
}

?>
<html>
    <head>
        <title>Homepage</title>
    </head>
    <body>
        <div>
            <?php if(is_null($user)): ?>
            <h1>Zaloguj</h1>
            <form method="POST" action="login.php">
                <p><label>E-mail<input type="email" name="email"></label></p>
                <p><label>Password<input type="password" name="password"></label></p>
                <p><input type="submit" value="Login"></p>
            </form>
            
            <h1>Zarejestruj</h1>
            <form method="POST" action="register.php">
                <p><label>E-mail<input type="email" name="email"></label></p>
                <p><label>First Name<input type="text" name="firstName"></label></p>
                <p><label>Last Name<input type="text" name="lastName"></label></p>
                <p><label>Address<input type="text" name="address"></label></p>
                <p><label>Password<input type="password" name="password"></label></p>
                <p><input type="submit" value="Register">
            </form>
            <?php else: ?>
            <p>
                Welcome <?php echo $user->getFullName() ?>
                <a href="logout.php">Logout</a>
            </p>
            <?php endif ?>
        </div>
    </body>
</html>
