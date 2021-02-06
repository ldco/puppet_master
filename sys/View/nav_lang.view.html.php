<div id="pm_Lang">
    <?php pmImg("lang navigation", $imgSrc, true); ?>
    <div id="<?= $navId; ?>">
        <form action="<?= $navFormAction; ?>" method="POST">
            <?php foreach (PM_ALL_LANGS as $key) { ?>
            <input type="submit" name="submitLang" value="<?= $key; ?>">
            <?php } ?>
        </form>
    </div>
</div>