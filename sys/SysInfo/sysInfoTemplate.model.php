<?php
if (!empty($_POST["pm_lang"])) {
    $pm_lang = $_POST["pm_lang"];
} else {
    $pm_lang = "en";
}
if (!empty($_POST["pm_theme"])) {
    $pm_theme_l = $_POST["pm_theme"];
} else {
    $pm_theme_l = false;
}

if (!$pm_theme_l) {
    if (file_exists("../../www/master-d.css")) {
        $filepathtocss = "../../www/master-d.css";
    } else {
        $filepathtocss = "../../www/master-d-prod.min.css";
    }
} else {
    if (file_exists("../../www/master-l.css")) {
        $filepathtocss = "../../www/master-l.css";
    } else {
        $filepathtocss = "../../www/master-l-prod.min.css";
    }
}




?>

<html lang=<?= $pm_lang ?>>

<title>INFO</title>
<link rel="icon" type="image/png" href="../assets/favicons/favicon.ico">
<link rel="stylesheet" href="<?= $filepathtocss ?>" />


<?php

$sysInfopageTextLoc = array(
    "404" => array(
        "en" => "page not found",
        "ru" => "страница не найдена",
        "he" => "הדף לא נמצא"
    ),
    "mailSuc" => array(
        "en" => "the mail has been sent successfully",
        "ru" => "письмо было успешно отправлено",
        "he" => "המייל נשלח בהצלחה"
    ),
    "mailUnSuc" => array(
        "en" => "there was an error sending mail",
        "ru" => "произошла ошибка при отправке электронной почты",
        "he" => "אירעה שגיאה בשליחת דואר אלקטרוני"
    ),
    "undConst" => array(
        "en" => "",
        "ru" => "",
        "he" => ""
    ),
    "undMain" => array(
        "en" => "",
        "ru" => "",
        "he" => ""
    ),
    "goHome" => array(
        "en" => "to home page",
        "ru" => "на главную страницу",
        "he" => "לדף הבית"
    ),
    "goBack" => array(
        "en" => "go back",
        "ru" => "вернуться назад",
        "he" => "לעמוד קודם"
    )

);

?>