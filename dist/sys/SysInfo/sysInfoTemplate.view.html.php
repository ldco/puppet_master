<div id="<?= $sysInfopageId ?>" class="pm_infoPage">
    <div class="pm_infoPageInner">
        <div class="pm_infoPageLogo"></div>
        <div class="pm_infoPageText"><?= $sysInfopageText ?></div>


        <?php
        if ($sysInfopageId == "pm_pageMailSuccess") :
        ?>

            <div class="pm_infoPageButtons">
                <button id="pm_infoPageButton_GoHome"><?= $sysInfopageTextLoc["goHome"][$pm_lang]; ?></button>
                <button id="pm_infoPageButton_GoBack"><?= $sysInfopageTextLoc["goBack"][$pm_lang]; ?></button>
            </div>


        <?php elseif ($sysInfopageId == "pm_pageMailUnSuccess") :
        ?>
            <div class="pm_infoPageButtons">
                <button id="pm_infoPageButton_GoBack"><?= $sysInfopageTextLoc["goBack"][$pm_lang]; ?></button>
            </div>

        <?php endif; ?>


    </div>
</div>

<script>
    if (document.querySelector("#pm_infoPageButton_GoHome")) {
        document.querySelector("#pm_infoPageButton_GoHome").addEventListener("click", function() {
            window.location = '/';
        });
    }
    if (document.querySelector("#pm_infoPageButton_GoBack")) {
        document.querySelector("#pm_infoPageButton_GoBack").addEventListener("click", function() {
            window.history.go(-1);
        });
    }
</script>