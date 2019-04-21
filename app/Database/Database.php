<?php


namespace Database;


use PDO;
use PDOException;

class Database
{
    private static $databaseConnection;

    /**
     * Exicutes a query and places it a model
     * @param string $query
     * @param array $prams
     * @param $model
     * @return array
     */
    public static function modelQuery(string $query, array $prams, $model)
    {
        $statement = self::getDatabaseConnection()->prepare($query);
        $statement->execute($prams);
        return $statement->fetchAll(PDO::FETCH_CLASS, get_class($model));
    }

    /**
     * Insert Data into a model
     * @param string $table
     * @param array $attributes
     * @return int
     */
    public static function insert(string $table, array $attributes)
    {
        $queryString = "INSERT INTO $table (";
        $values = array();

        foreach ($attributes as $attribute => $value) {
            $queryString .= " $attribute ,";
            $values[] = $value;
        }
        $queryString = substr($queryString, 0, -1);
        $queryString .= ') VALUES (';

        for ($i = 0; $i < count($values); $i++) {
            $queryString .= ' ? ,';
        }

        $queryString = substr($queryString, 0, -1);
        $queryString .= ');';

        $pdo = self::getDatabaseConnection();
        $statement = $pdo->prepare($queryString);
        $statement->execute($values);
        return $pdo->lastInsertId();
    }

    /**
     * Gets a single database connection
     * @return PDO
     */
    public static function getDatabaseConnection()
    {
        if (!isset(self::$databaseConnection)) {
            self::$databaseConnection = self::connect();
        }
        return self::$databaseConnection;
    }

    /**
     * Gets a confection to the database
     * @return PDO
     */
    private static function connect()
    {
        $host = $_ENV['DB_HOST'];
        $db = $_ENV['DB_USERNAME'];
        $user = $_ENV['DB_DATABASE'];
        $pass = $_ENV['DB_PASSWORD'];

        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        try {
            return new PDO($dsn, $user, $pass, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}