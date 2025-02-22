<?php

declare(strict_types=1);
require_once PM_SYS . "/Model/Skeleton.index.model.php";

function show404()
{
    global $_SERVER;
    $serverProtocol = (empty($_SERVER["SERVER_PROTOCOL"]) ? 'HTTP/1.0' : $_SERVER["SERVER_PROTOCOL"]);
    header($serverProtocol . " 404 Not Found");

    require PM_SYS . "/SysInfo/404.php";
}

$needShowFull = true;

$needPageId = 1; //default page id
if (!empty($_REQUEST['show_page']) && preg_match('/^[a-z0-9]+$/s', $_REQUEST['show_page'])) {
    $needShowFull = true;
    $needPageId = trim($_REQUEST['show_page']);
} else if (!empty($_POST['id']) && preg_match('/^[a-z0-9]+$/s', $_POST['id'])) {
    $needPageId = trim($_POST['id']);
    $needShowFull = false;
}

$PM_PAGE_NUM = $needPageId;

if (empty($needPageId)) die(show404());

if (defined("PM_ONEPAGER") && !PM_ONEPAGER) {
    $viewPagePathPrefix = PM_CORE . "Pages";
}
if (defined("PM_ONEPAGER") && PM_ONEPAGER) {
    $viewPagePathPrefix = PM_CORE . "OnePager";
}

$viewPagePath = $viewPagePathPrefix . '/' . $needPageId . '.page.php';
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

$indexModel = new sys\Model\SkeletonIndex;
$indexModel->index($pageContent);