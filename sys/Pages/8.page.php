<?php

declare(strict_types=1);

//use sys\Pages;

require PM_ROOT . PM_SYS_FOLDER . "/modules/Page.class.module.php";
require PM_ROOT . PM_SYS_FOLDER . "/modules/VideoList.class.module.php";

$page8 = new Page();
$page8->h(1);

$motion = new VideoList;
$motion->table = "motion_graphic";
$motion->row = "link";
$motion->make("motiongraphicsGrid");

$page8->close();
