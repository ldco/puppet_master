<?php

declare(strict_types=1);


namespace sys\Controller;

use Medoo\Medoo;

require_once PM_ROOT . "vendor/catfan/medoo/src/Medoo.php";

require_once (dirname($_SERVER['DOCUMENT_ROOT'], 1)) . "/config.ini.php";

class DB extends Medoo
{

    public function __construct($dbhost = DB_HOST, $dbuser = DB_USER, $dbpass = DB_PASS, $dbname = DB_NAME, $dbtype = DB_TYPE, $charset = 'utf8mb4')
    {
        $this->connection = new Medoo([

            // required
            'database_type' => $dbtype,
            'database_name' => $dbname,
            'server' => $dbhost,
            'username' => $dbuser,
            'password' => $dbpass,

            // [optional]
            'charset' => $charset,
            /* 
'collation' => 'utf8mb4_general_ci',
'port' => 3306, */

            // [optional] Table prefix
            /* 'prefix' => 'PREFIX_', */

            // [optional] Enable logging (Logging is disabled by default for better performance)
            /* 'logging' => true, */

            // [optional] MySQL socket (shouldn't be used with server and port)
            /* 'socket' => '/tmp/mysql.sock', */

            // [optional] driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
            /* 'option' => [
PDO::ATTR_CASE => PDO::CASE_NATURAL
], */

            // [optional] Medoo will execute those commands after connected to the database for initialization
            /* 'command' => [
'SET SQL_MODE=ANSI_QUOTES'
] */
        ]);
    }
}