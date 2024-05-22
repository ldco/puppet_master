<?php

declare(strict_types=1);

require_once dirname(dirname(__FILE__), 2) . "/vendor/mobiledetect/mobiledetectlib/Mobile_Detect.php";

function checkIfIsMobileNow()
{
    $detect = new Mobile_Detect;

    if ($detect->isMobile()) {
        define("PM_ISMOBILENOW", true);
        if ($detect->isTablet()) {
            define("PM_DEVICETYPE", "tab");
        } else {
            define("PM_DEVICETYPE", "mob");
        }
    } else {
        define("PM_ISMOBILENOW", false);
        define("PM_DEVICETYPE", "desk");
    }



    if ($detect->isiOS()) {
        define("PM_MOBOSNOW", "ios");
    } elseif ($detect->isAndroidOS()) {
        define("PM_MOBOSNOW", "andrd");
    } else {
        define("PM_MOBOSNOW", "undfnd");
    }
}