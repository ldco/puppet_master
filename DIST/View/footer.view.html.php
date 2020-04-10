<div class="pm_footer">
    <?php if (PM_FOOTER_NAV) : ?>
        <nav>
            <?php $modelNav->index(); ?>
        </nav>
    <?php endif; ?>
    <div class="pm_footerCredits">
        <a href="<?= $bywww ?>">
            <span class="pm_footerCreditsBy"><?= $by ?></span>
        </a>
        <span class="pm_footerCreditsCopy"><?= $copy ?></span>
    </div>
</div>