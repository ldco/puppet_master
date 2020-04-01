<?php

declare(strict_types=1);

use sys\Controller\DB;

require_once PM_ROOT . PM_SYS_FOLDER . "/Model/startup.model.php";
require_once PM_ROOT . PM_SYS_FOLDER . "/Controller/DB.class.ctrl.php";

class Team
{
    public $title = null;
    public $table = "pm_team";

    public $folder = "team";
    public function make($_id = "pm_team", $childClass = null, $class = null)
    {
        global $PM_PAGE_NUM;
        $DB = new DB();
        echo '<div id="' . $_id . '" class="' . $class . '">';
        $result = $DB->queryRaw("SELECT * FROM $this->table");
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="' . $childClass . ' pm_team_item pm_team_rank_' . $row["rank"] . '">';
                echo '<img src="' . PM_IMAGES_REL . 'page_' . $PM_PAGE_NUM . '/' . $this->folder . '/' . $row["img"] . '.png">';
                echo '<div class="pm_team_name"></div>';
                if ($row["job"] !== null) echo '<div class="pm_team_job">' . $row["job"] . '</div>';
                if ($row["bio"] !== null)  echo '<div class="pm_team_bio">' . $row["bio"] . '</div>';
                echo '</div>';
            }
        }
        echo '</div>';
    }
}
