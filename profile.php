<?php
require_once ("assign_2.classes.inc.php");
require_once ("config.inc.php");
require_once ("assign2.navbar.inc.php");
session_start();
try{
//    checking if user is logged in
    if (isset($_SESSION["userID"]) && $_SESSION["userID"] != null){
        $userID = $_SESSION["userID"];//checking to see if user is logged in; can alter if needed
        $login = true;
    } else {
        $userID = 5;
        $login = true;
    }
    //    setting up connection to database and retrieving data for logged-in user
    $conn = DatabaseHelper::createConnection(array(DBCONNSTRING, DBUSER, DBPASS));
    $userGateway = new UserDB($conn);
    $user = $userGateway->getUser($userID);
}catch (Exception $e) {
    die( $e->getMessage() );
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Profile</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/navbar.js"></script>
    </head>
    <body>
        <?php buildNav($login, "profile"); ?>
        <main class="profile-container">
            <h2 id="profile-head">PROFILE</h2>
            <div class="img">
                <img id="profile" alt="profile picture" src="https://randomuser.me/api/portraits/women/<?= $userID?>.jpg">
            </div>
            <div class="profile">
                <!-- Creating the profile based on retrieved user data -->
                <strong>Name: </strong><span><?= $user["firstname"] . " " . $user["lastname"]?></span>
                <strong>Email: </strong><span><?= $user["email"]?></span>
                <strong>City: </strong><span><?= $user["city"]?></span>
                <strong>Country: </strong><span><?= $user["country"]?></span>
            </div>
        </main>
    </body>
</html>