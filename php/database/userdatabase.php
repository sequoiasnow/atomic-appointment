<?php

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
            $user = new User( $user );
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
