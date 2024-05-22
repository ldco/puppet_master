<?php


require_once "../../../config.ini.php";

$root = shell_exec("cd " . LOCAL_ROOT . " && pwd");
if ($root) {
    echo "Welcome, MASTER " . PM_BYWHO . "!";
    echo "<br>";
    echo "<br>";
    echo "Your working directory is: " . $root;
    echo "<br>";
    echo "<br>";
    echo "You are working on: " . REMOTE;
    if (PM_IS_DEV) {
        echo "<br>";
        echo "<br>";
        echo "PM_DEV mode is: ON";
    } else {
        echo "<br>";
        echo "<br>";
        echo "PM_DEV mode is: OFF";
    }
    echo "<br>";
    echo "<br>";
    echo "Git repo is: " . PM_GIT_REPO;
} else {
    echo ($th . "Matrix ERROR... :(");
}