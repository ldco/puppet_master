<?php

declare(strict_types=1);

use sys\modules;

require PM_ROOT . PM_SYS_FOLDER . "/modules/Page.class.module.php";
require PM_ROOT . PM_SYS_FOLDER . "/modules/Files.class.module.php";

$page6 = new Page();
$page6->h(1);
$page6->inner();
$page6->close();
