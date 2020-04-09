<?php
if (!empty($_POST["pm_lang"])) {
    $pm_lang = $_POST["pm_lang"];
} elseif ($_pm_lang) {
    $pm_lang = $_pm_lang;
} else {
    $pm_lang = "en";
}

if (file_exists("../../www/master.css")) {
    $fileapthtocss = "../../www/master.css";
} else {
    $fileapthtocss = "../../www/master.min.css";
}
?>

<html lang=<?= $pm_lang ?>>

<title>Puppet Master Info Page</title>
<link rel="stylesheet" href="<?= $fileapthtocss ?>" />

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

<script>
    document.addEventListener("DOMContentLoaded", pm_initSysInfoPage);

    function pm_initSysInfoPage() {

    }
</script>