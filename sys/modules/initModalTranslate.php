<?php

declare(strict_types=1);

use sys\Controller\DB;

require_once $_SERVER['DOCUMENT_ROOT'] . "/" . "sys/Model/startup.model.php";
require_once PM_SYS . "Controller/DB.class.ctrl.php";

$name = isset($_POST["name"]) ? $_POST["name"] : '';
$lang = isset($_POST["lang"]) ? $_POST["lang"] : null;

if (empty($name)) exit;
$name = array_values(json_decode($name));
if (!is_array($name)) exit;

global $DB;
if (!isset($DB)) $DB = new DB;

$sql = "SELECT * FROM `pm_loc` where `en` IN (";
$langCount = count($name);
if ($langCount > 1) $sql .= str_repeat(' ? ,', $langCount - 1);
$sql .= ' ? )';

$result = $DB->query($sql, $name);


$arrForJSON = [];
foreach ($result->fetchAll() as $oneRow) {
    if ($oneRow !== null) {
        $arrForJSON[] = $oneRow[$lang];
    }
}
echo json_encode($arrForJSON);

exit;
