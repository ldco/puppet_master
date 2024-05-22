<?php

declare(strict_types=1);
require_once "main.ftp.php";
$aboveRemRoot = "ftp://" . urlencode(REMOTE_USER) . ":" . urlencode(REMOTE_FTPPASS) . "@" . REMOTE . "/" . PM_REMOTE_APPFOLDER;
$aboveLocRoot = dirname(LOCAL_ROOT, 1);
return [
    "my site" => [
        "remote" => $aboveRemRoot  . "/",
        "local" => LOCAL_ROOT,
        "test" => false,
        "ignore" => "
		",
        "include" =>
        "testpmftp",
        "allowDelete" => true,
        "before" => [
            "createpmdev.php"
        ],
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