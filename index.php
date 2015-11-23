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

// Include information about the data types.
require_once ROOT_DIR . '/php/data_types/datatype.php';

include 'tmpl/header.php'; ?>


    <?php
    /**
     * Determines the basis of the nature of the page.
     *
     * If the user is not logged in, create the initial login screen.
     */
    include 'tmpl/login.php';
    ?>



<?php include 'tmpl/footer.php'; ?>
