<?php

declare(strict_types=1);

use sys\modules;

require PM_ROOT . PM_SYS_FOLDER . "/modules/Page.class.module.php";
require PM_ROOT . PM_SYS_FOLDER . "/modules/Files.class.module.php";

$page2 = new Page();
$page2->h(1);

$page2->inner();
$page2->img(1, "two2.png", "page2img");
$logoGrid1 = new Files;
$logoGrid1->folder = "logoGrid";
$logoGrid1->make();
$page2->img(2, "twoIIc.png", "page2img");
$page2->img(3, "tundraI.png", "page2img");


$page2->close();
