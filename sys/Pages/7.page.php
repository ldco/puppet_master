<?php

declare(strict_types=1);

//use sys\Pages;

require PM_ROOT . PM_SYS_FOLDER . "/modules/Page.class.module.php";
require PM_ROOT . PM_SYS_FOLDER . "/helpers/Files.class.module.php";

$page7 = new Page("lightPage");
$page7->h(1);

$printGrid = new Files;
$printGrid->folder = PM_IMAGES_REL . "page_7/printGrid";

$printGrid->make("printGrid");
$page7->close();
