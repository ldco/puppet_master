<?php

declare(strict_types=1);

//namespace sys\modules;

use sys\Controller\DB;

require_once PM_SYS . "Controller/DB.class.ctrl.php";
require_once PM_SYS . "helpers/pmImg.fun.help.php";


class agents
{
    public $title = null;
    public $table = "pm_agents";
    public $folder = "agents";
    public function __construct($_id = null, $childClass = null, $class = "pm_agents")
    {
        global $PM_PAGE_NUM;
        global $DB;
        if ($childClass !== null) {
            $childClass = " " + $childClass;
        }
        if (!isset($DB)) $DB = new DB;
        echo '<div id="' . $_id . '" class="' . $class . '">';
        $result = $DB->queryRaw("SELECT * FROM $this->table");
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="' . $childClass . 'pm_agents_item" id="agentid_' . $row["agent_id"] . '">';

                if ($row['img'] !== null) {
                    pmImg("agents-" . $row["name_en"] . "-img", PM_IMAGES_REL . "page_" . $PM_PAGE_NUM . "/" . $this->folder . "/" . $row['img']);
                } else {
                    if ($row['male'] === "1") {
                        pmImg("agents-default-male-img", PM_IMAGES_REL . "brand/male.svg");
                    } elseif ($row['male'] === "0") {
                        pmImg("agents-default-female-img", PM_IMAGES_REL . "brand/female.svg");
                    } else {
                        pmImg("agents-default-male-img", PM_IMAGES_REL . "brand/male.svg");
                    }
                }
                echo '</a>';

                echo '<div class="pm_agents_name">' . $row["name_" . PM_LANG] . '</div>';

                echo '<a href="tel:' . $row["tel"] . '">';

                echo '<div class="pm_agents_tel">' . $row["tel"] . '</div>';
                echo '</a>';
                echo '<a href="mailto:' . $row["email"] . '">';
                echo '<div class="pm_agents_email">' . $row["email"] . '</div>';
                echo '</a>';


                echo '</div>';
            }
        }
        echo '</div>';
    }
}
