<div id="<?= $navBarId; ?>" class="<?= $navBarClass; ?>">

    <?php

    if (!$admin || $isAuthenticated) :
    ?>
    <nav id="<?= $navId; ?>" class="<?= $navClass; ?>">
        <?php $modelNav->index();
            if ($lang) $modelNav->makeLang(false); ?>

    </nav>
    <?php
    endif;
    if ($admin) :
    ?>
    <div id="pm_admin_panel">
        <?php if ($isAuthenticated) $modelBar->makeLogout(); ?>
    </div>
    <?php else : ?>
    <?php pmImg("bar asset", $nav_pm_bar_asset, true, "pm_bar_asset anim"); ?>
    <?php endif; ?>
</div>