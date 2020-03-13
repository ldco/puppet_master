<?php

declare(strict_types=1);

use sys\Pages;

require "Page.class.php";

$page1 = new Page();
$page1->h(1, true);
$page1->close();
