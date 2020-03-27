<?php

declare(strict_types=1);

//use sys\Pages;

require PM_ROOT . PM_SYS_FOLDER . "/modules/page.class.module.php";
require PM_ROOT . PM_SYS_FOLDER . "/helpers/files.class.module.php";

$page6 = new Page("lightPage");
$page6->h(1);
$page6->text("1");
?>
<a href="https://scripts.sil.org/cms/scripts/page.php?site_id=nrsi&id=OFL">SIL Open Font License</a>
<?php
$page6->text("2");
$fontsGrid = new Files;
$fontsGrid->folder = PM_IMAGES_REL . "page_6/preview";
$fontsGrid->title = true;
$fontsGrid->make("fontsGrid");
$page6->text("3");
$page6->close();
