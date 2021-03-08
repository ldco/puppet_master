<?php

declare(strict_types=1);

namespace sys\Model;

use sys\Controller\DB;

function buildNavArray(array $elements, $parentId = null)
{
    $branch = array();

    foreach ($elements as $element) {
        if ($element['parent'] === $parentId) {
            $children = buildNavArray($elements, $element['_id']);
            if ($children) {
                $element['children'] = $children;
            }
            $branch[] = $element;
        }
    }

    return $branch;
}

require PM_ROOT . $this->viewsNames['nav'];
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
    public function index(bool $mobile)
    {
        global $PM_DB;

        $tableName = "pm_nav";
        $result = $PM_DB->select("pm_nav",  ["[><]pm_loc" => ["name" => "id"]], [PM_LANG, "_id", "img", "fun", "parent", "isempty"]);

        if ($result) {
            $_result = buildNavArray($result);
            if ($_result) {
                if ($mobile)
                    makeNavigationView($_result, true);
                else {
                    makeNavigationView($_result, false);
                }
            }
        }
    }
}