<?php

declare(strict_types=1);

//use sys\Pages;

require "Page.class.php";

$page2 = new Page();
$page2->h(1, true);

$page2->img(2, "", "two2.png");



$page2->img(1, "", "twoIIc.png");
$page2->img(3, "", "tundraI.png");

$page2->close();
