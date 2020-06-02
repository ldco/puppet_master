<?php

declare(strict_types=1);

//namespace sys\modules;

require_once PM_ROOT . PM_SYS_FOLDER . "/helpers/pmImg.fun.help.php";

class Swiper
{

    public $folder;

    public function make($class, $buttons = true)
    {

        echo '<div class="swiper-container ' . $class . '">';

        echo '<div class="swiper-wrapper">';
        $scanned_files = array_diff(scandir($this->folder), array('..', '.'));
        $count_files = count($scanned_files);

        for ($i = 1; $i < ($count_files + 1); $i++) {
            echo '<div class="swiper-slide">';

            pmImg("swiper-' . $class . '-img", $this->folder . "/" . $i);

            echo '</div>';
        }
        echo '</div>';

        if ($buttons) {
            echo '<div class="swiper-button-prev"></div>';
            echo '<div class="swiper-button-next"></div>';
        }
        echo '</div>';
    }
}
