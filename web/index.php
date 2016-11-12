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
            <form method="POST" action="login.php">
                <input type="email" name="email">
                <input type="password" name="password">
                <input type="submit" value="Login">
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
