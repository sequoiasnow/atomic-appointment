<?php
/**
 * Define some default variables relating to file systems.
 *
 * Includes mostly $path variables and are defined globally.
 */

// The path to the root directory.
define( 'ROOT_DIR', __DIR__ );

// Load the config file for the site.
require_once ROOT_DIR . '/config.php';

// Allow requests to be made to the database...
require_once ROOT_DIR . '/php/database/database.php';

// Define wether the site is administrative.
define( 'IS_ADMIN', call_user_func(function() {
    if ( $_SESSION['USER_NAME'] ) {
        // Check if a database user is in fact real.
        $user = Database::getUser( array( 'name' ) => $_SESSION['USER_NAME'] );
        if ( ! $user ) { return false; }

        // Check if the user has the correct password.
        return $user->password == $_SESSION['USER_PASSWORD'];
    }
    return false;
}) );




include 'tmpl/header.php'; ?>

<?php include 'tmpl/footer.php'; ?>
