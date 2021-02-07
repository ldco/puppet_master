<div id="<?= $headerId ?>" class="<?= $headerClass ?>">
    <div class="pm_hamburger hamburger hamburger--collapse">
        <div class="hamburger-box">
            <div class="hamburger-inner"></div>
        </div>
    </div>
    <div id="<?= $headerLogoId ?>"></div>
    <?php pmImg("Bar asset", $nav_pm_bar_asset, true, "anim", "pm_bar_asset"); ?>
</div>
</div>
<div id="<?= $barId ?>" id="<?= $barId ?>">
    <nav id="<?= $navId ?>">
        <?php $modelNav->index();
        if ($lang) $modelNav->makeLang(true); ?>
    </nav>
</div>