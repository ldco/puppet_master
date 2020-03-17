<?php
class Grid
{
    public $folder;
    public $grid_class;
    public $array_sort = 'natsort';
    public $grid_count = 0;
    public $colomns;
    public $cursor = 'pointer';
    public $img_as_background = 0;
    public $background_size = "cover";
    public $aosjs = 1;
    public $grid_id_;
    public $title = 0;
    public $text = 0;
    public function make($grid_id, $grid_ratio, $padding)
    {
        global $pm_lang;
        $this->grid_id_ = $grid_id;
        //MAIN GRID DIV
        echo '<div id="' . $grid_id . '" class="pm_grid ' . $this->grid_class . '"style="display: grid; width: 96%; grid-template-columns: repeat(' . $this->colomns . ' , 1fr); justify-items: center;">';

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
                echo '<div class="pm_grid_div ' . $grid_id;
                if ($this->aosjs) {
                    echo ' aos_reveal"';
                }
                echo '"style="display: flex; flex-direction: column; align-items: center; justify-content: center; cursor: ' . $this->cursor . '; padding: ' . $padding . 'vw">';
                //TITLE
                if ($this->title) {

                    echo '<div class="pm_grid_div_' . $grid_id . '_title" title="' . $this->title["en"][pathinfo($val, PATHINFO_FILENAME)] . '">';
                    echo $this->title[$pm_lang][pathinfo($val, PATHINFO_FILENAME)];
                    echo '</div>';
                }
                //IMG
                echo '<img style="width: calc(' . $grid_ratio . 'vw / ' . $this->colomns . ')"; src="' . $this->folder . '/' . $val . '"></div>';
            } else {
                echo '<div class="pm_grid_div';
                if ($this->aosjs) {
                    echo ' aos_reveal"';
                }
                echo '"style="display: flex; align-items: center; justify-content: center; cursor: ' . $this->cursor . '; padding: ' . $padding . 'vw;
                background-image: url(' . $this->folder . '/' . $val . '); background-repeat: no-repeat; background-position: center;
                background-size: ' . $this->background_size . '; width: calc(' . $this->grid_ratio . 'vw / ' . $this->colomns . ')">&nbsp;</div>';
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
