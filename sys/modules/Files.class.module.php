<?php

declare(strict_types=1);

require_once PM_ROOT . PM_SYS_FOLDER . "/Model/startup.model.php";

class Files
{
    public $title;
    public $folder;
    public $imgNetto = false;
    public $array_sort = 'natsort';
    public function make($childClass = null, $class = null)
    {
        global $PM_PAGE_NUM;

        if ($class != null) {
            $_class = 'class="' . $class . '"';
        } else {
            $_class = '';
        }

        //MAIN GRID DIV
        $path = PM_IMAGES_REL . "page_" . $PM_PAGE_NUM . "/" . $this->folder;
        echo '<div id="' . $this->folder . '"' . $_class . '>';
        $scanned_files = array_diff(scandir($path), array('..', '.'));
        if ($this->array_sort === "natsort") {
            natsort($scanned_files);
        }
        if ($this->array_sort === "shuffle") {
            shuffle($scanned_files);
        }
        $i = 0;
        foreach ($scanned_files as $key => $val) {

            //ITEM DIV
            if ($this->imgNetto == false) {
                echo '<div class="' . $childClass . '">';
                //TITLE
                if ($this->title) {
                    echo '<div class="' . $childClass . ' grid_title">';
                    echo pathinfo($val, PATHINFO_FILENAME);
                    echo '</div>';
                }
                //IMG
                echo '<img alt="' . $this->folder . '-image" src="' . $path . '/' . $val . '"></div>';
            }
            if ($this->imgNetto == true) {

                //TITLE
                if ($this->title) {
                    echo '<div class="' . $childClass . ' grid_title">';
                    echo pathinfo($val, PATHINFO_FILENAME);
                    echo '</div>';
                }
                //IMG
                echo '<img alt="' . $this->folder . '-image" class="' . $childClass . '" src="' . $path . '/' . $val . '">';
            }
        }
        echo '</div>';
    }
}
