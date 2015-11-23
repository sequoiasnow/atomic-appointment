<?php
require_once __DIR__ . '/../data_types/users.php';

class UserDatabase extends Database {
    /**
     * Returns users from the user array and creates a new user in each case.
     *
     * @param array $where
     */
    public static function getUsers( $where ) {
        $usersArray = self::select( array( '*' ), 'users', $where );

        // Transform the users Array into objects.
        foreach ( $usersArray as &$user ) {
            $user = new User( $user )
        }
        return $usersArray;
    }

    /**
     * Returns a single user from the database.
     *
     * @param array $where
     */
    public static function getUser( $where ) {
        $userArray = self::getUsers( $where );
        return isset( $userArray[0] ) ? $userArray[0] : null;
    }

    /**
     * Saves a new user, if the user has an id, if not provide one.
     *
     * @param User $user
     */
    public static function saveUser( &$user ) {
        // Check if the user has an id, if not save the user as a new and get
        // its id. Ensure the id is valid.
        $id = $user->getDataVar( 'id' );
        if ( $id && self::getUser( array( 'id' => $id ) ) ) {
            self::update( 'users', $user->getData(), array( 'id' => $id ) );
            return $user;
        }
        self::insert( 'users', $user->getData() );

        // Change the id.
        $user->setDataVar( 'id', ( self::getConnection() )->insert_id );

        // Return the user in case that is necessary.
        return $user;
    }

    /**
     * Get a users clients from the database.
     *
     * @param User $user
     *
     * @return array
     */
    public static function getClients( $user ) {
        $id = $user->getDataVal( 'id' );
        $array = self::select( array( '*' ), 'user_clients', array( 'id' => $id ) );

        foreach ( $array as &$client ) {
            $client = new Client( $array );
        }

        return $array;
    }
}
