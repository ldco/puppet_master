<?php

declare(strict_types=1);

require PM_ROOT . PM_SYS_FOLDER . "/modules/Page.class.module.php";
require_once PM_ROOT . PM_SYS_FOLDER . "/helpers/pmImg.fun.help.php";

$page1 = new Page();

?>


<div id='mainLogo'>

    <?php pmImg("logo", PM_IMAGES_REL . "brand/barLogo", true); ?>

</div>
<div id='bgVideoEffect'></div>

<div id='bgVideo'>
    <!-- <video autoplay muted loop>
        <source src='<?= PM_VIDEOS_REL ?>page_1/untitled2.mp4' type='video/mp4'></video> -->
</div>

<?php
$page1->close();
