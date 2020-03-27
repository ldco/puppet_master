<?php

declare(strict_types=1);

//use sys\Pages;

require PM_ROOT . PM_SYS_FOLDER . "/modules/page.class.module.php";
require PM_ROOT . PM_SYS_FOLDER . "/helpers/files.class.module.php";

$page5 = new Page();
$page5->h(1);
$page5->text("1");
$softGrid = new Files;
$softGrid->folder = PM_IMAGES_REL . "page_5/softGrid";
$softGrid->make("softGrid");
$page5->close();
