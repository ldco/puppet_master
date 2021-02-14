<?php

declare(strict_types=1);

function pmTranslate($_lang, $_text, $ajax)

{
    global $DB;
    if ($ajax === true) {
        $arr = [];
    } else {
        $arr = json_encode([]);
    }
    $result = $DB->select("pm_loc", "*");
    if ($result) {
        foreach ($result as $row) {
            if ($row["en"] === $_text) {
                if ($row[$_lang]) {
                    return $arr = $row[$_lang];
                } else {
                    return $arr = $row["en"];
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

$lang = isset($_POST["lang"]) ? $_POST["lang"] : null;
$text = isset($_POST["text"]) ? $_POST["text"] : null;

pmTranslate($lang, $text, true);