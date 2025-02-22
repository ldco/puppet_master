<!-- THEBILITY -->
<?php

require_once PM_HELPER . "pmTranslate.fun.php";
require_once PM_HELPER . "pmImg.fun.help.php";

$thebilityToggleIconSrc = PM_ICONS_REL_SYS . "thebility.svg";
$thebilityDragIconSrc = PM_ICONS_REL_SYS . "drag.svg";
$thebilityCloseIconSrc = PM_ICONS_REL_SYS . "close.svg";

if (PM_THEME_LIGHT) :
    $thebilityThemeBollean = "false";
else :
    $thebilityThemeBollean = "true";
endif;
?>
<div id="pm_thebility" class="thebility">
    <div id="thebilityIcon" class="thebility">
        <?php pmImg("thebility-icon", $thebilityToggleIconSrc, true, "thebility"); ?>
    </div>
    <div id="thebilityMainDiv" class="thebility">
        <div id="thebility_buttonsDiv" class="thebility">
            <div id="dragThebility" class="thebility">
                <?php pmImg("thebility-drag-icon", $thebilityDragIconSrc, true, "thebility"); ?>
            </div>
            <div id="closeThebility" class="thebility">
                <?php pmImg("thebility-close-icon", $thebilityCloseIconSrc, true, "thebility"); ?>
            </div>
        </div>
        <?php if (PM_ALLOW_THEME) : ?>
        <form id="form_lightDarkTheme" action="index.php" method="POST" onclick="javascript:this.submit();">
            <div class="thebilityDiv thebility" id="lightDarkTheme">
                <?php echo pmTranslate(PM_LANG, "dark / light theme", false);  ?>
            </div>
            <input type="hidden" name="submitTheme" value=<?= $thebilityThemeBollean ?> />
        </form>
        <?php endif; ?>
        <div class="thebilityDiv thebility">
            <?php echo pmTranslate(PM_LANG, "font size", false);  ?>
            <input class="slider thebility" id="fontDivSizeSlider" type="range" value="2" min="0.5" max="7"
                step="0.01" />
        </div>
        <div class="thebilityDiv thebility">
            <?php echo pmTranslate(PM_LANG, "saturation", false);  ?>
            <input class="slider thebility" id="graySlider" type="range" value="0" min="0" max="1" step="0.01" />
        </div>
        <div class="thebilityDiv thebility">
            <?php echo pmTranslate(PM_LANG, "contrast", false);  ?>
            <input class="slider thebility" id="contrastSlider" type="range" value="1" min="0.6" max="1.3"
                step="0.01" />
        </div>
        <div class="thebilityDiv thebility">
            <?php echo pmTranslate(PM_LANG, "brightness", false);  ?>
            <input class="slider thebility" id="brightnessSlider" type="range" oninput="" value="1" min="0.7" max="1.2"
                step="0.01" />
        </div>
        <div class="thebilityDiv thebility" id="bolderFont">
            <?php echo pmTranslate(PM_LANG, "bolder font", false);  ?>
        </div>
        <div class="thebilityDiv thebility" id="animPause">
            <?php echo pmTranslate(PM_LANG, "stop/restart animations", false);  ?>
        </div>
        <div class="thebilityDiv thebility" id="aUnderline">
            <?php echo pmTranslate(PM_LANG, "highlight links", false);  ?>
        </div>
        <div class="thebilityDiv thebility" id="invertHtml">
            <?php echo pmTranslate(PM_LANG, "negative", false);  ?>
        </div>
    </div>
</div>
<!-- FIN THEBILITY -->