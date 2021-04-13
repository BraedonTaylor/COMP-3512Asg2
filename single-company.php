<?php
require_once ("assign_2.classes.inc.php");
require_once ("config.inc.php");
require_once ("single-company.inc.php");
require_once ("assign2.navbar.inc.php");
session_start();
$login = false;

try{
//    setting up connection to database and retrieving data for company identified in query string
    $conn = DatabaseHelper::createConnection(array(DBCONNSTRING, DBUSER, DBPASS));

    //these two if statements are just for ease of programming. can alter/remove if needed
    if (isset($_GET["symbol"])){
        $symbol = $_GET["symbol"];//checking for requested company via media query
    } else {
        echo "<script>alert('Please access from the companies page.')</script>";
    }

    if ($_SERVER['REQUEST_METHOD'] === "POST") {//checking to see if server request was via POST
            if(isset($_POST["addFav"])){
                if ( !isset($_SESSION['userID']) ) {
                    echo "<script>alert('Please login before adding to favorites.')</script>";
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
        if (isset($_SESSION["userID"]) && $_SESSION["userID"] != null) $login = true;
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
        <link rel="stylesheet" href="CSS/style.css">
        <link rel="stylesheet" href="CSS/navbar.css">
        <script src="js/navbar.js"></script>
    </head>
    <body>
<!-- Nav bar based off of https://www.w3schools.com/howto/howto_js_topnav_responsive.asp -->
        <?php buildNav($login); ?>
    <main id="single-container">
<!--        generating company page based on retrieved data-->
        <span class="heading img">
            <img class="company-logo" src="images/logos/<?= $company["symbol"]?>.svg" alt="Logo for <?= $company["name"]?>">
<!--            <form method="post" id="company-btns">-->
<!--                <button class="button" id="addFav" name="addFav" value="addFav" type="submit">Add to Favorites</button>-->
<!--                <button class="button" id="history" name="history" value="History" type="submit">History</button>-->
<!--            </form>-->
        </span>
        <div class="company-style">
            <h2><?= $company["name"]?>    ("<?= $company["symbol"]?>")</h2>
            <form method="post" id="company-btns">
                <button class="button" id="addFav" name="addFav" value="addFav" type="submit">Add to Favorites</button>
                <button class="button" id="history" name="history" value="History" type="submit">History</button>
                <button class="button"><a href="<?= $company["website"]?>">Visit their website</a></button>
            </form>
            <div><?= $company["description"]?></div>
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