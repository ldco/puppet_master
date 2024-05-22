<?php

declare(strict_types=1);

require_once PM_SYS . "Model/startup.model.php";
require_once PM_SYS . "helpers/pmImg.fun.help.php";


class Files
{
    public $title;
    public $folder;
    public $imgNetto = false;
    public $array_sort = "natsort";
    public $ext = null;
    public function make($childClass = null, $class = null)
    {
        global $PM_PAGE_NUM;

        if ($class !== null) {
            $_class = 'class="' . $class . '"';
        } else {
            $_class = 'class="' . $this->folder . '_class"';
        }

        if ($childClass !== null) {
            $_childClass = $class . '"';
        } else {
            $_childClass = $this->folder . '_class_item';
        }

        //MAIN GRID DIV
        $path = PM_IMAGES_REL . "page_" . $PM_PAGE_NUM . "/" . $this->folder;
        echo '<div id="' . $this->folder . '"' . $_class . '>';
        if ($this->ext === null) {
            $scanned_files = scandir($path);
        } else {
            $scanned_files =
                preg_grep("~\.($this->ext)$~", scandir($path));
        }

        $files_array = array_diff($scanned_files, array("..", "."));
        if ($this->array_sort === "natsort") {
            natsort($files_array);
        }
        if ($this->array_sort === "shuffle") {
            shuffle($files_array);
        }


        foreach ($files_array as $key => $val) {

            $_val = pathinfo($val, PATHINFO_FILENAME);

            $_extension = pathinfo($val, PATHINFO_EXTENSION);
            if ($_extension === "svg") {
                $svg = true;
            } else {
                $svg = false;
            }

            //ITEM DIV
            if ($this->imgNetto === false) {
                echo '<div class="' . $_childClass . '">';
                //TITLE
                if ($this->title) {
                    echo '<div class="' . $_childClass . ' grid_title">';
                    echo $_val;
                    echo '</div>';
                }
                pmImg($this->folder . "-image", $path . "/" . $_val, $svg);

                echo '</div>';
            }
            if ($this->imgNetto === true) {

                //TITLE
                if ($this->title) {
                    echo '<div class="' . $_childClass . ' grid_title">';
                    echo $_val;
                    echo '</div>';
                }
                //IMG
                pmImg($this->folder . "-image", $path . "/" . $_val, $svg, $_childClass);
            }
        }
        echo '</div>';
    }
}