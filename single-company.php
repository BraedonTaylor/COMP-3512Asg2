<?php
require_once ("assign_2.classes.inc.php");
require_once ("profile.inc.php");
session_start();
try{
//    setting up connection to database and retrieving data for company identified in query string
    $conn = DatabaseHelper::createConnection(array(DBCONNSTRING, DBUSER, DBPASS));
    $favoritesGateway = new FavoritesDB($conn);
    $companyGateway = new CompanyDB($conn);
    //these two if statements are just for ease of programming. can alter/remove if needed
    if (isset($_GET["symbol"])){
        $symbol = $_GET["symbol"];
    } else {
        $symbol = "A";
    }
    if (isset($_SESSION["userid"])){
        $user = $_SESSION["userid"];
    } else {
        $user = 5;
    }
    if ($_POST) {//checking to see if server request was via POST
    if(isset($_POST["addFav"])){
        unset($_POST["addFav"]);
        $favoritesGateway->addFavorite($user, $symbol);
        header("Location: Profile.php");//placeholder for favorites.php, used for testing
    } elseif(isset($_POST["history"])){
        unset($_POST["history"]);
        header("Location: history.php?symbol=$symbol");
    }
    }
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
        <script src="js/navbar.js"></script>
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
        <form method="post" id="company-btns">
            <button class="button" id="addFav" name="addFav" value="addFav" type="submit">Add to Favorites</button>
            <button class="button" id="history" name="history" value="History" type="submit">History</button>
        </form>
    </main>
    </body>
</html>