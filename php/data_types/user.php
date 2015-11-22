<?php
class User extends DataType {
    /**
     * Saving the User to the userdatabe.
     */
    public function save() {
        UserDatabase::saveUser( $this );
    }
}
