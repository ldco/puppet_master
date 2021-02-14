<?php

declare(strict_types=1);

namespace sys\Model;

use sys\Controller\DB;


class SkeletonNav
{
    private $isOnePage = false;
    private $viewsNames = [];
    public function __construct()
    {
        if (defined("PM_ONEPAGER")) $this->isOnePage = PM_ONEPAGER;
        if (!defined("PM_ROOT")) die('PM_ROOT not defined');
        $this->viewsNames = PM_VIEWS;
    }
    public function index()
    {
        global $DB;
        $tableName = "pm_nav";
        $navItemClass = "nav_item";
        $fieldsAdd = "";
        $result = $DB->select("pm_nav",  ["[><]pm_loc" => ["name" => "id"]], [PM_LANG, "_id", "img", "fun"]);
        if ($result) {
            foreach ($result as $navItem) {
                $navElementID = $navItem['_id'];
                $navImgSrc = PM_ICONS_REL . $navItem['img'] . '.svg';
                $navLang = $navItem[PM_LANG];
                $onClickFun = $navItem['fun'];
                if ($navItem['fun'] !== null) {
                    $onClickHtmlOpen = "onclick='";
                    $onClickHtmlClose = "'";
                } else {
                    $onClickHtmlOpen = "";
                    $onClickHtmlClose = "";
                }
                $navElemURL = '';
                if ($this->isOnePage) {
                    $navElemURL = $navItem['link'];
                } else {
                    $navElemURL =  '/index.php?show_page=' . $navItem['_id'];
                }
                require PM_ROOT . $this->viewsNames['nav'];
            }
        }
    }
}