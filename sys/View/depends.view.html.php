<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?= PM_META_DESCRIPT ?>">

<?php
if (PM_THEME_LIGHT) :
    $ccsMasterTheme = "master-l";
else :
    $ccsMasterTheme = "master-d";
endif;
if (defined("PM_IS_LOCAL") && PM_IS_LOCAL) :
    $cssDependFile = $ccsMasterTheme . ".css";
    $jsDependFile = "master.js";
else :
    $cssDependFile = $ccsMasterTheme . "-prod.min.css";
    $jsDependFile = "master.min.js";
endif;
?>

<link href="www/<?= $cssDependFile ?>" rel="stylesheet">
<script defer src="www/<?= $jsDependFile ?>"></script>


<!-- https://realfavicongenerator.net/ -->
<link rel="icon" type="image/png" sizes="16x16" href="core/assets/favicons/favicon.ico" async>
<link rel="icon" type="image/png" sizes="16x16" href="core/assets/favicons/favicon-16x16.png" async>
<link rel="icon" type="image/png" sizes="32x32" href="core/assets/favicons/favicon-32x32.png" async>
<link rel="icon" type="image/png" sizes="192x192" href="core/assets/favicons/android-chrome-192x192.png" async>
<link rel="icon" type="image/png" sizes="192x192" href="core/assets/favicons/android-chrome-512x512.png" async>
<link rel="icon" type="image/png" sizes="192x192" href="core/assets/favicons/android-chrome-512x512.png" async>
<link rel="image/png" sizes="150x150" href="core/assets/favicons/mstile-150x150.png" async>
<link rel="mask-icon" href="core/assets/favicons/safari-pinned-tab.svg" color="#ff8066" async>

<link rel="manifest" href="core/assets/favicons/site.webmanifest" async>

<meta name="msapplication-TileColor" content="#ff8066">
<meta name="theme-color" content="#019393">