<!-- THEBILITY -->
<?php
require_once PM_ROOT . PM_SYS_FOLDER . "/helpers/pmTranslate.fun.php";


$thebilityToggleIconSrc = PM_ICONS_REL . "thebilityIconWhite.svg";
$thebilityDragIconSrc = PM_ICONS_REL . "drag.svg";
$thebilityCloseIconSrc = PM_ICONS_REL . "close.svg"; ?>

<div id="pm_thebility" class="thebility">
    <div id="thebilityIcon" class="thebility">
        <img src="<?= $thebilityToggleIconSrc ?>" class="thebility">
    </div>

    <div id="thebilityMainDiv" class="thebility">
        <div id="thebility_buttonsDiv" class="thebility">
            <div id="dragThebility" class="thebility">
                <img id="dragThebility" src="<?= $thebilityDragIconSrc ?>" class="thebility">
            </div>
            <div id="closeThebility" class="thebility">
                <img src="<?= $thebilityCloseIconSrc ?>" class="thebility">
            </div>
        </div>
        <div class="thebilityDiv thebility">
            <?php ucfirst(pmTranslate(PM_LANG, "font size", false));  ?>
            <input class="slider thebility" id="fontDivSizeSlider" type="range" value="2" min="0.5" max="7" step="0.01" />
        </div>
        <div class="thebilityDiv thebility">
            <?php ucfirst(pmTranslate(PM_LANG, "saturation", false));  ?>
            <input class="slider thebility" id="graySlider" type="range" value="0" min="0" max="1" step="0.01" />
        </div>
        <div class="thebilityDiv thebility">
            <?php ucfirst(pmTranslate(PM_LANG, "contrast", false));  ?>
            <input class="slider thebility" id="contrastSlider" type="range" value="1" min="0.6" max="1.3" step="0.01" />
        </div>
        <div class="thebilityDiv thebility">
            <?php ucfirst(pmTranslate(PM_LANG, "brightness", false));  ?>
            <input class="slider thebility" id="brightnessSlider" type="range" oninput="" value="1" min="0.7" max="1.2" step="0.01" />
        </div>
        <div class="thebilityDiv thebility" id="bolderFont">
            <?php ucfirst(pmTranslate(PM_LANG, "bolder font", false));  ?>
        </div>
        <div class="thebilityDiv thebility" id="animPause">
            <?php ucfirst(pmTranslate(PM_LANG, "stop/restart animations", false));  ?>
        </div>
        <div class="thebilityDiv thebility" id="aUnderline">
            <?php ucfirst(pmTranslate(PM_LANG, "highlight links", false));  ?>
        </div>
        <div class="thebilityDiv thebility" id="invertHtml">
            <?php ucfirst(pmTranslate(PM_LANG, "negative", false));  ?>
        </div>
    </div>
</div>
<!-- FIN THEBILITY -->