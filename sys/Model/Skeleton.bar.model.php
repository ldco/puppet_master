<?php

declare(strict_types=1);

namespace sys\Model;

use sys\Model\Nav;

class SkeletonBar
{

    //  private $conn;
    private $loginuser;
    private $loginindex;
    private $logoutimg = PM_ICONS . "/exit.svg";
    private $definedLogin = false;
    private $definedRegister = false;
    private $modelNav = null;
    private $viewsNames = [];

    public function __construct()
    {
        if (!defined("PM_ROOT") || !defined("PM_VIEWS")) return;
        if (!empty($_SESSION) && !empty($_SESSION['user_name'])) $this->loginuser = $_SESSION['user_name'];
        $this->viewsNames = PM_VIEWS;
        $modelPath = PM_SYS . "Model/";
        require_once $modelPath . "Skeleton.nav.model.php";
        $this->modelNav = new SkeletonNav;
        return;
    }
    function index()
    {
        $this->makeSkeletonbar($this->definedLogin, $this->definedRegister);
        $this->mobileBar($this->definedLogin, $this->definedRegister);
    }
    private function makeLogout()
    {
        $loginuserGreetings = "Welcome, " . $this->loginuser;
        $loginindexURL = $this->loginindex . "?logout";
        $navLogoutImg = $this->logoutimg;
        require_once PM_ROOT . $this->viewsNames['logout'];
    }
    public function makeSkeletonbar(bool $login, bool $register)
    {
        $isAuthenticated = false;
        if (defined("PM_FLOATBAR") && PM_FLOATBAR) {
            $navBarId = "pm_id_BarFloat";
            $navId = "pm_id_NavFloat";
            $barLogo = "pm_barLogoFloat";
        } else if (defined("PM_FLOATBAR") && !PM_FLOATBAR) {
            $navBarId = "pm_id_Bar";
            $navId = "pm_id_Nav";
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
    public function mobileBar(bool $login, bool $register)
    {

        $barId = "pm_mobileBar";
        $navId = "pm_mobileNav";
        $headerId = "pm_mobileHeader";
        $headerLogoId = "mobileHeaderLogo";
        $nav_pm_bar_asset = PM_ICONS_REL . "100.svg";
        $navBarLogoMob = PM_IMAGES_REL . "brand/barLogo.svg";
        $modelNav = $this->modelNav;
        require_once PM_ROOT . $this->viewsNames['bar_mobile'];
    }
}