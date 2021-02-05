<div id="<?= $navBarId; ?>" class="<?= $navBarClass; ?>">
    <a href="#">
        <div id="<?= $barLogo ?>" class="<?= $barLogo ?>">
            <?php pmImg("Logo", $navBarLogoImg, true, "pm_barLogoImg"); ?>
        </div>
    </a>
    <nav id="<?= $navId; ?>" class="<?= $navClass; ?>">
        <?php $modelNav->index();
        if ($lang) $modelNav->makeLang(false); ?>
    </nav>
    <?php if ($admin) : ?>
    <div id="pm_admin_panel">
        <?php if ($isAuthenticated) $modelBar->makeLogout(); ?>
    </div>
    <?php endif; ?>
    <?php pmImg("bar asset", $nav_pm_bar_asset, true, "pm_bar_asset anim"); ?>
</div>