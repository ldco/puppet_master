<?php

declare(strict_types=1);

use sys\Controller\DB;

require_once PM_ROOT . PM_SYS_FOLDER . "/Model/startup.model.php";

require_once PM_ROOT . PM_SYS_FOLDER . "/Controller/DB.class.ctrl.php";

function pmTranslate($_lang, $_text, $ajax)

{
    $DB = new DB();
    if ($ajax == true) {
        $arr = [];
    } else {
        $arr = json_encode([]);
    }
    $result = $DB->queryRaw("SELECT * FROM pm_loc");
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            if ($row["en"] == $_text) {
                if ($row[$_lang]) {
                    return $arr = $row[$_lang];
                } else {
                    return $arr = $row["en"];
                }
            } else {
                //$arr = $_text;
            }
        }
    }
    if ($ajax == true) {
        return json_encode($arr);
    } else {
        return $arr;
    }
}