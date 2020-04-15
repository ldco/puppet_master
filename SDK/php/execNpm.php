<?php


if (isset($_POST["npm"])) {
    $strtok =  strtok($_POST["npm"], " (");
    $start = "starting npm run " . $strtok . "...";
    $shell = shell_exec("npm run " . $strtok);
    echo  $start;
    if ($shell) {
        echo $shell;
    } else {
        echo ("matrix error...");
    }
} else {
    echo ("matrix error...");
}
