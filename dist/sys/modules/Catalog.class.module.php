<?php

declare(strict_types=1);

//namespace sys\modules;

use sys\Controller\DB;

require_once PM_ROOT . PM_SYS_FOLDER . "/Controller/DB.class.ctrl.php";
require_once PM_ROOT . PM_SYS_FOLDER . "/helpers/pmTranslate.fun.php";
require_once PM_ROOT . PM_SYS_FOLDER . "/helpers/pmImg.fun.help.php";


class Catalog
{
    public $title = null;
    public $table = "pm_catalog";
    public $folder = "catalog";
    public function __construct($_id = null, $childClass = null, $class = "pm_catalog")
    {
        global $PM_PAGE_NUM;
        global $DB;
        if (!isset($DB)) $DB = new DB;
        echo '<div id="' . $_id . '" class="' . $class . '">';
        echo '<div id="' . $_id . '" class="' . $class . '_wraper">';
        $result = $DB->queryRaw("SELECT * FROM $this->table JOIN pm_catalog_category ON $this->table.category=pm_catalog_category.id JOIN pm_loc ON pm_catalog_category.cat_name=pm_loc.id");

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="' . $childClass . ' pm_catalog_item">';
                echo '<div class="' . $childClass . ' pm_catalog_item_name">' . $row["name"] . '</div>';
                echo '<div class="' . $childClass . ' pm_catalog_item_category">' . pmTranslate(PM_LANG, "category", false) . ": " . $row[PM_LANG] . '</div>';
                echo '<div class="' . $childClass . ' pm_catalog_item_subcategory">' . $row["subcategory"] . '</div>';
                echo '<div class="' . $childClass . ' pm_catalog_item_images">';

                pmImg("catalog product-" . $row['name'] . "-image", PM_IMAGES_REL . "page_" . $PM_PAGE_NUM . "/" . $this->folder . "/" . $row['ctlg_id'] . "/" . $row['img1']);

                if ($row["img2"] !== null) {

                    pmImg("catalog product-" . $row['name'] . "-image", PM_IMAGES_REL . "page_" . $PM_PAGE_NUM . "/" . $this->folder . "/" . $row['img2']);
                }
                if ($row["img3"] !== null) {


                    pmImg("catalog product-" . $row['name'] . "-image", PM_IMAGES_REL . "page_" . $PM_PAGE_NUM . "/" . $this->folder . "/" . $row['img3']);
                }
                echo '</div>';
                echo '<div class="' . $childClass . ' pm_catalog_item_information">';
                echo '<div class="pm_catalog_item_infa">' . $row["infa"] . '</div>';
                echo '<div class="pm_catalog_item_price">' . pmTranslate(PM_LANG, "price", false) . ": " . $row["price"] . '</div>';
                echo '<div class="pm_catalog_item_minorder">' . pmTranslate(PM_LANG, "min. order", false) . ": " . $row["minorder"] . '</div>';
                /* if($row["localprice"] !== null) {} */
                echo '</div>';
                echo '</div>';
            }
        }

        echo '</div>';
    }
}
