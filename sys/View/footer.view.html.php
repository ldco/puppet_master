<footer id="pm_footer">
    <?php if (defined("PM_FOOTER_NAV") && PM_FOOTER_NAV) : ?>
    <nav>
        <?php $modelNav->index(); ?>
    </nav>
    <?php endif; ?>
    <div id="pm_footer--credits">
        <a href="<?= $bywww ?>">
            <span id="pm_footer--credits-by"><?= $by ?></span>
        </a>
        <span id="pm_footer--copyright">&#169;<?= $copy ?></span>
    </div>
</footer>