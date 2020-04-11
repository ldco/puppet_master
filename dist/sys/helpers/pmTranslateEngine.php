<?php
require_once "pmTranslate.fun.php";

$lang = isset($_POST["lang"]) ? $_POST["lang"] : null;
$text = isset($_POST["text"]) ? $_POST["text"] : null;

pmTranslate($lang, $text, true);
