<?php

declare(strict_types=1);

//namespace sys\modules;
class Swiper
{

    public string $folder;

    public function make($buttons, $class)
    {

        echo '<div class="swiper-container ' . $class . '">';

        echo '<div class="swiper-wrapper">';
        $scanned_files = array_diff(scandir($this->folder), array('..', '.'));
        $count_files = count($scanned_files);

        for ($i = 1; $i < ($count_files + 1); $i++) {
            echo '<div class="swiper-slide"><img src="' . $this->folder . '/' . $i . '.png"></div>';
        }
        echo '</div>';

        if ($buttons) {
            echo '<div class="swiper-button-prev"></div>';
            echo '<div class="swiper-button-next"></div>';
        }
        echo '</div>';
    }
}
