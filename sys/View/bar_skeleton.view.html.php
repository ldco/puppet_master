<div id="<?= $navBarId; ?>">

    <div id="<?= $barLogo ?>">
    </div>

    <nav id="<?= $navId; ?>">
        <?php $modelNav->index();
        $modelNav->makeLang(false); ?>
    </nav>
    <?php if ($definedLogin) : ?>
    <div id="pm_admin_panel">
        <?php if ($isAuthenticated) $modelBar->makeLogout(); ?>
    </div>
    <?php endif; ?>
    <?php pmImg("bar asset", $nav_pm_bar_asset, true, "anim", $bar_asset); ?>
</div>