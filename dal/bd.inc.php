<?php

function connexionBDD(){

    global $root;

    $ini = parse_ini_file("$root/env/db.ini");

    $server = $ini['db_address'];
    $port = $ini['db_port'];
    $db =  $ini['db_name'];
    $user = $ini['db_user'];
    $pwd = $ini['db_password'];

    $conn = pg_connect("host=$server port=$port dbname=$db user=$user password=$pwd");
    return $conn;
}

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog de test
    header('Content-Type:text/plain');

    echo "connexionBDD() : \n";
    print_r(connexionBDD());
}
/* test */
