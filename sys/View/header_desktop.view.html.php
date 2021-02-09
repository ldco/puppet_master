<header id="<?= $headerId; ?>">

    <div id="<?= $headerLogo ?>">
    </div>

    <nav id="<?= $navId; ?>">
        <?php $modelNav->index();
        $modelNav->makeLang(false); ?>
    </nav>
    <?php if ($definedLogin) : ?>
        <div id="pm_panel--header">
            <?php if ($isAuthenticated) $modelHeader->makeLogout(); ?>
        </div>
    <?php endif; ?>
    <?php pmImg("Asset", $nav_pm_asset, true, "anim", $bar_asset); ?>
</header>