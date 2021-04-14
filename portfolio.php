<?php
require_once("portfolio.inc.php");
require_once("assign_2.classes.inc.php");
require_once("config.inc.php");
require_once("assign2.navbar.inc.php");
session_start();
$login = false;
try {
    $conn = DatabaseHelper::createConnection(array(DBCONNSTRING, DBUSER, DBPASS));
    $portfolioGateway = new PortfolioDB($conn);

    if (isset($_SESSION["userID"]) && $_SESSION["userID"] != null) {
        $user = $_SESSION["userID"]; //checking to see if user is logged in; 
        $result = $portfolioGateway->getPortfolio($_SESSION["userID"]);
        $login = true;
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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/stylePort.css">
    <link rel="stylesheet" href="css/navbar.css">
    <script src="js/navbar.js"></script>
</head>

<body>
    <?php buildNav($login, "portfolio"); ?>
    <main class="container">
        
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