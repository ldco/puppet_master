<?php


if (isset($_POST["npm"])) {
    $el =  strtok($_POST["npm"], " (");
    $start = "starting npm run " . $el . "...";
    $shell = shell_exec("npm run " . $el . "; echo $?");
    echo  $start;
    if ($shell) {
        echo $shell;
    }
}
