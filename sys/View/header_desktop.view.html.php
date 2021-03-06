<!-- class="vert--extended" -->
<header id="<?= $headerId; ?>" class="<?= $headerClass; ?>">
    <div id="<?= $headerLogo ?>">
    </div>

    <nav id="<?= $navId; ?>">
        <ul>
            <?php $modelNav->index();
            ?></ul>
    </nav>
    <?php $modelLangMenu->makeLang(false); ?>

    <?php /* if ($definedLogin) : */ ?>
    <!--  <div id="pm_panel--header"> -->
    <?php /* if ($isAuthenticated) $modelHeader->makeLogout(); */ ?>
    <!--   </div> -->
    <?php /* endif;  */ ?>
    <?php pmImg("Asset", $headerAssetUrl, true, "anim", $headerAsset); ?>
</header>

<?php

//vertical header changer

if (PM_HEADER === "vert") : ?>
<div id="vertHeaderChanger">
</div>
<?php elseif (PM_HEADER === "vertext") : ?>
<div id="vertHeaderChanger" class="vert--extended">
</div>
<?php endif; ?>