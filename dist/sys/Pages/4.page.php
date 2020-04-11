<?php

declare(strict_types=1);

use sys\modules;

require PM_ROOT . PM_SYS_FOLDER . "/modules/Page.class.module.php";
require PM_ROOT . PM_SYS_FOLDER . "/modules/Files.class.module.php";

$page4 = new Page();
$page4->h(1);
$internetGrid = new Files;
$internetGrid->folder = "internetGrid";
$internetGrid->make();
$page4->close();
