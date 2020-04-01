<?php

declare(strict_types=1);

//use sys\Pages;

require PM_ROOT . PM_SYS_FOLDER . "/modules/Page.class.module.php";
require PM_ROOT . PM_SYS_FOLDER . "/helpers/Files.class.module.php";

$page2 = new Page("lightPage");
$page2->h(1);

$page2->inner();
$page2->img(1, "page2img", "two2.png");
$logoGrid1 = new Files;
$logoGrid1->folder = PM_IMAGES_REL . "page_2/logoGrid";
$logoGrid1->make("logoGrid");
$page2->img(2, "page2img", "twoIIc.png");
$page2->img(3, "page2img", "tundraI.png");


$page2->close();
