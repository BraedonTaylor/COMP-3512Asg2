<?php
require_once ("assign_2.classes.inc.php");
require_once ("config.inc.php");
session_start();
try{
    $conn = DatabaseHelper::createConnection(array(DBCONNSTRING, DBUSER, DBPASS));
    
    $userGateway = new UserDB($conn);
    $favGateway = new FavoritesDB($conn);
    $userID = $_SESSION['userID'];
    if (isset($_POST['removeall'])) {
        $favGateway->removeAll($userID);
        $fav = $favGateway->getUserFavorites($userID);
        unset($_POST['removeall']);
        header( "Location: {$_SERVER['REQUEST_URI']}", true, 303 );
   exit();
    } else {
        $fav = $favGateway->getUserFavorites($userID);
    }
    $user = $userGateway->getUser($userID);
}catch (Exception $e) {
    die( $e->getMessage() );
}
foreach ($fav as $favorite) {
    $removeString = $favorite["symbol"] . "remove";
    if (isset($_POST[$removeString])) {
        $favGateway->removeSingle($userID, $favorite["symbol"]);
        $fav = $favGateway->getUserFavorites($userID);
        unset($_POST['removeall']);
        header( "Location: {$_SERVER['REQUEST_URI']}", true, 303 );
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Favorites</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">
        <script src="navbar.js"></script>
    </head>
    <body>
<!--    Julianna's take on the hamburger nav bar. Based off of https://www.w3schools.com/howto/howto_js_mobile_navbar.asp -->
        <header class="topnav">
            <img class="logo" alt="logo" src="images/logo.png">
            <a class="icon"><i class="fa fa-bars"></i></a>
            <div id="navlinks" class="hidden">
                <a href="index.php">Home</a>
                <a href="about.html">About</a>
                <a href="list.php">Companies</a>
                <a class="login" href="portfolio.php">Portfolio</a>
                <a class="login" href="profile.php">Profile</a>
                <a class="login" href="favorites.php">Favorites</a>
                <a class="login" href="">Log Out</a>
            </div>
        </header>
        <main class="favorites-container">
        <h2 id="favoritesHeader">Favorites</h2>
            <?php 
            foreach ($fav as $favorite) {
                $rvString = $favorite["symbol"] . "remove";
                // var_dump($favorite);
                ?>
                    <div id="<?=$favorite["symbol"]?>" class="favoritesListing">
                        <img class="favorites favoritesIcon" alt="<?=$favorite["symbol"]?>" src="images/logos/<?=$favorite["symbol"]?>.svg">
                        <div class="favorites favoritesSymbol"><?=$favorite["symbol"]?></div>
                        <div class="favorites favoritesName"><?=$favorite["name"]?></div>
                        <form method="post">
                            <button class="favorites button" id="removeFavorite <?=$rvString?>" name="<?=$rvString?>" value="<?=$rvString?>" type="submit">Remove</button>
                        </form>
                    </div>
                <?php
            }
            ?>
            <form method="post">
            <button id="removeAll" name="removeall" value="removeall" type="submit">Remove All</button>
            </form>
        </main>
    </body>
</html>