<?php

declare(strict_types=1);

//namespace sys\modules;

use sys\Controller\DB;

require_once PM_ROOT . PM_SYS_FOLDER . "/Controller/DB.class.ctrl.php";

class Blog
{
    public $title = null;
    public $table = "pm_blog";
    public $folder = "blog";
    public function make($_id = null, $childClass = null, $class = "pm_blog")
    {
        global $PM_PAGE_NUM;
        global $DB;
        if (!isset($DB)) $DB = new DB;
        echo '<div id="' . $_id . '" class="' . $class . '">';
        $result = $DB->queryRaw("SELECT * FROM $this->table");
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="' . $childClass . ' pm_blog_item">';
                echo '<img src="' . PM_IMAGES_REL . 'page_' . $PM_PAGE_NUM . '/' . $this->folder . '/' . $row["img"] . '.png">';
                echo '<div class="pm_blog_name">' . $row["name_" . PM_LANG] . '</div>';
                if (("job_" . PM_LANG !== "") || ("job_" . PM_LANG !== null)) echo '<div class="pm_blog_job">' . $row["job_" . PM_LANG] . '</div>';
                if (("bio_" . PM_LANG !== "") || ("bio_" . PM_LANG  !== null))  echo '<div class="pm_blog_bio">' . $row["bio_" . PM_LANG] . '</div>';
                echo '</div>';
            }
        }
        echo '</div>';
    }
}
