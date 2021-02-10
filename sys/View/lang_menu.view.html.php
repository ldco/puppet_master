<div id="<?= $pm_LangId; ?>">
    <?php pmImg("Lang menu", $imgSrc, true); ?>
    <div id="<?= $lang_menuId; ?>">
        <form action="<?= $langFormAction; ?>" method="POST">
            <?php foreach (PM_ALL_LANGS as $key) { ?>
            <input type="submit" name="submitLang" value="<?= $key; ?>">
            <?php } ?>
        </form>
    </div>
</div>