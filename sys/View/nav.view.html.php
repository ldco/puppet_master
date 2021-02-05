<div id="<?= $navElementID; ?>" class="<?= $navItemClass; ?>">
    <a href="<?= $navElemURL; ?>" id="pm_<?= $navElementID; ?>" onclick="<?= $navRenderJS; ?>">
        <img alt="menu icon" src="<?= $navImgSrc; ?>"
            <?php if (!empty($navRenderJS)) echo 'onclick="' . $navRenderJS . '"'; ?>>
        <span><?= $navLang; ?></span>
    </a>
</div>