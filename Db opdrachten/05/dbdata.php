<?php

$DB_NAME=
$DB_USER=
$DB_PASSWORD=
$DB_HOST=

$envSettings = [];
    if (file_exists(dirname(__FILE__).'/.env')) {
        $envSettings = parse_ini_file(dirname(__FILE__).'/.env'); 
    }

?>
