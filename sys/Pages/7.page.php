<?php

declare(strict_types=1);

use sys\modules;

require PM_ROOT . PM_SYS_FOLDER . "/modules/Page.class.module.php";
require PM_ROOT . PM_SYS_FOLDER . "/modules/Files.class.module.php";

$page7 = new Page("lightPage");
$page7->h(1);

$printGrid = new Files;
$printGrid->folder = "printGrid";
$printGrid->make();

$page7->close();
