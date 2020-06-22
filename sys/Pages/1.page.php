<?php

declare(strict_types=1);

require PM_ROOT . PM_SYS_FOLDER . "/modules/Page.class.module.php";
require_once PM_ROOT . PM_SYS_FOLDER . "/helpers/pmImg.fun.help.php";

$page1 = new Page();
/* $page1->video("1", "bgVideo", null, true);
$page1->text("1", "introText"); */
?>


<!-- <div id='mainLogo'>

    <?php pmImg("logo", PM_IMAGES_REL . "brand/barLogo", true); ?>

</div> -->


<?php
$page1->close();
