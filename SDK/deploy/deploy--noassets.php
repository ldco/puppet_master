<?php

declare(strict_types=1);

require_once "main.ftp.php";



return [
    "my site" => [
        "remote" => REMOTE_ROOT . "sys/",
        "local" => LOCAL_ROOT . "www/sys/",
        "test" => false,
        "ignore" => "
     assets
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