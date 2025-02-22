<?php

declare(strict_types=1);

//namespace sys\modules;

use sys\Controller\DB;

require_once PM_SYS . "Controller/DB.class.ctrl.php";
require_once PM_SYS . "helpers/pmImg.fun.help.php";


class Team
{
    public $title = null;
    public $table = "pm_team";
    public $folder = "team";
    public function __construct($_id = null, $childClass = null, $class = "pm_team")
    {
        global $PM_PAGE_NUM;
        global $DB;
        if (!isset($DB)) $DB = new DB;
        echo '<div id="' . $_id . '" class="' . $class . '">';
        $result = $DB->queryRaw("SELECT * FROM $this->table");
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="' . $childClass . ' pm_team_item pm_team_rank_' . $row["rank"] . '">';
                echo '<a href="#' . $PM_PAGE_NUM . "/" . $row["name_en"] . '">';


                pmImg("team-" . $row["name_en"] . "-img", PM_IMAGES_REL . "page_" . $PM_PAGE_NUM . "/" . $this->folder . "/" . $row['img']);

                echo '</a>';
                echo '<div id="' . $PM_PAGE_NUM . "/" . $row["name_en"] . '" class="pm_team_name">' . $row["name_" . PM_LANG] . '</div>';
                if (("job_" . PM_LANG !== "") || ("job_" . PM_LANG !== null)) echo '<div class="pm_team_job">' . $row["job_" . PM_LANG] . '</div>';
                if (("bio_" . PM_LANG !== "") || ("bio_" . PM_LANG  !== null))  echo '<div class="pm_team_bio">' . $row["bio_" . PM_LANG] . '</div>';
                echo '</div>';
            }
        }
        echo '</div>';
    }
}
