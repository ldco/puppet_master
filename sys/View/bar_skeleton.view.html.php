<div id="<?= $navBarId; ?>" class="<?= $navBarClass; ?>">
    <?php if (!$admin) : ?>
        <a href="">
            <div class="pm_barLogo"><img src="<?= $navBarLogoImg; ?>"></div>
        </a>
    <?php
    endif;
    if (!$admin || $isAuthenticated) :
    ?>
        <nav id="<?= $navId; ?>" class="<?= $navClass; ?>">
            <?php $modelNav->index();
            if (!$admin) :
                if ($lang) $modelNav->makeLang(false);
            endif;
            ?>

        </nav>
    <?php
    endif;
    if ($admin) :
    ?>
        <div id="pm_admin_panel">
            <?php if ($isAuthenticated) $modelBar->makeLogout(); ?>
        </div>
    <?php else : ?>
        <img class="pm_bar_asset anim" src="<?= $nav_pm_bar_asset; ?>" alt="">
    <?php endif; ?>
</div>