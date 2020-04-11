<?php

declare(strict_types=1);

namespace sys\Model;


class SkeletonFooter
{

    //  private $conn;
    private $modelNav = null;
    private $footerByWho = '';
    private $footerByWhoWeb = '';
    private $footerCopyright = '';
    private $viewsNames = [];

    public function __construct()
    {
        if (!defined("PM_ROOT")) die('PM_ROOT not defined');
        if (defined("PM_BYWHO")) $this->footerByWho = PM_BYWHO;
        if (defined("PM_BYWHOWEB")) $this->footerByWhoWeb = PM_BYWHOWEB;
        if (defined("PM_COPYBY")) $this->footerCopyright = PM_COPYBY;

        $this->viewsNames = PM_VIEWS;

        $modelPath = PM_ROOT . PM_SYS_FOLDER . "/Model/";
        require_once $modelPath . "Skeleton.nav.model.php";
        $this->modelNav = new SkeletonNav;
        return;
    }

    function index()
    {
        if (!defined("PM_ROOT")) die('PM_ROOT not defined');

        $bywww = $this->footerByWhoWeb;
        $by = $this->footerByWho;
        $copy = $this->footerCopyright;
        $modelNav = $this->modelNav;
        //require PM_ROOT . $this->modelNav['footer'];

        if (defined("PM_FOOTER") && PM_FOOTER) {
            require PM_ROOT . $this->viewsNames['footer'];
        }

        return true;
    }
    public function __destruct()
    {
        $this->modelNav = null;
        return;
    }
}
