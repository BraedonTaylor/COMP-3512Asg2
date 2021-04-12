<?php
require_once ("assign_2.classes.inc.php");
require_once ("config.inc.php");
require_once ("single-company.inc.php");
require_once ("assign2.navbar.inc.php");
session_start();
$login = true;

try{
//    setting up connection to database and retrieving data for company identified in query string
    $conn = DatabaseHelper::createConnection(array(DBCONNSTRING, DBUSER, DBPASS));

    if (isset($_GET["symbol"])){
        $symbol = $_GET["symbol"];//checking for requested company via media query
    } else {//pops an error if no query string
        echo "<script>alert('Invalid url - Page can only be accessed from the Companies page')</script>";
    }
    
    if ($_SERVER['REQUEST_METHOD'] === "POST") {//checking to see if server request was via POST  
            if(isset($_POST["addFav"])){
                if ( !isset($_SESSION['userID']) ) {
                    echo "<script>alert('Please login before adding to favorites.')</script>";
                    $login = false;
                } else {
                    unset($_POST["addFav"]);
                    $favoritesGateway = new FavoritesDB($conn);//only creates the gateway if POST check returns true
                    
                    //This will check if a company already exists in the favorites and will pop an error if it does.
                    if( doesFavoriteExist($symbol, $favoritesGateway->getUserFavorites($_SESSION['userID'])) ) {
                        echo "<script>alert('You already have this company as a favorite.')</script>";
                    } else {
                        $favoritesGateway->addFavorite($_SESSION['userID'], $symbol);
                        header("Location: favorites.php");
                    }
                }  //favorites table in database has updated
                
            } elseif(isset($_POST["history"])) {
                unset($_POST["history"]);
                header("Location: history.php?symbol=$symbol");//redirect to company's history page if the "history" button was clicked
            } 
    }
                    
        $companyGateway = new CompanyDB($conn);//gateway is only created after the POST check to save resources
        $company = $companyGateway->getOneForSymbol($symbol);

} catch (Exception $e) {
    die( $e->getMessage() );
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?= $company["name"] ?></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/profile-single.css">
        <link rel="stylesheet" href="css/navbar.css">
        <script src="js/navbar.js"></script>
    </head>
    <body>
        <?php buildNav($login); ?>
    <main id="single-container">
<!--        generating company page based on retrieved data-->
        <div class="heading">
            <img class="company-logo" src="images/logos/<?= $company["symbol"]?>.svg" alt="Logo for <?= $company["name"]?>">
            <h2><?= $company["name"]?>    ("<?= $company["symbol"]?>")</h2>
            <form method="post" id="company-btns">
                <button class="button" id="addFav" name="addFav" value="addFav" type="submit">Add to Favorites</button>
                <button class="button" id="history" name="history" value="History" type="submit">History</button>
            </form>
        </div>
        <div class="company-style">
            <div><?= $company["description"]?> <a href="<?= $company["website"]?>"><?= $company["website"]?></a></div>
            <div id="info-columns">
                <strong>Sector: </strong><span><?= $company["sector"]?></span>
                <strong>Exchange: </strong><span><?= $company["exchange"]?></span>
                <strong class="company-sub">Sub-Industry: </strong><span class="company-sub"><?= $company["subindustry"]?></span>
                <strong>Address: </strong><span><?= $company["address"]?></span>
            </div>
        </div>
    </main>
    </body>
</html>