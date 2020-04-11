<?php if ($admin) : ?>
        <div id="<?= $navElementID; ?>" class="<?= $navItemClass; ?>">
        <?php else : ?>
                <div id="<?= $navElementID; ?>" class="<?= $navItemClass; ?>">
                        <a href="<?= $navElemURL; ?>" id="pm_<?= $navElementID; ?>" onclick="<?= $navRenderJS; ?>">
                        <?php endif; ?>
                        <img src="<?= $navImgSrc; ?>" alt="" <?php if (!empty($navRenderJS)) echo 'onclick="' . $navRenderJS . '"'; ?>>
                        <span><?= $navLang; ?></span>
                        <?php if (!$admin) : ?>
                        </a>
                <?php endif; ?>
                </div>