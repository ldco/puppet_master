<?php

declare(strict_types=1);

function pmTranslate($_lang, $_text, $ajax)

{
    global $PM_DB;
    if ($ajax === true) {
        $arr = [];
    } else {
        $arr = json_encode([]);
    }
    $result = $PM_DB->select("pm_loc", "*");
    if ($result) {
        foreach ($result as $row) {
            if ($row["en"] === $_text) {
                if ($row[$_lang]) {
                    return $arr = $row["en"];
                } else {
                    return $arr = $row[$_lang];
                }
            }
        }
    }
    if ($ajax === true) {
        return json_encode($arr);
    } else {
        return $arr;
    }
}