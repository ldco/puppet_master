<?php

declare(strict_types=1);

require_once "main.ftp.php";

createFolder("vendor");

return [
    "my site" => [
        "remote" => REMOTE_ROOT . "vendor/",
        "local" => LOCAL_ROOT . "vendor/",
        "test" => false,
        "ignore" => "
    ",

        "include" => "
        ",

        "allowDelete" => true,
        "before" => [],
        "afterUpload" => [
            /*  "http://example.com/deployment.php?afterUpload", */],
        "after" => [
            /*  "http://example.com/deployment.php?after", */],
        "purge" => [
            /*   "temp/cache", */],
        /*  "preprocess" => ["combined.js", "combined.css"], */
    ],

    "tempDir" => __DIR__ . "/temp",
    "colors" => true,
];
