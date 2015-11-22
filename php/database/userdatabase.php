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
        // Check if the user has an id, if not save the user as a new 
    }
}
