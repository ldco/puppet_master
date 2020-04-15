<?php


if (isset($_POST["sh"])) {

    $start = "starting script " . $_POST["sh"] . "...";
    $shell =   shell_exec("cd SDK/sh && ./" . $_POST["sh"] . ".sh");

    echo  $start;
    if ($shell) {
        echo $shell;
    } else {
        echo ("matrix error...");
    }
} else {
    echo ("matrix error...");
}
