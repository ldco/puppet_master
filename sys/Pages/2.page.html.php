<?php

declare(strict_types=1);

//use sys\Pages;

require PM_ROOT . PM_SYS_FOLDER . "/modules/page.class.module.php";
require PM_ROOT . PM_SYS_FOLDER . "/modules/grids/grid.class.module.php";

$page2 = new Page();
$page2->h(1, true);

//$page2->img(2, "", "two2.png");

$logoGrid1 = new Grid;
$logoGrid1->folder = PM_IMAGES_REL . "page_2/logoGrid";
$logoGrid1->colomns = 4;
$logoGrid1->make("logoGrid");

//$page2->img(1, "", "twoIIc.png");
//$page2->img(3, "", "tundraI.png");

$page2->close();
