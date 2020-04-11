<?php

declare(strict_types=1);

require_once "main.ftp.php";

return [
    "my site" => [
        "remote" => REMOTE_ROOT . "www",
        "local" => LOCAL_ROOT . LOCAL_DIST . "www/",
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
