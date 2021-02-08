<div id="<?= $navElementID; ?>" class="<?= $navItemClass; ?>" onclick="<?= $navRenderJS; ?>">
    <?php if (defined("PM_PHP_ROUTING") && PM_PHP_ROUTING) : ?>
    <a href="<?= $navElemURL; ?>">
        <?php endif; ?>
        <img alt="menu icon" src="<?= $navImgSrc; ?>">
        <span><?= $navLang; ?></span>
        <?php if (defined("PM_PHP_ROUTING") && PM_PHP_ROUTING) : ?>
    </a>
    <?php endif; ?>
</div>