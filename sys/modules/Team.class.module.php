<?php

declare(strict_types=1);

//namespace sys\modules;

use sys\Controller\DB;

require_once PM_ROOT . PM_SYS_FOLDER . "/Controller/DB.class.ctrl.php";

class Team
{
    public $title = null;
    public $table = "pm_team";
    public $folder = "team";
    public function make($_id = null, $childClass = null, $class = "pm_team")
    {
        global $PM_PAGE_NUM;
        global $DB;
        if (!isset($DB)) $DB = new DB;
        echo '<div id="' . $_id . '" class="' . $class . '">';
        $result = $DB->queryRaw("SELECT * FROM $this->table JOIN pm_text ON $this->table.name=pm_text.id");
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="' . $childClass . ' pm_team_item pm_team_rank_' . $row["rank"] . '">';
                echo '<img src="' . PM_IMAGES_REL . 'page_' . $PM_PAGE_NUM . '/' . $this->folder . '/' . $row["img"] . '.png">';
                echo '<div class="pm_team_name">' . $row[PM_LANG] . '</div>';
                if ($row[PM_LANG] !== null) echo '<div class="pm_team_job">' . $row["job"] . '</div>';
                if ($row[PM_LANG] !== null)  echo '<div class="pm_team_bio">' . $row["bio"] . '</div>';
                echo '</div>';
            }
        }
        echo '</div>';
    }
}
