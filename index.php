<?php

declare(strict_types=1);



if (file_exists(dirname($_SERVER['DOCUMENT_ROOT'], 1) . "/config.ini.php")) {
    require dirname($_SERVER['DOCUMENT_ROOT'], 1) . "/config.ini.php";
} else {
    throw new Exception("No config file found!");
}

if (basename($_SERVER['DOCUMENT_ROOT']) === PM_REMOTE_APPFOLDER) {
    if (PM_IS_DEV) {
        require_once $_SERVER['DOCUMENT_ROOT'] . "/PM_DEV/" . PM_SYS_FOLDER . "/Model/startup.model.php";
        require_once $_SERVER['DOCUMENT_ROOT'] . "/PM_DEV/" . PM_SYS_FOLDER . "/Controller/Main.ctrl.php";
    } else {
        require_once $_SERVER['DOCUMENT_ROOT'] . "/" . PM_SYS_FOLDER . "/Model/startup.model.php";
        require_once $_SERVER['DOCUMENT_ROOT'] . "/" . PM_SYS_FOLDER . "/Controller/Main.ctrl.php";
    }
} else {
    require_once $_SERVER['DOCUMENT_ROOT'] . "/" . PM_SYS_FOLDER . "/Model/startup.model.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/" . PM_SYS_FOLDER . "/Controller/Main.ctrl.php";
}
