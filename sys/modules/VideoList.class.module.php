<?php

declare(strict_types=1);

//namespace sys\modules;

use sys\Controller\DB;

require_once PM_ROOT . PM_SYS_FOLDER . "/Controller/DB.class.ctrl.php";

class VideoList
{
    public $title = null;
    public string $table;
    public string $row;
    public string $prelink = "https://www.youtube.com/embed/";
    public function make($_id, $childClass = null, $class = null)
    {
        global $DB;
        if ($class != null) {
            $_class = 'class="' . $class . '"';
        } else {
            $_class = '';
        }
        if (!isset($DB)) $DB = new DB;
        echo '<div id="' . $_id . '"' . $_class . '>';
        $result = $DB->queryRaw("SELECT * FROM $this->table");
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="' . $childClass . '">';
                echo '<iframe src="' . $this->prelink . $row[$this->row] . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                echo '</div>';
            }
        }
        echo '</div>';
    }
}
