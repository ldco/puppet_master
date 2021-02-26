<!DOCTYPE html>
<!-- MADE WITH PUPPET MASTER -->


<html lang="<?= PM_LANG ?>" dir="<?= PM_DIRECTION ?>" data-device="<?= PM_DEVICETYPE ?>" <?php if (PM_ISMOBILENOW) : ?>
    data-mobos="<?= PM_MOBOSNOW ?>" <?php endif; ?> data-local="<?= var_export(PM_IS_LOCAL) ?>"
    data-dev="<?= var_export(PM_IS_DEV) ?>" data-webp="<?= var_export(PM_WEBP) ?>"
    data-onepage="<?= var_export(PM_ONEPAGER) ?>" data-header="<?= PM_HEADER ?>"
    data-footer="<?= var_export(PM_FOOTER) ?>" data-skeleton="<?= PM_SKELETON_CASE ?>"
    data-router="<?= var_export(PM_PHP_ROUTING) ?>">

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