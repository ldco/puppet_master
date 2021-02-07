<!DOCTYPE html>
<!-- MADE WITH PUPPET MASTER -->
<?php

$pmLangSkeletonView = PM_LANG;
$pmDirSkeletonView = PM_DIRECTION;
$ifIsAdmin = "false";


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

<html lang="<?= $pmLangSkeletonView ?>" dir="<?= $pmDirSkeletonView ?>" data-mob="<?= var_export(PM_ISMOBILENOW) ?>" data-tab="<?= var_export(PM_ISTABLETNOW) ?>" <?php if (PM_ISMOBILENOW || PM_ISTABLETNOW) : ?> data-mobos="<?= var_export(PM_MOBOSNOW) ?>" <?php endif; ?> data-local="<?= $ifIsLocal ?>" data-dev="<?= $ifIsDev ?>" data-webp="<?= var_export(PM_WEBP) ?>" data-header="<?= $dataBar ?>" data-footer="<?= var_export(PM_FOOTER) ?>" data-onepage="<?= var_export(PM_ONEPAGER) ?>" data-floatheader="<?= var_export(PM_FLOATHEADER) ?>">


<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());
        gtag("config", "GA_MEASUREMENT_ID");
    </script>
    <title><?= PM_RENDERED_TITLE ?></title>
    <?php $modelDepends->index(); ?>
</head>

<body>
    <div id="pm_overlay" style="display: none"></div>
    <?php
    $modelBar->index(); ?>
    <main><?= $sPageContent; ?></main>
    <a href="#">
        <div id="pm_gototop">
            <img alt="go top" src="<?= PM_ICONS_REL ?>up.svg">
        </div>
    </a>
    <?php if (defined("PM_FOOTER") && PM_FOOTER) $modelFooter->index(); ?>
</body>

</html>

<?php
/*  $shieldon = new \Shieldon\Firewall\Integration\Bootstrap();
        $shieldon->run(); */ ?>