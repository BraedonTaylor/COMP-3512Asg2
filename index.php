<?php
require_once ("assign_2.classes.inc.php");
require_once ("config.inc.php");
require_once ("assign2.navbar.inc.php");
session_start();
$login = true;
if( !isset($_SESSION['userID']) ) {
    $_SESSION['userID'] = null;
    $login = false;
} elseif($_SESSION["userID"] === null) $login = false;

try{
    $conn = DatabaseHelper::createConnection(array(DBCONNSTRING, DBUSER, DBPASS));
    $userGateway = new UserDB($conn);
    $userID = $_SESSION['userID'];
    $user = $userGateway->getUser($userID);
    
}catch (Exception $e) {
    die( $e->getMessage() );
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Home</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/navbar.css">
        <script src="js/navbar.js"></script>
        <script src="js/home.js"></script>
    </head>
    <body>
        <?php buildNav($login, "index"); ?>
        <main class="home-container">
            <h1 id="homeHeader">Stock Browser</h1>
            <div id="aboutBox" class="homeBox">About</div>
            <div id="companiesBox" class="homeBox">Companies</div>
            <?php if (isset($userID)) { ?>
                <div id="portfolioBox" class="homeBox">Portfolio</div>
                <div id="favoritesBox" class="homeBox">Favorites</div>
                <div id="profileBox" class="homeBox">Profile</div>
                <div id="logoutBox" class="homeBox">Logout</div>
            <?php } else { ?>
                <div id="loginBox" class="homeBox">Login</div>
            <div id="signupBox" class="homeBox">Sign up</div>
            <?php } ?>
        </main>
    </body>
</html>