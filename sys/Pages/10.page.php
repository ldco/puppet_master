<?php

declare(strict_types=1);

//use sys\Pages;

require PM_ROOT . PM_SYS_FOLDER . "/modules/Page.class.module.php";
require PM_ROOT . PM_SYS_FOLDER . "/modules/Team.class.module.php";

$page10 = new Page("lightPage");
$page10->h(1);

$teamGrid = new Team;
$teamGrid->make();

$page10->close();
