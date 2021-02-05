<?php

declare(strict_types=1);

namespace sys\Model;

use sys\Model\Nav;

class SkeletonBar
{

    //  private $conn;
    private $adminuser;
    private $adminindex;
    private $logoutimg = PM_ICONS . "/exit.svg";
    private $definedAdmin = false;
    private $definedFloatbar = false;
    private $definedVertical = false;
    private $definedNavLang = true;
    private $modelNav = null;
    private $viewsNames = [];

    public function __construct()
    {

        if (defined("PM_ISNAVLANG")) {
        }
        if (!defined("PM_ROOT") || !defined("PM_VIEWS")) return;

        if (!empty($_SESSION) && !empty($_SESSION['user_name'])) $this->adminuser = $_SESSION['user_name'];

        $this->viewsNames = PM_VIEWS;
        $modelPath = PM_SYS . "Model/";
        require_once $modelPath . "Skeleton.nav.model.php";
        $this->modelNav = new SkeletonNav;
        return;
    }

    function index()
    {
        $this->makeSkeletonbar($this->definedAdmin, $this->definedVertical, $this->definedNavLang);
        $this->mobileBar($this->definedAdmin, $this->definedNavLang);
    }

    private function makeLogout()
    {
        $adminUserGreetings = "Welcome, " . $this->adminuser;
        $adminIndexURL = $this->adminindex . "?logout";
        $navLogoutImg = $this->logoutimg;

        require_once PM_ROOT . $this->viewsNames['logout'];
    }

    public function makeSkeletonbar(bool $admin, bool $vertical, bool $lang)
    {

        $isAuthenticated = false;

        if (defined("PM_FLOATBAR") && PM_FLOATBAR) {
            $navBarId = "pm_id_BarFloat";
            $navId = "pm_id_NavFloat";
            $navBarClass = "pm_class_BarFloat";
            $navClass = "pm_class_NavFloat";
            $barLogo = "pm_barLogoFloat";
        } else if (defined("PM_FLOATBAR") && !PM_FLOATBAR) {
            $navBarId = "pm_id_Bar";
            $navId = "pm_id_Nav";
            $navBarClass = "pm_class_Bar";
            $navClass = "pm_class_Nav";
            $barLogo = "pm_barLogo";
        } else {
            echo "PM_FLOATBAR not defined!";
        }


        $navBarLogoImg = PM_IMAGES_REL . "brand/barLogo.svg";
        $modelNav = $this->modelNav;
        $modelBar = $this;
        $nav_pm_bar_asset = PM_ICONS_REL . "100.svg";

        if (defined("PM_BAR") && PM_BAR) {
            require_once PM_ROOT . $this->viewsNames['bar_skeleton'];
        }
    }
    public function mobileBar(bool $lang)
    {

        if (defined("PM_FLOATBAR") && PM_FLOATBAR) {
            $barId = "pm_mobileBarFloat";
            $headerId = "pm_mobileHeaderFloat";
            $headerClass = "pm_mobileHeaderFloat";
            $barClass = "pm_mobileBarFloat";
            $navClass = "pm_mobileNavFloat";
            $headerLogoId = "mobileHeaderFloatLogo";
        } else if (defined("PM_FLOATBAR") && !PM_FLOATBAR) {
            $barId = "pm_mobileBar";
            $headerId = "pm_mobileHeader";
            $headerClass = "pm_mobileHeader";
            $barClass = "pm_mobileBar";
            $navClass = "pm_mobileNav";
            $headerLogoId = "mobileHeaderLogo";
        } else {
            echo "PM_FLOATBAR not defined!";
        }


        $nav_pm_bar_asset = PM_ICONS_REL . "100.svg";
        $navBarLogoMob = PM_IMAGES_REL . "brand/barLogo.svg";
        $modelNav = $this->modelNav;

        require_once PM_ROOT . $this->viewsNames['bar_mobile'];
    }
}