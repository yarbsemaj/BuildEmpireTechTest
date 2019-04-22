<?php


namespace Database;


use PDO;
use PDOException;
use PDOStatement;

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
    public static function insert($table, array $attributes)
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
     * Updates the model in the database
     * @param string $table
     * @param array $attributes
     * @param string $primaryKey the name of the primary key,this value must be in the attributes array
     */
    public static function update($table, array $attributes, $primaryKey = 'id')
    {
        $queryString = "UPDATE $table SET";
        $values = array();

        foreach ($attributes as $attribute => $value) {
            $queryString .= " $attribute = ? ,";
            $values[] = $value;
        }
        $queryString = substr($queryString, 0, -1);
        $queryString .= "WHERE $primaryKey = ? ;";
        $values[] = $attributes[$primaryKey];

        $pdo = self::getDatabaseConnection();
        $statement = $pdo->prepare($queryString);
        $statement->execute($values);
    }

    /**
     * Removes a model form the database
     * @param string $table
     * @param string $pkey
     * @param string|int $value
     */
    public static function delete($table, $pkey, $value)
    {
        $queryString = "DELETE FROM $table WHERE $pkey = ? ;";
        $values = [$value];

        $pdo = self::getDatabaseConnection();
        $statement = $pdo->prepare($queryString);
        $statement->execute($values);
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
     * Query the database
     * @param string $query
     * @param array $prams
     * @return bool|PDOStatement
     */
    public static function query(string $query, array $prams)
    {
        $statement = self::getDatabaseConnection()->prepare($query);
        $statement->execute($prams);

        return $statement;
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