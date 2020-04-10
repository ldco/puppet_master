<?php

declare(strict_types=1);

require_once dirname(dirname(__FILE__), 2) . "/vendor/mobiledetect/mobiledetectlib/Mobile_Detect.php";

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
