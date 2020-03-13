<?php

declare(strict_types=1);

//namespace sys\Pages;

use sys\Controller\DB;


require_once $_SERVER['DOCUMENT_ROOT'] . "/" . "sys/Model/startup.model.php";
require_once PM_ROOT . PM_SYS_FOLDER . "/Controller/DB.class.ctrl.php";
?>

<?php
class Page
{
    public $arr = [];
    public function __construct()
    {
        global $PM_PAGE_NUM;
        // ob_start();

        echo "<div class='pm_page_incontent' id='pm_page_" . $PM_PAGE_NUM  . "'>";
    }

    public function h($type, $bool)
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
        /*  $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $conn->set_charset('utf8mb4');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        };
        $sql = "SELECT pm_loc." . PM_LANG . " FROM pm_loc INNER JOIN pm_pub_nav ON pm_loc.id=pm_pub_nav.name WHERE _id='" . $PM_PAGE_NUM . "';";
        $result = $conn->query($sql);
        if ($result) {
            while ($_row = $result->fetch_assoc()) {
                $row = $_row;
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close(); */

        if ($bool == true) {
            echo "<h" . $type . ">" . $row[PM_LANG] . '<h' . $type . ">";
        }
    }

    public function close()
    {
        echo "</div>";
        //ob_end_clean();
    }
}
