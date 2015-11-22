<?php
// Get some config files.
require_once __DIR__ . '/../config.php';

// Get the contents of the init mysql file.
ob_start();
include 'init.mysql.php';
$mysql = ob_get_contents();
ob_clean();

// Execute the building of the mysql through exec
print shell_exec( 'mysql -u ' . DB_USER . ' -p\'' . DB_PASS . '\' ' . DB_NAME . ' < ' . $mysql );
