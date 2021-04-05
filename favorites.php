<?php
require_once ("assign_2.classes.inc.php");
require_once ("index.inc.php");
try{
    $conn = DatabaseHelper::createConnection(array(DBCONNSTRING, DBUSER, DBPASS));
    
    $userGateway = new UserDB($conn);
    $favGateway = new FavoritesDB($conn);
    $userID = 5;
    if (isset($_POST['removeall'])) {
        $favGateway->removeAll($userID);
        $fav = $favGateway->getUserFavorites($userID);
    } else {
        $fav = $favGateway->getUserFavorites($userID);
    }
    $user = $userGateway->getUser($userID);
}catch (Exception $e) {
    die( $e->getMessage() );
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
                // var_dump($favorite);
                ?>
                    <div id="<?=$favorite["symbol"]?>" class="favoritesListing">
                    <img class="favorites favoritesIcon" alt="<?=$favorite["symbol"]?>" src="images/logos/<?=$favorite["symbol"]?>.svg">
                    <div class="favorites" id="favoritesSymbol"><?=$favorite["symbol"]?></div>
                    <div class="favorites" id="favoritesName"><?=$favorite["name"]?></div>
                    <button class="favorites button" id="removeFavorite">Remove</button>
                    </div>
                <?php
            }
            ?>
            <button id="removeAll">Remove All</button>
        </main>
    </body>
</html>