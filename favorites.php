<?php
require_once ("assign_2.classes.inc.php");
require_once ("config.inc.php");
require_once ("assign2.navbar.inc.php");
session_start();
$login = true;
if( !isset($_SESSION['userID']) ) {
    $_SESSION['userID'] = null;
    $login = false;
}
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
        <?php buildNav($login, "favorites"); ?>
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