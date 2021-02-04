<!DOCTYPE html>
<!-- MADE WITH PUPPET MASTER -->
<?php
if (!$isAdmin) {
    $pmLangSkeletonView = PM_LANG;
    $pmDirSkeletonView = PM_DIRECTION;
    $ifIsAdmin = "false";
} else {
    $pmLangSkeletonView = PM_ADMIN_LANG;
    $pmDirSkeletonView = PM_ADMIN_DIRECTION;
    $ifIsAdmin = "true";
}

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

if (PM_BAR && !PM_FLOATBAR) {
    $dataBar = "true";
} else {
    $dataBar = "false";
}
?>

<html lang="<?= $pmLangSkeletonView ?>" dir="<?= $pmDirSkeletonView ?>" data-mob="<?= var_export(PM_ISMOBILENOW) ?>"
    data-tab="<?= var_export(PM_ISTABLETNOW) ?>" <?php if (PM_ISMOBILENOW || PM_ISTABLETNOW) : ?>
    data-mobos="<?= var_export(PM_MOBOSNOW) ?>" <?php endif; ?> data-admin="<?= $ifIsAdmin ?>"
    data-local="<?= $ifIsLocal ?>" data-dev="<?= $ifIsDev ?>" data-webp="<?= var_export(PM_WEBP) ?>"
    data-bar="<?= $dataBar ?>" data-footer="<?= var_export(PM_FOOTER) ?>" data-onepage="<?= var_export(PM_ONEPAGER) ?>"
    data-floatbar="<?= var_export(PM_FLOATBAR) ?>">


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

<body id="<?= PM_BODY_ID ?>" class="body">
    <div id="pm_overlay" style="display: none"></div>
    <?php
    $modelBar->index(); ?>
    </div>
    <?php if ($isAdmin) :
    ?>
    <main id="mainAdminContent"><?= $sPageContent; ?></main>
    <?php else : ?>
    <main id="mainContent"><?= $sPageContent; ?></main>
    <?php endif; ?>
    <a href="#">
        <div id="pm_gototop">
            <img alt="go top" src="<?= PM_ICONS_REL ?>/up.svg">
        </div>
    </a>
    <?php if (!$isAdmin) :
        if (defined("PM_FOOTER") && PM_FOOTER) $modelFooter->index();
    endif; ?>
</body>

</html>

<?php
/*  $shieldon = new \Shieldon\Firewall\Integration\Bootstrap();
        $shieldon->run(); */ ?>