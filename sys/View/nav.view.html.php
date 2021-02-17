<?php

declare(strict_types=1);

function makeNavigationView($arr)
{
    $navItemClass = "pm_nav_item";
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
        if (defined("PM_PHP_ROUTING") && PM_PHP_ROUTING && ($navItem['isempty'] !== "1")) :
            echo "<a href='$navElemURL'>";
        endif;
        echo "<img alt='Menu icon' src='{$navImgSrc}'>";
        echo "<span>{$navLang}</span>";
        if (defined("PM_PHP_ROUTING") && PM_PHP_ROUTING && ($navItem['isempty'] !== "1")) :
            echo "</a>";
        endif;
        if (isset($navItem['children']) && is_array($navItem['children'])) {
            echo "<ul class='{$sub_UlClass}'>";
            makeNavigationView($navItem['children']);
            echo '</li></ul>';
        } else {
            echo '</li>';
        }
    }
}