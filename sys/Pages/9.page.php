<?php

declare(strict_types=1);

//use sys\Pages;

require PM_ROOT . PM_SYS_FOLDER . "/modules/Page.class.module.php";
require PM_ROOT . PM_SYS_FOLDER . "/helpers/Files.class.module.php";

$page9 = new Page("lightPage");
$page9->h(1);

$artGrid = new Files;
$artGrid->folder = PM_IMAGES_REL . "page_9/artGrid";


$artGrid->make("artGrid");
$page9->close();
