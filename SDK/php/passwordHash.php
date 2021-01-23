<?php

if (isset($_POST["pass"])) {
    $password = $_POST["pass"];
    $options = [
        'cost' => 13
    ];
    echo  $password . "   -->   " . password_hash($password, PASSWORD_ARGON2I, $options);
} else {
    echo ("Matrix ERROR... :(");
}