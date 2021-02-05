<div id="<?= $headerId ?>" class="<?= $headerClass ?>">
    <div class="pm_hamburger hamburger hamburger--collapse">
        <div class="hamburger-box">
            <div class="hamburger-inner"></div>
        </div>
    </div>
    <div id="<?= $headerLogoId ?>">
        <a href="#">
            <?php pmImg("Logo", $navBarLogoMob, true, "pm_navBarLogoMob"); ?>
        </a>

    </div>
    <?php pmImg("Bar asset", $nav_pm_bar_asset, true, "pm_bar_asset anim"); ?>
</div>
</div>
<div id="<?= $barId ?>" class="<?= $barClass ?>">
    <nav class="<?= $navClass ?>">
        <?php $modelNav->index();
        if ($lang) $modelNav->makeLang(true); ?>
    </nav>
</div>