<?php
require_once ("assign_2.classes.inc.php");
require_once ("index.inc.php");
try{
    $conn = DatabaseHelper::createConnection(array(DBCONNSTRING, DBUSER, DBPASS));
    $userGateway = new UserDB($conn);
    $favGateway = new FavoritesDB($conn);
    $userID = 5;
    $user = $userGateway->getUser($userID);
    $fav = $favGateway->getUserFavorites($userID);
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
                ?>
                    <div id="<?=$favorite["symbol"]?>" class="favoritesListing">
                    <img class="favorites favoritesIcon" alt="<?=$favorite["symbol"]?>" src="images/logos/<?=$favorite["symbol"]?>.svg">
                    <div class="favorites" id="favoritesSymbol"><?=$favorite["symbol"]?></div>
                    <div class="favorites" id="favoritesName">Name Here</div>
                    <button class="favorites button" id="removeFavorite">Remove</button>
                    </div>
                <?php
            }
            ?>
            
            
            <!-- <div id="amd" class="favoritesListing">
                <img class="favorites favoritesIcon" alt="AMD" src="images/AMD.svg">
                <div class="favorites" id="favoritesSymbol">AMD</div>
                <div class="favorites" id="favoritesName">AMD</div>
                <button class="favorites button" id="removeFavorite">Remove</button>
            </div>
            <div id="amzn" class="favoritesListing">
                <img class="favorites favoritesIcon" alt="Amazon" src="images/AMZN.svg">
                <div class="favorites" id="favoritesSymbol">AMZN</div>
                <div class="favorites" id="favoritesName">Amazon</div>
                <button class="favorites button" id="removeFavorite">Remove</button>
            </div>
            <div id="msft" class="favoritesListing">
                <img class="favorites favoritesIcon" alt="Microsoft" src="images/MSFT.svg">
                <div class="favorites" id="favoritesSymbol">MSFT</div>
                <div class="favorites" id="favoritesName">Microsoft</div>
                <button class="favorites button" id="removeFavorite">Remove</button>
            </div> -->
            <button id="removeAll">Remove All</button>
        </main>
    </body>
</html>