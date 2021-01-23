<?php

declare(strict_types=1);

require_once "main.ftp.php";

if (PM_NEED_ADMIN) {
    $dist_ignore = "";
} else {
    $dist_ignore = "admin/*";
}


return [
    "my site" => [
        "remote" => REMOTE_ROOT,
        "local" => LOCAL_ROOT . "/dist",
        "test" => false,
        "ignore" => "
         $dist_ignore
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