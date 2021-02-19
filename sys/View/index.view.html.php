<!DOCTYPE html>
<!-- MADE WITH PUPPET MASTER -->
<?php

$pmLangSkeletonView = PM_LANG;
$pmDirSkeletonView = PM_DIRECTION;


if ($isLocal) {
    $ifIsLocal = "true";
    $ifIsDev = "local";
} else {
    $ifIsLocal = "false";
    if ($isDev) {
        $ifIsDev = "true";
    } else {
        $ifIsDev = "false";
    }
}

if (PM_HEADER && !PM_FLOATHEADER) {
    $dataBar = "true";
} else {
    $dataBar = "false";
}
?>

<html lang="<?= $pmLangSkeletonView ?>" dir="<?= $pmDirSkeletonView ?>" data-mob="<?= var_export(PM_ISMOBILENOW) ?>"
    data-tab="<?= var_export(PM_ISTABLETNOW) ?>" <?php if (PM_ISMOBILENOW || PM_ISTABLETNOW) : ?>
    data-mobos="<?= var_export(PM_MOBOSNOW) ?>" <?php endif; ?> data-local="<?= $ifIsLocal ?>"
    data-dev="<?= $ifIsDev ?>" data-webp="<?= var_export(PM_WEBP) ?>" data-header="<?= $dataBar ?>"
    data-footer="<?= var_export(PM_FOOTER) ?>" data-onepage="<?= var_export(PM_ONEPAGER) ?>"
    data-floatheader="<?= var_export(PM_FLOATHEADER) ?>" data-router="<?= var_export(PM_PHP_ROUTING) ?>">

<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>

    <!-- <script>
        //gtag
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag("js", new Date());
    gtag("config", "GA_MEASUREMENT_ID");
    </script> -->


    <title><?= PM_RENDERED_TITLE ?></title>
    <?php $modelDepends->index(); ?>
</head>

<body>
    <div id="pm_overlay" style="display: none"></div>
    <?php
    $modelHeader->index(); ?>
    <main><?= $sPageContent; ?>

    </main>
    <?php if (defined("PM_FOOTER") && PM_FOOTER) $modelFooter->index(); ?>
    <div id="pm_gototop">
        <img alt="go top" src="<?= PM_ICONS_REL ?>up.svg">
    </div>


</body>

</html>