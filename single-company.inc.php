<?php
function doesFavoriteExist($symbol, $fetchedData) {
    $exists = false;
    
    foreach($fetchedData as $company) {
        if ($company['symbol'] == $symbol) {
            $exists = true;
        }
    }
    return $exists;
}

?>