<?php

declare(strict_types=1);

use sys\modules;


require_once dirname(dirname(__FILE__), 1) . "/Model/startup.model.php";
require_once dirname(dirname(__FILE__), 1) . "/modules/Email.class.module.php";
require_once dirname(dirname(__FILE__), 1) . "/helpers/path2url.fun.php";

$mail21Body = "
<p>Name: {$_POST['name']}</p>
<p>Mail: {$_POST['mail']}</p>
<p>Tel: {$_POST['tel']}</p>
<p>Wants: {$_POST['options']}</p>
<p>Comments: {$_POST['comments']}</p>
";

$mail21 = new Email();
$mail21->Subject = "PRE-ORDER from FABRICA21.COM by " . $_POST["name"];
$mail21->Body = $mail21Body;
//$mail21->addAddress = ["fabrica21studio@yandex.ru"];
$mail21->addAddress = ["nikitatut@yandex.ru"];
$mail21->Location = path2url(PM_ROOT . "index.php#11");

$mail21->make();
