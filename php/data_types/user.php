<?php
class User extends DataType {
    const TableName = 'user';

    /**
     * Gets a user login.
     */
    public static function getLoggedInUser( $email, $pass ) {
        return UserDatabase::getUser( array(
            'email' => $email,
            'pass'  => hash( 'sha256', $pass ),
        ) );
    }

    /**
     * Get the users clients.
     */
    public function getClients() {
        return UserDatabase::getClients( $this );
    }

}
