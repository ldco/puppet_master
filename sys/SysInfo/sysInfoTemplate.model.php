<?php
if (!empty($_POST["pm_lang"])) {
    $pm_lang = $_POST["pm_lang"];
} else {
    $pm_lang = "en";
}

if (file_exists("../../www/master.css")) {
    $filepathtocss = "../../www/master.css";
} else {
    $filepathtocss = "../../www/master.min.css";
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