<?php

require_once "../../../config.ini.php";

$root = shell_exec("cd " . LOCAL_ROOT . " && pwd");

echo "Welcome, MASTER! Your working directory is " . $root;
