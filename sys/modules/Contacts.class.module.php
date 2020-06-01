<?php

declare(strict_types=1);

use sys\Controller\DB;

require_once PM_ROOT . PM_SYS_FOLDER . "/Controller/DB.class.ctrl.php";
require_once PM_ROOT . PM_SYS_FOLDER . "/helpers/pmImg.fun.help.php";


class Contacts
{
    //public $extension = "svg";
    public $telName = "tel.";
    public $mailName = "mail";
    public $table = "pm_contact";
    public $folder = "team";
    public $id = null;
    public $class = "pm_contacts";
    public $classMob = "pm_contactsMobile";
    public $forMob = true;
    public $text = true;
    public $img = true;

    public function __construct()
    {

        global $DB;
        if (!isset($DB)) $DB = new DB;

        echo '<div id="' . $this->id . '" class="' . $this->class . '">';
        $result = $DB->queryRaw("SELECT * FROM pm_contact JOIN pm_loc ON pm_contact.text=pm_loc.id");
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $this->makeReg($row);
                if ($this->forMob) $this->makeMob($row);
            }
        }
        echo '</div>';
    }

    public function makeReg($_row)
    {
        echo '<div class="' . $this->class . '_item">';
        if ($this->img == true)
            /*  echo '<img alt="contacts icons" class="' . $this->class . '_img" src="' . PM_ICONS_REL . $_row["img"] . '.' . $this->extension . '">'; */
            pmImg("contacts-icons", PM_ICONS_REL . $_row["img"], true, $this->class . "_img");
        if ($this->text == true)
            echo '<span class="' . $this->class . '_text">' . $_row[PM_LANG] . ': </span>';
        echo '<span class="' . $this->class . '_link">';
        if ($_row["en"] === $this->telName) {
            echo '<a href="tel:>';
        } else if ($_row["en"] === $this->mailName) {
            echo '<a href="mailto:';
        } else {
            echo '<a href="';
        }
        echo $_row["link"] . '">';
        echo $_row["value"] . '</span>';
        echo '</a>';
        echo '</div>';
    }
    public function makeMob($_row)
    {
        echo '<div class="' . $this->classMob . '_item">';

        if ($_row["en"] === $this->telName) {
            echo '<a href="tel:>';
        } else if ($_row["en"] === $this->mailName) {
            echo '<a href="mailto:';
        } else {
            echo '<a href="';
        }
        echo $_row["link"] . '">';

        /*  echo '<img alt="contacts icons" class="' . $this->classMob . '_img" src="' . PM_ICONS_REL . $_row["img"] . '.' . $this->extension . '">'; */

        pmImg("contacts-icons", PM_ICONS_REL . $_row["img"], true, $this->classMob . "_img");

        echo '</a>';
        echo '</div>';
    }
}
