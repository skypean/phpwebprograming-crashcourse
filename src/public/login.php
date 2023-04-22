<?php

session_start();
require_once('../App/DAO/DAO.php');
require_once('../App/DAO/UserDAO.php');
require_once('../App/Config.php');
require_once('../App/DB.php');
use App\DAO\UserDAO;

$userDAO = new UserDAO();
if (isset($_POST['submit']) && $_POST['submit'] === 'login') {
    $username = $_POST['username'];
    $upassword = $_POST['pswd'];

    $validLogin = $userDAO->login($username, $upassword);

    if ($validLogin) {
        $_SESSION['isLoggedIn'] = 'true';
        header('Location: /users/users.php');
    } else {
        $_SESSION['error'] = 'Invalid login credentials!';
        header('Location: /login.php');
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <script src="js/login.js"></script>
    <div class="main">

        <input type="checkbox" id="chk" aria-hidden="true">
        <div class="error">
            <?php if (!empty($_SESSION['error'])): ?>
                <?= $_SESSION['error'] ?>
            <?php endif ?>
        </div>

        <div class="signup">
            <form>
                <label for="chk" aria-hidden="true">Sign up</label>
                <input type="text" name="username" placeholder="Username" required="">
                <input type="text" name="fullname" placeholder="Fullname" required="">
                <input type="password" name="pswd" placeholder="Password" required="">
                <button>Sign up</button>
            </form>
        </div>
        <div class="login">
            <form action="login.php" method="post" enctype="application/x-www-form-urlencoded">
                <label for="chk" aria-hidden="true">Login</label>
                <input type="text" name="username" placeholder="Username" required="">
                <input type="password" name="pswd" placeholder="Password" required="">
                <button name="submit" value="login">Login</button>
            </form>
        </div>
    </div>

</body>

</html>