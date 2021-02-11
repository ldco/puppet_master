<?php

declare(strict_types=1);

namespace sys\Model;

use Mysqli;
use sys\Controller\DB;

class SkeletonDepends
{

    private $viewsNames = [];
    private $DB;



    public function __construct()
    {
        global $DB;
        $this->viewsNames = PM_VIEWS;
        if (!isset($DB)) $DB = new DB;
        $this->DB = $DB;
    }

    function index()
    {

        if (!defined("PM_ROOT")) return false;

        /*  $tableName = "pm_nav";
        $fieldsAdd = "`_id`";

        $hideURLElems = [];
        $result = $this->DB->queryRaw("SELECT " . $fieldsAdd . ",`sub` FROM " . $tableName);
        if ($result) {
            while ($navItem = $result->fetch_assoc()) {
                if ($navItem['sub'] != NULL) continue;
                $hideURLElems[] = 'pm_' . $navItem['_id'];
            }
        } */

        require PM_ROOT . $this->viewsNames['depends'];
        return true;
    }
}