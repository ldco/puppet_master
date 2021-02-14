<?php

declare(strict_types=1);

namespace sys\Model;

use Mysqli;
use sys\Controller\DB;


class SkeletonNav
{
    private $DB;
    private $isOnePage = false;
    private $viewsNames = [];

    public function __construct()
    {
        global $DB;
        if (!isset($DB)) $DB = new DB;
        $this->DB = $DB;
        if (defined("PM_ONEPAGER")) $this->isOnePage = PM_ONEPAGER;
        if (!defined("PM_ROOT")) die('PM_ROOT not defined');
        $this->viewsNames = PM_VIEWS;
    }

    public function index()
    {
        $tableName = "pm_nav";
        $navItemClass = "nav_item";
        $fieldsAdd = "";
        $result = $this->DB->queryRaw("SELECT *" . $fieldsAdd . " FROM " . $tableName . " `pm_nav` INNER JOIN `pm_loc` ON `pm_nav`.`name` = `pm_loc`.`id`");
        if ($result) {
            while ($navItem = $result->fetch_assoc()) {
                if ($navItem['sub'] != NULL) continue;
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