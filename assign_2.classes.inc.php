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
        // Ensure parameters are in an array
        if (!is_array($parameters) && $parameters != null) {
            $parameters = array($parameters);
        }
        $statement = null;
        if (is_array($parameters) && count($parameters) > 0) {
            // Use a prepared statement if parameters
            $statement = $connection->prepare($sql);
            $executedOk = $statement->execute($parameters);
            if (! $executedOk) throw new PDOException;
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
        return $statement->fetch();
    }
}

class FavoritesDB {
    private static $baseSQL = "SELECT favoriteid, userid, symbol FROM favorites";
    public function __construct($connection){
        $this->pdo = $connection;
    }

    public function getUserFavorites($id) {
        $sql = self::$baseSQL . " WHERE userid=?";
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, array($id));
        return $statement->fetchAll();
    }
}