<div class="pm_Lang">
    <img src="<?= $imgSrc; ?>" alt="">
    <div class="<?= $navClass; ?>">
        <form action="<?= $navFormAction; ?>" method="POST">
<?php foreach (PM_ALL_LANGS as $key) { ?>
                <input type="submit" name="submitLang" value="<?= $key; ?>">
<?php } ?>
        </form>
    </div>
</div>
