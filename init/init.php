<?php
// Get some config files.
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../php/data_types/datatype.php';

// Get the contents of the init mysql file.
ob_start();
include 'init.mysql.php';
$mysql = ob_get_contents();
ob_clean();

file_put_contents( __DIR__ . '/temp.mysql', $mysql );

// Execute the building of the mysql through exec
echo shell_exec( 'mysql -u ' . DB_USER . ' -p\'' . DB_PASS . '\' ' . DB_NAME . ' < ' . __DIR__ . '/temp.mysql' );
