<?php

declare(strict_types=1);

use sys\modules;

require PM_ROOT . PM_SYS_FOLDER . "/modules/Page.class.module.php";
require PM_ROOT . PM_SYS_FOLDER . "/modules/Contacts.class.module.php";


$page12 = new Page();
$page12->h(1);
$f21Contacts = new Contacts;
$f21Contacts->make();
$page12->close();
