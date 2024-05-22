<?php

declare(strict_types=1);

require_once "main.ftp.php";

if (PM_IS_DEV) {
    $uc_ignore = "drawing.svg";
} else {
    $uc_ignore = "*/";
}

$uc_remote = "ftp://" . urlencode(REMOTE_USER) . ":" . urlencode(REMOTE_FTPPASS) . "@" . REMOTE . "/" . PM_REMOTE_APPFOLDER . "/";

return [
    "my site" => [
        "remote" => $uc_remote,
        "local" =>
        LOCAL_ROOT . "SDK/underConstruction/",
        "ignore" => "
         $uc_ignore
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