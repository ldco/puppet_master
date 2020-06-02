<?php

declare(strict_types=1);

use sys\modules;

require PM_ROOT . PM_SYS_FOLDER . "/modules/Page.class.module.php";
require PM_ROOT . PM_SYS_FOLDER . "/modules/Files.class.module.php";

$page5 = new Page();
$page5->h(1);
$page5->text("1", "pm_intro_text");
$softGrid = new Files;
$softGrid->folder = "softGrid";
$softGrid->ext = "png";
$softGrid->make();
$page5->close();
