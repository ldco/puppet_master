<?php

declare(strict_types=1);

use sys\modules;

require PM_ROOT . PM_SYS_FOLDER . "/modules/Page.class.module.php";
require PM_ROOT . PM_SYS_FOLDER . "/modules/Files.class.module.php";

$page9 = new Page();
$page9->h(1);

echo "<div class='pm_loader'></div>";

$artGrid = new Files;
$artGrid->folder = "artGrid";
$artGrid->ext = "png";
$artGrid->make();
$page9->close();
