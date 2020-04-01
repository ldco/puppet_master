<?php

declare(strict_types=1);

//use sys\Pages;

require PM_ROOT . PM_SYS_FOLDER . "/modules/Page.class.module.php";
require PM_ROOT . PM_SYS_FOLDER . "/modules/Files.class.module.php";

$page4 = new Page();
$page4->h(1);
$internetGrid = new Files;
$internetGrid->folder = PM_IMAGES_REL . "page_4/internetGrid";
$internetGrid->make("internetGrid");
$page4->close();
