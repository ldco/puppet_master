<?php

declare(strict_types=1);

function makeNavigationView($arr)
{
    $navItemClass = "nav_item";

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
        $navElemURL = '';
        if (PM_ONEPAGER) {
            $navElemURL = $navItem['link'];
        } else {
            $navElemURL =  '/index.php?show_page=' . $navElementID;
        }

        echo "<li id='{$navElementID}' class='{$navItemClass}'{$onClickHtmlOpen}{$onClickFun}{$onClickHtmlClose}>";
        if (defined("PM_PHP_ROUTING") && PM_PHP_ROUTING) :
            echo "<a href='$navElemURL'>";
        endif;
        echo "<img alt='Menu icon' src='{$navImgSrc}'>";
        echo "<span>{$navLang}</span>";
        if (defined("PM_PHP_ROUTING") && PM_PHP_ROUTING) :
            echo "</a>";
        endif;

        if (isset($navItem['children']) && is_array($navItem['children'])) {
            echo "<ul>";
            makeNavigationView($navItem['children']);
            echo "</ul>";
        } else {
            echo '</li>';
        }
    }
}
