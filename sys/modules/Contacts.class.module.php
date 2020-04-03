<?php

declare(strict_types=1);

use sys\Controller\DB;

require_once PM_ROOT . PM_SYS_FOLDER . "/Controller/DB.class.ctrl.php";

class Contacts
{

    public string $table = "pm_contact";
    public string $folder = "team";
    public function make($_id = null, $text = true, $img = true, $childClass = null, $class = "pm_contacts")
    {
        // global $PM_PAGE_NUM;
        $DB = new DB();
        echo '<div id="' . $_id . '" class="' . $class . '">';
        $result = $DB->queryRaw("SELECT * FROM pm_contact JOIN pm_loc ON pm_contact.text=pm_loc.id");
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="' . $childClass . ' pm_contacts_item">';
                if ($img == true)
                    echo '<img class="pm_contacts_img" src="' . PM_ICONS_REL . '/' . $row["img"] . '.png">';
                if ($text == true)
                    echo '<span class="pm_contacts_text">' . $row[PM_LANG] . ': </span>';
                echo '<span class="pm_contacts_link">';
                if ($row["en"] === "tel.") {
                    echo '<a href="tel:>';
                } else if ($row["en"] === "mail") {
                    echo '<a href="mailto:';
                } else {
                    echo '<a href="';
                }
                echo $row["link"] . '">';
                echo $row["value"] . '</span>';
                echo '</a>';
                echo '</div>';
            }
        }
        echo '</div>';
    }
}
