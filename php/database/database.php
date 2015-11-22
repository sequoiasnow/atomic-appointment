<?php
/**
 * Define's a class that uses static methods to allow for a global namespace
 * for the use of a database.
 */
class Database {
    // The connection for the database.
    private static $connection;

    /**
     * Opens a new database connection with parameters from config.php
     */
    private static function openConnection() {
        self::$connection = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME );

        if ( self::$connection->connect_errno ) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
    }

    /**
     * Closses the connection to the database... use openConnection() to renew.
     */
    protected static function closeConnection() {
        self::$connection->close();
        self::$conneciton = false;
    }

    /**
     * Returns the connection and opens it if is necessary.
     *
     * @return mysqli.
     */
    protected static function getConnection() {
        if ( ! self::$connection ) {
            self::openConnection();
        }
        return $connection;
     }

    /**
     * Turns an associative array into an array of format col=val.
     *
     * @param array $array
     *
     * @return array
     */
    protected static function makeArrayColVal( $array ) {
        return array_map( function( $k, $v ) {
            return "`$k`='$v'";
        }, array_keys( $where ), array_values( $where ) );
    }

    /**
     * Perform a mysqli query.
     *
     * @param string $query
     *
     * @return mysqli::query
     */
    public static function query( $statement ) {
        $connection = self::getConnection();
        return $connection->query( $statement );
    }

    /**
     * Query a table to select where certain columns are certain values.
     *
     * @param array $what
     * @param string $which
     * @param array $where
     *
     * @return array
     */
    public static function select( $what, $which, $where = false ) {
        // Start by preparing the query string...
        $query = 'SELECT ';
        $query .= implode( $what, ', ' ) . ' ';
        $query .= 'FROM '. $which . ' ';

        if ( $where ) {
            // Create the where array.
            $where = self::makeArrayColVal( $where );

            $query .= 'WHERE ' . implode( $where, ', ' );
        }

        // Execute the function.
        $res = self::query( $query );

        // Create the two dimensional array.
        $array = array();
        while( $row = $res->fetch_assoc() ) {
            $array[] = $row;
        }

        // Close the resonse.
        $res->close();

        return $array;
    }

    /**
     * Perform an insert into a table.
     *
     * @param string $table
     * @param array $data
     *
     * @return mysqli::result || false
     */
    public static function insert( $table, $data ) {
        // Create the query string.
        $query = 'INSERT INTO ' . $table . ' ';
        $query .= '(' . implode( array_keys( $data ), ', ' ) . ')' . ' ';
        $query .= 'VALUES (' . implode( array_values( $data ), ', ' ) . ')';

        // Get the connection
        $connection = self::getConnection();

        return $connection->query( $query );
    }

    /**
     * Perform an insert into a table.
     *
     * @param string $table
     * @param array $data
     *
     * @return mysqli::result || false
     */
    public static function update( $where, $table, $data ) {
        // Create the query string.
        $query = 'UPDATAE ' . $table . ' ';
        $query .= 'SET ' . implode( self::makeArrayColVal( $data ), ', ' ) . ' ';
        $query .= 'WHERE ' . implode( self::makeArrayColVal( $where ), ', ' );

        // Get the connection
        $connection = self::getConnection();

        return $connection->query( $query );
    }
}

/**
 * Include relevant extensions of the Database class.
 */
require_once 'userdatabase.php';
