<?php

declare(strict_types=1);

function makeNavigationView($arr, bool $mobile)
{

    if (PM_HEADER === "vert" || PM_HEADER === "vertext" || $mobile) {
        $headerIsVertical = true;
    } else {
        $headerIsVertical = false;
    }
    $navItemClass = "pm_nav_item";
    // $navItemULClass = "pm_nav_item_ul";
    $sub_navItemClass = "pm_nav_item_sub";
    $sub_UlClass = "pm_nav_item_sub_ul";

    foreach ($arr as $navItem) {
        $navElementID = $navItem['_id'];
        $navImgSrc = PM_ICONS_REL . $navItem['img'] . '.svg';
        $navLang = $navItem[PM_LANG];
        $onClickFun = $navItem['fun'];
        if ($navItem['fun'] !== null) {
            $onClickHtmlOpen = " onclick='";
            $onClickHtmlClose = "'";
        } else {
            $onClickHtmlOpen = "";
            $onClickHtmlClose = "";
        }
        if ($navItem['parent'] !== null) {
            $_sub_navItemClass = " " . $sub_navItemClass;
        } else {
            $_sub_navItemClass = null;
        }
        if ($navItem['isempty'] !== "0") {
            $navItemIsempty = " isempty";
        } else {
            $navItemIsempty = null;
        }
        $navElemURL = '';
        if (PM_ONEPAGER) {
            $navElemURL = $navItem['link'];
        } else {
            $navElemURL =  '/index.php?show_page=' . $navElementID;
        }

        echo "<li id='{$navElementID}' class='{$navItemClass}{$navItemIsempty}{$_sub_navItemClass}'{$onClickHtmlOpen}{$onClickFun}{$onClickHtmlClose}>";
        if ($headerIsVertical) :
            echo "<div>";
        endif;
        if (defined("PM_PHP_ROUTING") && PM_PHP_ROUTING && ($navItem['isempty'] !== "1")) :
            echo "<a href='$navElemURL'>";
        endif;

        echo "<img alt='Menu icon' src='{$navImgSrc}'>";
        echo "<div><span>{$navLang}</span></div>";
        if (defined("PM_PHP_ROUTING") && PM_PHP_ROUTING && ($navItem['isempty'] !== "1")) :
            echo "</a>";
        endif;
        if ($headerIsVertical) :
            echo "</div>";
        endif;
        if (isset($navItem['children']) && is_array($navItem['children'])) {
            echo "<ul class='{$sub_UlClass}'>";
            if ($mobile) {
                makeNavigationView($navItem['children'], true);
            } else {
                makeNavigationView($navItem['children'], false);
            }

            echo '</li></ul>';
        } else {
            echo '</li>';
        }
    }
}