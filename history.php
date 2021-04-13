<?php
require_once('config.inc.php');
require_once('history.inc.php');
require_once('assign_2.classes.inc.php');
require_once ("assign2.navbar.inc.php");
session_start();
$login = false;
if (isset($_SESSION["userID"]) && $_SESSION["userID"] != null) $login = true;

try {
    $conn = DatabaseHelper::createConnection(array(DBCONNSTRING, DBUSER, DBPASS));
    $historyGateway = new HistoryDB($conn);
    
    if ( isset($_GET['symbol']) && !empty($_GET['symbol']) ) {
        
        if( isset($_GET['sort']) && !empty($_GET['sort']) ) {
            $stockData = $historyGateway->getAllForSymbolSort($_GET['symbol'], $_GET['sort']);
            
        } else {
            $stockData = $historyGateway->getAllForSymbol($_GET["symbol"]);
            
        }
    } else {
        $stockData = $historyGateway->getAll();
    }
    
} catch (Exception $e) { die( $e->getMessage() ); }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Stock History</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/history.css">
        <link rel="stylesheet" href="css/navbar.css">
        <script src="js/navbar.js"></script>
    </head>
    <body>
        <?php buildNav($login); ?>
        <h2>Monthly Stock Data</h2>
        <main class="table-container">
            <table id="stock-table">
                <tr>
                    <th id="date-header"><a href="http://localhost/comp-3512asg2/history.php?symbol=<?= $_GET['symbol']?>&sort=DATE">Date</a></th>
                    <th><a href="http://localhost/comp-3512asg2/history.php?symbol=<?= $_GET['symbol']?>&sort=OPEN">Open</a></th>
                    <th><a href="http://localhost/comp-3512asg2/history.php?symbol=<?= $_GET['symbol']?>&sort=HIGH">High</a></th>
                    <th><a href="http://localhost/comp-3512asg2/history.php?symbol=<?= $_GET['symbol']?>&sort=LOW">Low</a></th>
                    <th><a href="http://localhost/comp-3512asg2/history.php?symbol=<?= $_GET['symbol']?>&sort=CLOSE">Close</a></th>
                    <th><a href="http://localhost/comp-3512asg2/history.php?symbol=<?= $_GET['symbol']?>&sort=VOLUME">Volume</a></th>
                </tr>
            <?php
                foreach ( $stockData as $data ) {
                    $row = new TableRow($data['date'], $data['open'], $data['high'], $data['low'], $data['close'], $data['volume']);
                    
                    echo "<tr>";
                    echo "<td id='date-cell'>{$row->stockDate}</td>";
                    echo "<td>$". $row->currency($row->open) . "</td>";
                    echo "<td>$". $row->currency($row->high) . "</td>";
                    echo "<td>$". $row->currency($row->low) . "</td>";
                    echo "<td>$". $row->currency($row->close) . "</td>";
                    echo "<td>".  $row->volumeFormat($row->volume) . "</td>";
                    echo "</tr>";
                }
            ?>
            </table>
        </main>
    </body>
</html>