<?php

declare(strict_types=1);

require_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/mobiledetect/mobiledetectlib/Mobile_Detect.php";

function checkIfIsMobileNow()
{
    $detect = new Mobile_Detect;

    if ($detect->isMobile()) {
        define("PM_ISMOBILENOW", true);
    } else {
        define("PM_ISMOBILENOW", false);
    }
    return PM_ISMOBILENOW;
}
