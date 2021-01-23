<?php

declare(strict_types=1);

if (
    !empty($_SERVER) && !empty($_SERVER['SERVER_SOFTWARE']) && (strpos($_SERVER['SERVER_SOFTWARE'], 'PHP') !== false) &&
    strpos($_SERVER['SERVER_SOFTWARE'], 'Development') && strpos($_SERVER['SERVER_SOFTWARE'], 'Server')
) {
    define("PM_RUN_DEV", true);
    session_start();
}

if (file_exists(dirname($_SERVER['DOCUMENT_ROOT'], 1) . "/config.ini.php")) {
    require dirname($_SERVER['DOCUMENT_ROOT'], 1) . "/config.ini.php";
} else {
    throw new Exception("No config file found!");
}

if (basename($_SERVER['DOCUMENT_ROOT']) === PM_REMOTE_APPFOLDER) {
    if (PM_IS_DEV) {
        require_once $_SERVER['DOCUMENT_ROOT'] . "/PM_DEV/" . PM_SYS_FOLDER . "/Model/startup.model.php";
        require_once $_SERVER['DOCUMENT_ROOT'] . "/PM_DEV/" . PM_SYS_FOLDER . "/Controller/Main.ctrl.php";
        error_log(print_r("is dev", TRUE));
    } else {
        require_once $_SERVER['DOCUMENT_ROOT'] . "/" . PM_SYS_FOLDER . "/Model/startup.model.php";
        require_once $_SERVER['DOCUMENT_ROOT'] . "/" . PM_SYS_FOLDER . "/Controller/Main.ctrl.php";
        error_log(print_r("is not dev", TRUE));
    }
} else {
    require_once $_SERVER['DOCUMENT_ROOT'] . "/" . PM_SYS_FOLDER . "/Model/startup.model.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/" . PM_SYS_FOLDER . "/Controller/Main.ctrl.php";
    error_log(print_r("is not on server", TRUE));
}