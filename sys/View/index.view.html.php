<!DOCTYPE html>
<!-- MADE WITH PUPPET MASTER -->
<?php if (!$isAdmin) {
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
    $ifIsDev = "";
} else {
    $ifIsLocal = "false";
    if ($isDev) {
        $ifIsDev = "true";
    } else {
        $ifIsDev = "false";
    }
}


?>

<html lang="<?= $pmLangSkeletonView ?>" dir="<?= $pmDirSkeletonView ?>" data-mob="<?= var_export(PM_ISMOBILENOW) ?>" data-admin="<?= $ifIsAdmin ?>" data-local="<?= $ifIsLocal ?>" data-dev="<?= $ifIsDev ?>">

<head>
    <title><?= PM_TITLE ?></title>
    <?php $modelDepends->index(); ?>
</head>

<body id="pm_body" class="body">

    <div id="pm_overlay" style="display: none"></div>
    <?php
    $modelBar->index(); ?>
    </div>
    <?php if ($isAdmin) :
    ?>
        <div id="mainAdminContent"><?= $sPageContent; ?></div>
    <?php else : ?>
        <div id="mainContent"><?= $sPageContent; ?></div>
    <?php endif; ?>

    <div id="pm_gototop">
        <img src="<?= PM_ICONS_REL ?>/up.svg">
    </div>

    <?php if (!$isAdmin) :
        if (defined("PM_FOOTER") && PM_FOOTER) $modelFooter->index();
    endif; ?>
</body>

</html>