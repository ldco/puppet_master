<?php


declare(strict_types=1);

if ((PM_HEADER === "none") || (PM_HEADER === "float")) {
    if (PM_FOOTER === false) {
        define("PM_SKELETON_CASE", "case_A"); //no header (or float), no footer
    } elseif (PM_FOOTER === true) {
        define("PM_SKELETON_CASE", "case_B"); //no header (or float), with footer
    } else {
        throw new Exception("PM_FOOTER not defined");
    }
} elseif (PM_HEADER === "horiz") {
    if (PM_FOOTER === false) {
        define("PM_SKELETON_CASE", "case_C"); //horiz header, no footer
    } elseif (PM_FOOTER === true) {
        define("PM_SKELETON_CASE", "case_D"); //horiz header, with footer
    } else {
        throw new Exception("PM_FOOTER not defined");
    }
} elseif ((PM_HEADER === "vert") || (PM_HEADER === "vertext")) {
    if (PM_FOOTER === false) {
        define("PM_SKELETON_CASE", "case_E"); //vert (or vertext) header, no footer
    } elseif (PM_FOOTER === true) {
        define("PM_SKELETON_CASE", "case_F"); //vert (or vertext) header, with footer
    } else {
        throw new Exception("PM_FOOTER not defined");
    }
} else {
    throw new Exception("PM_HEADER not defined");
}