<?php

declare(strict_types=1);

//use sys\Pages;

require PM_ROOT . PM_SYS_FOLDER . "/modules/page.class.module.php";
require PM_ROOT . PM_SYS_FOLDER . "/modules/swiper.class.module.php";

$page3 = new Page();
$page3->h(1, true);


$page3->inner();

$archSlider = new Swiper;
$archSlider->folder = PM_IMAGES_REL . "page_3/swipe";
$archSlider->make(true, "archSlider");

$page3->close();
