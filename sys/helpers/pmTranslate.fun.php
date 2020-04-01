<?php

declare(strict_types=1);

use sys\Controller\DB;

require_once PM_ROOT . PM_SYS_FOLDER . "/Controller/DB.class.ctrl.php";

function pmTranslate($_lang, $_text, $ajax)

{
    global $DB;
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
                    $arr = $row[$_lang];
                } else {
                    $arr = $row["en"];
                }
            } else {
                //$arr = $_text;
            }
        }
    }
    if ($ajax == true) {
        echo json_encode($arr);
    } else {
        echo $arr;
    }
}
