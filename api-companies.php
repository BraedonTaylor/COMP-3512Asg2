<?php
require_once('config.inc.php');
require_once('assign_2.classes.inc.php');


header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');

function isQueryStringCorrect($param) {
    if( isset($_GET[$param]) && !empty($_GET[$param]) ) {
        return true;
    } else {
        return false;
    }
}

try {
    $conn = DatabaseHelper::createConnection(array(DBCONNSTRING, DBUSER, DBPASS));
    $gateway = new CompanyDB($conn);
    
    if ( isQueryStringCorrect("symbol") ) {
        $companies = $gateway->getAllForSymbol($_GET["symbol"]);
    } else {
        $companies = $gateway->getAll();
    }
    
    echo json_encode ($companies, JSON_NUMERIC_CHECK);
} catch (Exception $e) { die( $e->getMessage() ); }
?>
