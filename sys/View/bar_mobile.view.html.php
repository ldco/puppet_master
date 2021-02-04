<div id="<?= $headerId ?>" class="<?= $headerClass ?>">

    <div class="pm_hamburger hamburger hamburger--collapse">
        <div class="hamburger-box">
            <div class="hamburger-inner"></div>
        </div>
    </div>

    <div id="<?= PM_BODY_ID ?>">
        <a href="">
            <img alt="logo" src="<?= $navBarLogoMob ?>"></a>
    </div>
    <img alt="bar asset" class="pm_bar_asset anim" src="<?= $nav_pm_bar_asset; ?>" alt="">
</div>
<?php
if ($admin) :
    //if ADMIN -> close div, opened in other view
?>
</div>
<?php endif; ?>

<?php /* Warning! lost </div> */ ?>

<div id="<?= $barId ?>" class="<?= $barClass ?>">
    <nav class="<?= $navClass ?>">
        <?php
        $modelNav->index();
        if ($lang) $modelNav->makeLang(true);
        ?>
    </nav>
</div>