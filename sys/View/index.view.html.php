<!DOCTYPE html>
<!-- MADE WITH PUPPET MASTER -->
<?php if (!$isAdmin) {
    $pmLangSkeletonView = PM_LANG;
    $pmDirSkeletonView = PM_DIRECTION;
} else {
    $pmLangSkeletonView = PM_ADMIN_LANG;
    $pmDirSkeletonView = PM_ADMIN_DIRECTION;
} ?>

<html lang="<?= $pmLangSkeletonView ?>" dir="<?= $pmDirSkeletonView ?>" mob="<?= var_export(PM_ISMOBILENOW) ?>" <?php if ($isAdmin) echo ' admin="true"'; ?>>

<head>
    <title><?= PM_TITLE ?></title>
    <?php $modelDepends->index(); ?>
</head>

<body id="" class="body">
    <a href="" name="gototop_placeholder"></a>
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
    <?php if (!$isAdmin) :
        if (defined("PM_FOOTER") && PM_FOOTER) $modelFooter->index();
    endif; ?>
</body>

</html>