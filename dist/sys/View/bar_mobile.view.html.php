<?php if ($admin) : ?>
    <div id="pm_admin_mobileHeader" class="pm_mobileHeader">
    <?php else : ?>
        <div id="pm_mobileHeader" class="pm_mobileHeader">
        <?php endif; ?>
        <div class="pm_hamburger hamburger hamburger--collapse">
            <div class="hamburger-box">
                <div class="hamburger-inner"></div>
            </div>
        </div>
        <div id="mobileHeaderLogo"><img src="<?= $navBarLogoMob ?>">

        </div>
        <img class="pm_bar_asset anim" src="<?= $nav_pm_bar_asset; ?>" alt="">
        </div>
        <?php
        if ($admin) :
            //if ADMIN -> close div, opened in other view
        ?>
    </div>
<?php endif; ?>

<?php /* Warning! lost </div> */ ?>
<?php if ($admin) : ?>
    <div id="pm_admin_mobileBar" class="pm_mobileBar">
    <?php else : ?>
        <div id="pm_mobileBar" class="pm_mobileBar">
        <?php endif; ?>
        <nav class="pm_mobileNav">
            <?php
            $modelNav->index();
            if ($lang) $modelNav->makeLang(true);
            ?>
        </nav>
        </div>