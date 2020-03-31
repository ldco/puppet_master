<?php

declare(strict_types=1);

//use sys\Pages;

require PM_ROOT . PM_SYS_FOLDER . "/modules/page.class.module.php";
require PM_ROOT . PM_SYS_FOLDER . "/helpers/files.class.module.php";

$page9 = new Page("lightPage");
$page9->h(1);

$artGrid = new Files;
$artGrid->folder = PM_IMAGES_REL . "page_9/artGrid";
//$artGrid->imgNetto = true;

$artGrid->make("artGrid", "artGridItem");
$page9->close();
