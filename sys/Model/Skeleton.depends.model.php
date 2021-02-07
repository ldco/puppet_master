<?php

declare(strict_types=1);

namespace sys\Model;

use Mysqli;
use sys\Controller\DB;

class SkeletonDepends
{

    private $viewsNames = [];
    private $DB;
    private $isAdmin = false;


    public function __construct()
    {
        global $DB;
        $this->viewsNames = PM_VIEWS;
        if (!isset($DB)) $DB = new DB;
        $this->DB = $DB;
        //if (defined("PM_DEFINE_ADMIN")) $this->isAdmin = PM_DEFINE_ADMIN;
    }

    function index()
    {

        if (!defined("PM_ROOT")) return false;

        if ($this->isAdmin) {
            $tableName = "pm_adm_nav";
            $fieldsAdd = "`id` as `_id`";
        } else {
            $tableName = "pm_pub_nav";
            $fieldsAdd = "`_id`";
        }

        $hideURLElems = [];
        $result = $this->DB->queryRaw("SELECT " . $fieldsAdd . ",`sub` FROM " . $tableName);
        if ($result) {
            while ($navItem = $result->fetch_assoc()) {
                if ($navItem['sub'] != NULL) continue;
                $hideURLElems[] = 'pm_' . $navItem['_id'];
            }
        }
        $admin = $this->isAdmin;
        require PM_ROOT . $this->viewsNames['depends'];
        return true;
    }
}