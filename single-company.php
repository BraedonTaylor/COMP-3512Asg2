<?php
require_once ("assign_2.classes.inc.php");
require_once ("profile.inc.php");
session_start();
try{
//    setting up connection to database and retrieving data for user favorites if exists
    $conn = DatabaseHelper::createConnection(array(DBCONNSTRING, DBUSER, DBPASS));
    $favoritesGateway = new FavoritesDB($conn);
    $favoritesGateway->createTable();
    $companyGateway = new CompanyDB($conn);
    $symbol = "A";
    $company = $companyGateway->getOneForSymbol($symbol);
}catch (Exception $e) {
    die( $e->getMessage() );
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?= $company["name"] ?></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="navbar.js"></script>
    </head>
    <body>
<!-- Nav bar based off of https://www.w3schools.com/howto/howto_js_topnav_responsive.asp -->
        <header class="topnav">
            <img class="logo" alt="logo" src="images/logo.png">
            <a class="icon"><i class="fa fa-bars"></i></a>
            <div id="navlinks" class="hidden">
                <a href="index.php">Home</a>
                <a href="about.html">About</a>
                <a href="list.php">Companies</a>
                <a class="login" href="portfolio.php">Portfolio</a>
                <a class="login" href="profile.php">Profile</a>
                <a class="login" href="favourites.php">Favourites</a>
                <a class="login" href="">Log Out</a>
            </div>
        </header>
    <main id="single-container">
        <div class="heading">
            <img class="company-logo" src="images/logos/<?= $company["symbol"]?>.svg" alt="Logo for <?= $company["name"]?>">
            <h2><?= $company["name"]?>    ("<?= $company["symbol"]?>")</h2>
        </div>
        <div class="info-columns">
            <div id="single-wide"><?= $company["description"]?> <a href="<?= $company["website"]?>"><?= $company["website"]?></a></div>
            <span><strong>Sector: </strong><?= $company["sector"]?></span>
            <span><strong>Sub-Industry: </strong><?= $company["subindustry"]?></span>
            <span><strong>Exchange: </strong><?= $company["exchange"]?></span>
            <span><strong>Address: </strong><?= $company["address"]?></span>
        </div>
    </main>
    </body>
</html>