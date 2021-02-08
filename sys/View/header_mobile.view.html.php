<header id="<?= $headerId ?>">
    <div class="pm_hamburger hamburger hamburger--collapse">
        <div class="hamburger-box">
            <div class="hamburger-inner"></div>
        </div>
    </div>
    <div id="<?= $headerLogo ?>"></div>
    <?php pmImg("Header asset", $nav_pm_asset, true, "anim", "pm_asset--header"); ?>
</header>
<div id="<?= $mobileSlideId ?>">
    <nav id="<?= $navId ?>">
        <?php $modelNav->index();
        $modelNav->makeLang(true); ?>
    </nav>
</div>