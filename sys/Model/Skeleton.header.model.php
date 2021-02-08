<?php

declare(strict_types=1);

namespace sys\Model;

use sys\Model\Nav;

class SkeletonHeader
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
        $this->makeSkeletonHeader($this->definedLogin, $this->definedRegister);
        $this->mobileBar($this->definedLogin, $this->definedRegister);
    }
    private function makeLogout()
    {
        $loginuserGreetings = "Welcome, " . $this->loginuser;
        $loginindexURL = $this->loginindex . "?logout";
        $navLogoutImg = $this->logoutimg;
        require_once PM_ROOT . $this->viewsNames['logout'];
    }
    public function makeSkeletonHeader(bool $login, bool $register)
    {
        $isAuthenticated = false;
        if (defined("PM_FLOATHEADER") && PM_FLOATHEADER) {
            $headerId = "pm_Header-float";
            $navId = "pm_id_NavFloat";
            $headerLogo = "pm_logo-float--header";
            $bar_asset = "pm_asset-float--header";
        } else if (defined("PM_FLOATHEADER") && !PM_FLOATHEADER) {
            $headerId = "pm_Header--desktop";
            $navId = "pm_Nav--desktop";
            $headerLogo = "pm_logo--header";
            $bar_asset = "pm_asset--header";
        } else {
            echo "PM_FLOATHEADER not defined!";
        }
        $headerLogoImg = PM_IMAGES_REL . "brand/headerLogo.svg";
        $modelNav = $this->modelNav;
        $modelBar = $this;
        $nav_pm_asset = PM_ICONS_REL . "100.svg";
        if (defined("PM_HEADER") && PM_HEADER) {
            require_once PM_ROOT . $this->viewsNames['header_desktop'];
        }
    }
    public function mobileBar(bool $login, bool $register)
    {

        $mobileSlideId = "pm_mobile-slide";
        $navId = "pm_Nav--mobile";
        $headerId = "pm_Header--mobile";
        $headerLogo = "pm_logo-mobile--header";
        $nav_pm_asset = PM_ICONS_REL . "100.svg";
        $headerLogoMob = PM_IMAGES_REL . "brand/barLogo.svg";
        $modelNav = $this->modelNav;
        require_once PM_ROOT . $this->viewsNames['header_mobile'];
    }
}