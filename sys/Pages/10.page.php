<?php

declare(strict_types=1);

use sys\modules;

require PM_ROOT . PM_SYS_FOLDER . "/modules/Page.class.module.php";
require PM_ROOT . PM_SYS_FOLDER . "/modules/Team.class.module.php";

$page10 = new Page();
$page10->h(1);
$page10->inner();
$page10->close();
