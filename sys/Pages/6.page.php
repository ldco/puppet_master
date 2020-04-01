<?php

declare(strict_types=1);

//use sys\Pages;

require PM_ROOT . PM_SYS_FOLDER . "/modules/Page.class.module.php";
require PM_ROOT . PM_SYS_FOLDER . "/modules/Files.class.module.php";

$page6 = new Page("lightPage");
$page6->h(1);
$page6->text("1", "pm_intro_text");
?>
<a href="https://scripts.sil.org/cms/scripts/page.php?site_id=nrsi&id=OFL">SIL Open Font License</a>
<?php
$page6->text("2", "pm_intro_text");
echo "<a id='gofanariumLink' href='http://ldcodesign.com/gofanarium/'>";
$page6->img(1, "page6img", "gofanariumLogo.svg");
echo "</a>";
$fontsGrid = new Files;
$fontsGrid->folder = PM_IMAGES_REL . "page_6/preview";
$fontsGrid->title = true;
$fontsGrid->make("fontsGrid");
echo "<br>";
$page6->text("3", "pm_intro_text");
$page6->close();
