<?php

declare(strict_types=1);

//namespace sys\modules;

use sys\Controller\DB;

require_once PM_ROOT . PM_SYS_FOLDER . "/Model/startup.model.php";
require_once PM_ROOT . PM_SYS_FOLDER . "/Controller/DB.class.ctrl.php";

class Page
{
    public $arr = [];
    public function __construct($clss = null)
    {
        global $PM_PAGE_NUM;
        // ob_start();
        if ($clss != null) {
            $_clss = " " . $clss;
        } else {
            $_clss = "";
        }
        echo "<div class='pm_page_incontent" . $_clss . "' id='pm_page_" . $PM_PAGE_NUM  . "'>";
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


    public function inner($clss = null)
    {

        if ($clss != null) {
            $_clss = " " . $clss;
        } else {
            $_clss = "";
        }

        echo '<div class="pm_inner_page' . $_clss . '">';
    }


    public function img($number, $class = null, $src)

    {
        if ($class != null) {
            $_class = " " . $class;
        } else {
            $_class = "";
        }
        global $PM_PAGE_NUM;
        $div_id = "page_{$PM_PAGE_NUM}_img_{$number}";
        echo '<img alt="page_' . $PM_PAGE_NUM . '-img-' . $number . '" id="' . $div_id . '" class="pm_img ' . $_class . '" src="' . PM_IMAGES_REL . "page_" . $PM_PAGE_NUM . '/' . $src . '">';
    }

    public function close()
    {
        echo '<div class="closingPageDiv"></div>';
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
        if (!isset($DB)) $DB = new DB;
        $result = $DB->queryRaw("SELECT `" . PM_LANG . "` FROM pm_text WHERE id='" . $PM_PAGE_NUM . "_" .  $textId . "';");
        if ($result && ($row = $result->fetch_assoc())) {
        } else {
            return; //record not found
        }
        echo "<div class='pm_text " . $_class . "' id='text_" . $PM_PAGE_NUM . "_" .  $textId . "'>" . $row[PM_LANG] . '</div>';
    }
}
