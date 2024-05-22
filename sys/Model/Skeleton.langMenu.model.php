<?php

declare(strict_types=1);

namespace sys\Model;

class SkeletonLangMenu
{
    private $viewsNames = [];
    public function __construct()
    {
        if (!defined("PM_ROOT")) die('PM_ROOT not defined');
        $this->viewsNames = PM_VIEWS;
    }
    public function makeLang(bool $mobile)
    {
        if (count(PM_ALL_LANGS) > 1) {
            if ($mobile) {
                $pm_LangId = "pm_Lang--mobile";
                $lang_menuId = "lang_menu--mobile";
            } else {
                $pm_LangId = "pm_Lang";
                $lang_menuId = "lang_menu";
            }
            $langFormAction = "index.php";
            $imgSrc = PM_ICONS_REL . "lang.svg";
            require PM_ROOT . $this->viewsNames['lang_menu'];
        }
    }
}