<?php

declare(strict_types=1);
require_once dirname($_SERVER['DOCUMENT_ROOT'], 1) . "/config.ini.php";
session_start();


function show404()
{
    global $_SERVER;
    $serverProtocol = (empty($_SERVER["SERVER_PROTOCOL"]) ? 'HTTP/1.0' : $_SERVER["SERVER_PROTOCOL"]);
    header($serverProtocol . " 404 Not Found");
    require PM_ROOT . PM_SYS_FOLDER . "/View/404.view.html.php";
}

require_once $_SERVER['DOCUMENT_ROOT'] . "/" . PM_SYS_FOLDER . "/Model/startup.model.php";
require_once PM_ROOT . PM_SYS_FOLDER . "/Model/Skeleton.index.model.php";

require_once "Model/login.class.php";
if (PM_SYS_FOLDER === "sys") {
    $login = new sys\Model\Login();
} elseif (PM_SYS_FOLDER === "core") {
    //$login = new core\Model\Login();
}


if ($login->isUserLoggedIn() == true) {
    /*
    $admin_session_status = session_status();
    if ($admin_session_status == PHP_SESSION_NONE) {
    //There is no active session
        session_name();
        session_start();
    } else if ($admin_session_status == PHP_SESSION_DISABLED) {
    //Sessions are not available
    } else if ($admin_session_status == PHP_SESSION_ACTIVE) {
    //Destroy current and start new one
        session_destroy();
        session_start();
    }
*/
    if (isset($_POST["user_name"])) {
        $user = $_POST["user_name"];
    }
    define("PM_LOGGING_ADMIN", true);
    $needShowFull = true;

    $needPageId = 1; //default page id
    if (!empty($_REQUEST['show_page']) && is_numeric($_REQUEST['show_page'])) {
        $needShowFull = true;
        $needPageId = floatval($_REQUEST['show_page']);
    } else if (!empty($_POST['id']) && is_numeric($_POST['id'])) {
        $needPageId = floatval($_POST['id']);
        $needShowFull = false;
    }


    if (empty($needPageId)) die(show404());

    $viewPagePathPrefix = PM_ROOT . "admin/Pages";
    $viewPagePath = $viewPagePathPrefix . '/' . $needPageId . '.page.html.php';
    if (!file_exists($viewPagePath)) die(show404());

    //run module for get content
    if ($needShowFull) {
        ob_start();
    }
    require $viewPagePath;
    if ($needShowFull) {
        $pageContent = ob_get_contents();
        ob_end_clean();
    } else {
        exit;
    }
} else {
    //require_once "Model/registration.class.php";
    ob_start();
    require_once("View/login.view.html.php");
    $pageContent = ob_get_contents();
    ob_end_clean();
}
//require_once PM_ROOT . "admin/View/index.view.html.php";

$indexModel = new sys\Model\SkeletonIndex;
$indexModel->index($pageContent);
