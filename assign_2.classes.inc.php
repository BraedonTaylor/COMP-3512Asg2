<?php
class DatabaseHelper {
    /* Returns a connection object to a database */
    public static function createConnection( $values=array() ) {
        $connString = $values[0];
        $user = $values[1];
        $password = $values[2];
        $pdo = new PDO($connString,$user,$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        return $pdo;
    }
    /*
    Runs the specified SQL query using the passed connection and
    the passed array of parameters (null if none)
    */
    public static function runQuery($connection, $sql, $parameters = array()) {
        // Ensure parameters are in an array, unless parameters = null
        if (!is_array($parameters) && $parameters != null) {
            $parameters = array($parameters);
        }
        $statement = null;
        if (is_array($parameters) && count($parameters) > 0) {
            // Use a prepared statement if parameters
            $statement = $connection->prepare($sql);
            $executedOk = $statement->execute($parameters);
            if (!$executedOk) throw new PDOException;
        } else {
            // Execute a normal query
            $statement = $connection->query($sql);
            if (!$statement) throw new PDOException;
        }
        return $statement;
    }
}

class UserDB {
    private static $baseSQL = "SELECT id, firstname, lastname, city, country, email FROM users";
    public function __construct($connection){
        $this->pdo = $connection;
    }

    public function getUser($id){
        $sql = self::$baseSQL . " WHERE id=?";
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, array($id));
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

}
class CompanyDB {
    private static $baseSQL = "SELECT symbol, name, sector, subindustry, address, exchange, website, description FROM companies";
    public function __construct($connection) {
        $this->pdo = $connection;
    }
  
    public function getAll() {
        $sql = self::$baseSQL;
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, null);
        return $statement->fetchAll();
    }

    public function getAllForSymbol($symbol) {
        $sql = self::$baseSQL . " WHERE Companies.Symbol=?";
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($symbol));
        return $statement->fetchAll();
    }
}

class HistoryDB {
    private static $baseSQL = "SELECT date, open, high, low, close, volume FROM history";
    
    public function __construct($connection) {
        $this->pdo = $connection;
    }
    
    public function getAll() {
        $sql = self::$baseSQL;
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, null);
        return $statement->fetchAll();
    }
    
    public function getAllForSymbol($symbol) {
        $sql = self::$baseSQL . " WHERE history.symbol=? ORDER BY date";
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($symbol));
        return $statement->fetchAll();
    }
    
    public function getAllForSymbolSort($symbol, $sortParam) {
        $sql = self::$baseSQL . " WHERE history.symbol=? ORDER BY {$sortParam}";
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($symbol));
        return $statement->fetchAll();
    }
  
    public function getOneForSymbol($symbol){
        $sql = self::$baseSQL . " WHERE symbol=? LIMIT 1";
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, Array($symbol));
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}

class FavoritesDB {
    private static $baseSQL = "SELECT favoriteid, favorites.userid, favorites.symbol, companies.name FROM favorites INNER JOIN users ON favorites.userid = users.id INNER JOIN companies ON favorites.symbol = companies.symbol";
    public function __construct($connection) {
        $this->pdo = $connection;
    }

    public function getUserFavorites($id) {
        $sql = self::$baseSQL . " WHERE userid=?";
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, array($id));
        return $statement->fetchAll();
    }

    public function removeAll($id) {
        $sql = "DELETE FROM favorites WHERE userid=?";
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, array($id));
        return $statement;
    }

    public function removeSingle($id, $symbol) {
        $sql = "DELETE FROM favorites WHERE userid=? AND symbol=?";
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, array($id, $symbol));
        return $statement;
    }

    public function addFavorite($userID, $symbol){
        $sql = "INSERT INTO favorites(userid, symbol) VALUES (?, ?)";
        DatabaseHelper::runQuery($this->pdo, $sql, array($userID, $symbol));
}

class PortfolioDB {
    private static $baseSQL = "SELECT portfolio.symbol, portfolio.amount, portfolio.id, portfolio.userId, companies.name, history.close, history.date FROM portfolio, companies, history WHERE portfolio.symbol = companies.symbol AND portfolio.symbol = history.symbol AND history.date = '2019-03-29'";
    public function __construct($connection) {
        $this->pdo = $connection;
    }

    public function getPortfolio($id) {
        $sql = self::$baseSQL . " AND portfolio.userId = :id";
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, array($id));
        return $statement;
    }
}
