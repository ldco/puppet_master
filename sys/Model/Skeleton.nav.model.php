<?php

declare(strict_types=1);

namespace sys\Model;

use Mysqli;
use sys\Controller\DB;

class SkeletonNav
{

    private $DB;
    private $isAdmin = false;
    private $viewsNames = [];

    public function __construct()
    {
        global $DB;
        if (!isset($DB)) $DB = new DB;
        $this->DB = $DB;

        if (defined("PM_DEFINE_ADMIN")) $this->isAdmin = PM_DEFINE_ADMIN;
        if (!defined("PM_ROOT")) die('PM_ROOT not defined');
        $this->viewsNames = PM_VIEWS;
    }
    public function makeLang(bool $mobile)
    {
        if ($mobile) {
            $navClass = "pm_langNavMobile";
        } else {
            $navClass = "pm_langNav";
        }
        $navFormAction = "index.php";
        $imgSrc = PM_ICONS . "/lang.svg";

        require PM_ROOT . $this->viewsNames['nav_lang'];
    }

    public function index()
    {
        if ($this->isAdmin) {
            if (empty($_SESSION) || empty($_SESSION['user_name'])) return;
            $tableName = "pm_adm_nav";
            $navItemClass = "nav_admin_item";
            $fieldsAdd = ", `pm_nav`.`id` as `_id`";
            $admin = true;
        } else {
            $tableName = "pm_pub_nav";
            $navItemClass = "nav_item";
            $fieldsAdd = "";
            $admin = false;
        }
        $result = $this->DB->queryRaw("SELECT *" . $fieldsAdd . " FROM " . $tableName . " `pm_nav` INNER JOIN `pm_loc` ON `pm_nav`.`name` = `pm_loc`.`id`");
        if ($result) {
            while ($navItem = $result->fetch_assoc()) {
                if ($navItem['sub'] != NULL) continue;
                //$navElementID = 'pm_' . $navItem['_id'];
                $navElementID = $navItem['_id'];
                $navImgSrc = PM_ICONS . '/' . $navItem['img'] . '.svg';
                $navLang = $navItem[PM_LANG];
                //$navRenderJS = 'getContentView(' . $navItem['_id'] . ');return false;';
                if ($this->isAdmin) {
                    $navRenderJS = '';
                    //$navRenderJS = 'getContentView(' . $navItem['_id'] . ');';
                    $navElemURL = '';
                    $navElemURL = '/admin/index.php?show_page=' . $navItem['_id'];
                } else {
                    $navRenderJS = 'return false;';
                    $navElemURL =  '/index.php?show_page=' . $navItem['_id'];
                }
                require PM_ROOT . $this->viewsNames['nav'];
            }
        }
    }
}
