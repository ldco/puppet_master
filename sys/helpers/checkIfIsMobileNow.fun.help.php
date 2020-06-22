<?php

declare(strict_types=1);

require_once dirname(dirname(__FILE__), 2) . "/vendor/mobiledetect/mobiledetectlib/Mobile_Detect.php";

function checkIfIsMobileNow()
{
    $detect = new Mobile_Detect;

    if ($detect->isMobile()) {
        define("PM_ISMOBILENOW", true);
        if ($detect->isiOS()) {
            define("PM_MOB_SYS", "ios");
        }
        if ($detect->isAndroidOS()) {
            define("PM_MOB_SYS", "android");
        }
    } else {
        define("PM_ISMOBILENOW", false);
        define("PM_MOB_SYS", "none");
    }
    return PM_ISMOBILENOW;
}
