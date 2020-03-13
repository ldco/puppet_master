<?php


declare(strict_types=1);


use sys\Controller\DB;

require_once $_SERVER['DOCUMENT_ROOT'] . "/" . "sys/Model/startup.model.php";
require_once PM_ROOT . PM_SYS_FOLDER . "/Controller/DB.class.ctrl.php";

$name = isset($_POST["name"]) ? $_POST["name"] : '';
$lang = isset($_POST["lang"]) ? $_POST["lang"] : null;

$name = array_values(json_decode($name));

$arr = array();

$DB = new DB;

foreach ($name as $key => $value) {
    $result = $DB->query("SELECT * FROM pm_loc where en = ?", $value);
    array_push($arr, $result->fetchAll());
}
echo json_encode($arr);
exit;
