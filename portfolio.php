<?php
require_once("portfolio.inc.php");
require_once("assign_2.classes.inc.php");
require_once("config.inc.php");
session_start();

try {
    $conn = DatabaseHelper::createConnection(array(DBCONNSTRING, DBUSER, DBPASS));
    $portfolioGateway = new PortfolioDB($conn);

    if (isset($_SESSION["userID"]) && $_SESSION["userID"] != null) {
        $user = $_SESSION["userID"]; //checking to see if user is logged in; 
        $result = $portfolioGateway->getPortfolio($_SESSION["userID"]);
        
        //Populate array of stocks
        
        foreach ($result as $row) {
            $portfolio[] = new Stock($row['symbol'], $row['name'], $row['amount'], $row['close']);
        }
    }
} catch (Exception $e) {
    die($e->getMessage());
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>COMP3512 Assignment 2</title>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">
    <link rel="stylesheet" href="css/stylePort.css">
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
    <main class="container">
        <p id="spacer"></p>
        <div class="box">
            <h3 id="portHeader">My Portfolio</h3>
            <div id="stockView">
                <?php
                tableBuilder($portfolio);
                ?>
            </div>
            <?php
            totalPortfolio($portfolio);
            ?>
        </div>
    </main>
</body>

</html>