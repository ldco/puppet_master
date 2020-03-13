<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
if (defined("PM_IS_LOCAL") && PM_IS_LOCAL) :
    $cssDependFile = "master.css";
    $jsDependFile = "master.js";
else :
    $cssDependFile = "master.min.css";
    $jsDependFile = "master.min.js";
endif;
?>

<link href="<?= PM_ROOT_REL ?>/www/<?= $cssDependFile ?>" rel="stylesheet">
<script src="<?= PM_ROOT_REL ?>/www/<?= $jsDependFile ?>"></script>
<link rel="apple-touch-icon" sizes="180x180" href="/<?= PM_SYS_FOLDER ?>/assets/favicons/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/<?= PM_SYS_FOLDER ?>/assets/favicons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="194x194" href="/<?= PM_SYS_FOLDER ?>/assets/favicons/favicon-194x194.png">
<link rel="icon" type="image/png" sizes="192x192" href="/<?= PM_SYS_FOLDER ?>/assets/favicons/android-chrome-192x192.png">
<link rel="icon" type="image/png" sizes="16x16" href="/<?= PM_SYS_FOLDER ?>/assets/favicons/favicon-16x16.png">
<link rel="manifest" href="/<?= PM_SYS_FOLDER ?>/assets/favicons/site.webmanifest">
<link rel="mask-icon" href="/<?= PM_SYS_FOLDER ?>/assets/favicons/safari-pinned-tab.svg" color="#aa0000">
<meta name="msapplication-TileColor" content="#aa0000">
<meta name="theme-color" content="#2f2f2f">