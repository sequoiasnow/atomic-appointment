<?php
/**
 * @package AtomicAppointment
 *
 * Is the header of the page, comes before the content and contains is as
 * a basic html structure.
 */

if ( $args ) {
    extract( $args );
}

?>
<!DOCTYPE html>
<html>
    <head>
        <!-- meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">

        <!-- css -->
        <link rel="stylesheet" type="text/css" href="dist/css/main.css" />
    </head>
    <body class="<?php echo $pageType; ?>">
