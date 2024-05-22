<?php

declare(strict_types=1);

//namespace sys\modules;

use sys\Controller\DB;

require_once PM_SYS . "Controller/DB.class.ctrl.php";
require_once PM_SYS . "helpers/pmImg.fun.help.php";

class Blog
{
    public $title = null;
    public $table = "pm_blog";
    public $folder = "blog";
    public function __construct($_id = null, $childClass = null, $class = "pm_blog")
    {
        global $PM_PAGE_NUM;
        global $DB;
        if (!isset($DB)) $DB = new DB;
        echo '<div id="' . $_id . '" class="' . $class . '">';
        $result = $DB->queryRaw("SELECT * FROM $this->table ORDER BY blog_date DESC");
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="' . $childClass . ' pm_blog_item">';

                echo '<div class="pm_blog_name">' . $row["name_" . PM_LANG] . '</div>';

                pmImg("blog post-{$row['blog_id']}-image", PM_IMAGES_REL . "page_" . $PM_PAGE_NUM . "/" . $this->folder . "/" . $row["blog_id"] . "/" . $row['blog_img']);

                echo '<div class="pm_blog_text">' . $row["text_" . PM_LANG] . '</div>';
                echo '<div class="pm_blog_date">' . $row["blog_date"] . '</div>';
                echo '</div>';
            }
        }
        echo '</div>';
    }
}
