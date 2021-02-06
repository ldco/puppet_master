<div id="<?= $navBarId; ?>">
    <a href="#">
        <div id="<?= $barLogo ?>" class="<?= $barLogo ?>">
        </div>
    </a>
    <nav id="<?= $navId; ?>">
        <?php $modelNav->index();
        $modelNav->makeLang(false); ?>
    </nav>
    <?php if ($definedLogin) : ?>
    <div id="pm_admin_panel">
        <?php if ($isAuthenticated) $modelBar->makeLogout(); ?>
    </div>
    <?php endif; ?>
    <?php pmImg("bar asset", $nav_pm_bar_asset, true, "anim", "pm_bar_asset"); ?>
</div>