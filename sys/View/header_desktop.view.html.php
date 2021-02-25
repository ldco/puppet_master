<header id="<?= $headerId; ?>" class="header_vert_extended">

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