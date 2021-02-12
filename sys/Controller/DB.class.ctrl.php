<?php

declare(strict_types=1);


namespace sys\Controller;

use Mysqli;
use Medoo\Medoo;

require_once PM_ROOT . "vendor/catfan/medoo/src/Medoo.php";
require_once (dirname($_SERVER['DOCUMENT_ROOT'], 1)) . "/config.ini.php";
class DB extends Medoo
{

    public function __construct()
    {
        $database = new Medoo([
            // required
            'database_type' => DB_TYPE,
            'database_name' => DB_NAME,
            'server' => DB_HOST,
            'username' => DB_USER,
            'password' => DB_PASS,

            // [optional]
            /* 'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_general_ci',
            'port' => 3306, */

            // [optional] Table prefix
            /*  'prefix' => 'PREFIX_', */

            // [optional] Enable logging (Logging is disabled by default for better performance)
            /*  'logging' => true, */

            // [optional] MySQL socket (shouldn't be used with server and port)
            /* 'socket' => '/tmp/mysql.sock', */

            // [optional] driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
            /*   'option' => [
                PDO::ATTR_CASE => PDO::CASE_NATURAL
            ], */

            // [optional] Medoo will execute those commands after connected to the database for initialization
            /*   'command' => [
                'SET SQL_MODE=ANSI_QUOTES'
            ] */
        ]);
    }



    /* protected $connection = null;
    protected $query;
    public $query_count = 0;
    public function __construct($dbhost = DB_HOST, $dbuser = DB_USER, $dbpass = DB_PASS, $dbname = DB_NAME, $charset = 'utf8mb4')
    {
        $this->connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        if ($this->connection->connect_error) {
            die('Failed to connect to MySQL - ' . $this->connection->connect_error);
        }
        $this->connection->set_charset($charset);
    }

    public function query($query)
    {
        if ($this->query = $this->connection->prepare($query)) {
            if (func_num_args() > 1) {
                $moreArgs = func_get_args();
                $args = array_slice($moreArgs, 1);
                $types = '';
                $argsRef = array();
                foreach ($args as $key => &$arg) {
                    if (is_array($args[$key])) {
                        foreach ($args[$key] as $argBlockKey => &$argBlock) {
                            $types .= $this->_gettype($args[$key][$argBlockKey]);
                            $argsRef[] = &$argBlock;
                        }
                    } else {
                        $types .= $this->_gettype($args[$key]);
                        $argsRef[] = &$arg;
                    }
                }
                array_unshift($argsRef, $types);
                call_user_func_array(array($this->query, 'bind_param'), $argsRef);
            }
            $this->query->execute();
            if ($this->query->errno) {
                die('Unable to process MySQL query (check your params) - ' . $this->query->error);
            }
            $this->query_count++;
        } else {
            die('Unable to prepare statement (check your syntax) - ' . $this->connection->error);
        }
        return $this;
    }
    public function queryRaw($query)
    {
        if ($this->query = $this->connection->query($query)) {
            return $this->query;
        } else {
            echo 'Syntax error: ' . $this->connection->error . ', SQL : ' . $query;
            exit;
        }
    }

    public function fetchAll()
    {
        $params = array();
        $dataRow = [];
        $meta = $this->query->result_metadata();
        while ($field = $meta->fetch_field()) {
            $params[] = &$dataRow[$field->name];
        }
        call_user_func_array(array($this->query, 'bind_result'), $params);
        $result = array();
        while ($this->query->fetch()) {
            $resultRow = array();
            foreach ($dataRow as $key => $val) {
                $resultRow[$key] = $val;
            }
            $result[] = $resultRow;
        }
        $this->query->close();
        return $result;
    }

    public function fetchArray()
    {
        $params = [];
        $row = [];
        $meta = $this->query->result_metadata();
        while ($field = $meta->fetch_field()) {
            $params[] = &$row[$field->name];
        }
        call_user_func_array(array($this->query, 'bind_result'), $params);
        $result = array();
        while ($row = $this->query->fetch()) {
            foreach ($row as $key => $val) {
                $result[$key] = $val;
            }
        }
        $this->query->close();
        return $result;
    }

    public function numRows()
    {
        $this->query->store_result();
        return $this->query->num_rows;
    }

    public function close()
    {
        return $this->connection->close();
    }

    public function affectedRows()
    {
        return $this->query->affected_rows;
    }

    private function _gettype($var)
    {
        if (is_string($var)) return 's';
        if (is_float($var)) return 'd';
        if (is_int($var)) return 'i';
        return 'b';
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function __destruct()
    {
        $this->close();
    } */
}