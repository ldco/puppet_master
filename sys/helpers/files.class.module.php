<?php
class Files
{
    public $title;
    public $folder;
    public $array_sort = 'natsort';
    public function make($_id, $clas)
    {
        global $pm_lang;
        //MAIN GRID DIV
        echo '<div id="' . $_id . '" class="' . $clas . '">';
        $scanned_files = array_diff(scandir($this->folder), array('..', '.'));
        if ($this->array_sort === "natsort") {
            natsort($scanned_files);
        }
        if ($this->array_sort === "shuffle") {
            shuffle($scanned_files);
        }
        $i = 0;
        foreach ($scanned_files as $key => $val) {
            if (!$this->img_as_background) {
                //ITEM DIV
                echo '<div>';
                //TITLE
                if ($this->title) {
                    echo '<div class="' . $_id . '_title">';
                    echo $this->title[$pm_lang][pathinfo($val, PATHINFO_FILENAME)];
                    echo '</div>';
                }
                //IMG
                echo '<img src="' . $this->folder . '/' . $val . '"></div>';
            } else {
                echo '<div>&nbsp;</div>';
            }
            if ($this->grid_count) {
                if (++$i == $this->grid_count) {
                    break;
                }
            }
        }
        echo '</div>';
    }
}
