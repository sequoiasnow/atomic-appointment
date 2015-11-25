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


/**
 * Determine the type of the page that is to be loaded.
 *
 * This is bassed off of user authentication as administrator or otherwise.
 */
$pageType = 'login';


/**
 * Allowes the inclusion of a file from the tmpl files.
 *
 * Any data provided will be passed as $args.
 */
$args = array();
function includeTemplate( $file, $vars = array() ) {
    global $args;
    $oldArgs = $args;
    $args = $vars;

    include __DIR__ . "/tmpl/{$file}.php";

    $args = $oldArgs;
}

includeTemplate( 'header', array( 'pageType' => $pageType ) ); ?>


    <?php
    /**
     * Determines the basis of the nature of the page.
     *
     * If the user is not logged in, create the initial login screen.
     */
    includeTemplate( 'login' )
    ?>



<?php includeTemplate( 'footer' ); ?>
