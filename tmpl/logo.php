<?php
/**
 * Defines a logo for the site, as this atomic-appointemtnt.
 *
 * Works in coordination with scss/components/_logo.php
 */

// Set up default arguments...
$logoDefautls = array(
    'embossed' => false,
);

// Show the varaibles.
extract( array_merge( $logoDefautls, $args ) );
?>
<div class="logo <?php print $embossed ? 'embossed' : ''; ?>">

    <div class="ring">
        <div class="electron"></div>
    </div>

    <div class="ring">
        <div class="electron"></div>
    </div>

    <div class="ring">
        <div class="electron"></div>
    </div>


    <div class="center"></div>

</div> <!-- .logo -->
