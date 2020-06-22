<?php

declare(strict_types=1);

use sys\modules;

require PM_ROOT . PM_SYS_FOLDER . "/modules/Page.class.module.php";
require PM_ROOT . PM_SYS_FOLDER . "/modules/Files.class.module.php";

$page7 = new Page();
$page7->h(1);
$page7->inner();
$page7->close();
