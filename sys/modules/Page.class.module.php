<?php

declare(strict_types=1);

//namespace sys\modules;

use sys\Controller\DB;

require_once PM_SYS . "Model/startup.model.php";
require_once PM_SYS . "Controller/DB.class.ctrl.php";
require_once PM_SYS . "helpers/pmImg.fun.help.php";
class Page
{
    public $arr = [];
    public function __construct($clss = null)
    {
        global $PM_PAGE_NUM;
        // ob_start();

        if ($clss !== null) {
            $_clss = "class= " . $clss;
        } else {
            $_clss = "";
        }

        echo "<section " . $_clss . " id='pm_page_" . $PM_PAGE_NUM  . "'>";
    }

    public function h($type)
    {
        if (isset($_POST['el'])) {
            echo $_POST['el'];
            exit;
        }
        global $PM_PAGE_NUM;
        //if PM_LANG is trash or hacked
        if (!defined('PM_LANG') || (strlen(PM_LANG) != 2)) return;
        $byteLANG = ord(PM_LANG);
        if ($byteLANG < 32 || $byteLANG > 127) return;
        $byteLANG = ord(substr(PM_LANG, 1, 1));
        if ($byteLANG < 32 || $byteLANG > 127) return;
        //PM_LANG -> en,ru,he,fr,it,de,zh,ja,hi,ar

        //get page name
        $DB = new DB();
        $result = $DB->queryRaw("SELECT `" . PM_LANG . "` FROM pm_loc INNER JOIN pm_pub_nav ON pm_loc.id=pm_pub_nav.name WHERE _id='" . floatval($PM_PAGE_NUM) . "';");
        if ($result && ($_row = $result->fetch_assoc())) {
            $row = $_row;
        } else {
            return; //record not found
        }

        echo "<h" . $type . ">" . $row[PM_LANG] . '</h' . $type . ">";
    }

    public function img($number, $src, $class = null)
    {
        $_extension = pathinfo($src, PATHINFO_EXTENSION);
        if ($_extension === "svg") {
            $svg = true;
        } else {
            $svg = false;
        }
        if ($class != null) {
            $_class = " " . $class;
        } else {
            $_class = "";
        }
        global $PM_PAGE_NUM;
        $img_id = "page_{$PM_PAGE_NUM}_img_{$number}";

        pmImg(
            "page_" . $PM_PAGE_NUM . "-img-" . $number,
            PM_IMAGES_REL . "page_" . $PM_PAGE_NUM . "/" . $src,
            $svg,
            "pm_img " . $_class,
            $img_id
        );
    }

    public function video($name, $class = null, $id = null, $fullscreen = true, $videoForeground = false, $autoplay = true, $muted = true, $loop = true, $controls = false, $width = "auto", $height = "auto")
    {
        global $PM_PAGE_NUM;
        if ($videoForeground === true) {
            echo "<div class='video--foreground'></div>";
        }
        if ($fullscreen === true) {
            $fullscreenclass = " video--fullscreen";
        } else {
            $fullscreenclass = "";
        }
        if ($class != null) {
            $class = " " . $class;
        } else {
            $class = "";
        }

        if ($autoplay === true) {
            $autoplay = "autoplay";
        } else {
            $autoplay = "";
        }
        if ($muted === true) {
            $muted = "muted";
        } else {
            $muted = "";
        }
        if ($loop === true) {
            $loop = "loop";
        } else {
            $loop = "";
        }
        if ($controls === true) {
            $controls = "controls";
        } else {
            $controls = "";
        };
        if (PM_ONEPAGER) {
            $path = $name;
        } else {
            $path = "page_" . $PM_PAGE_NUM .  "/" . $name;
        }
        $src = PM_VIDEOS_REL . $path;
        echo "<div id='$id' class='pm_video $class $fullscreenclass'>";
        echo "<video width='$width' height='$height' $autoplay $muted $loop $controls><source src='$src.mp4' type='video/mp4'><source src='$src.webm' type='video/webm'></video>";
        echo "</div>";
    }



    public function text($textId, $class = null)
    {
        if ($class != null) {
            $_class = " " . $class;
        } else {
            $_class = "";
        }
        //get text

        global $PM_PAGE_NUM;
        global $DB;
        if (PM_ONEPAGER) {
            $textpath = $textId;
        } else {
            $textpath =
                $PM_PAGE_NUM . "_" .  $textId;
        }
        if (!isset($DB)) $DB = new DB;
        $result = $DB->queryRaw("SELECT `" . PM_LANG . "` FROM pm_text WHERE id='" . $textpath . "';");
        if ($result && ($row = $result->fetch_assoc())) {
        } else {
            return; //record not found
        }
        echo "<article class='pm_text " . $_class . "' id='text_" . $PM_PAGE_NUM . "_" .  $textId . "'>" . $row[PM_LANG] . '</article>';
    }


    public function close()
    {
        echo '<div></div>';
        echo "</section>";
    }
}