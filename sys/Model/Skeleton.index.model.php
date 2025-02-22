<?php

declare(strict_types=1);

namespace sys\Model;

/* require PM_ROOT .  'vendor/autoload.php'; */

class SkeletonIndex
{

    //  private $conn;
    private $modelHeader = null;
    private $modelDepends = null;
    private $modelFooter = null;
    private $viewsNames = [];
    // private $isAdmin = false;

    public function __construct()
    {
        if (!defined("PM_ROOT")) return;
        $this->viewsNames = PM_VIEWS;
        if (defined("PM_IS_DEV_DEFINED")) $this->isDev = PM_IS_DEV_DEFINED;
        // skeleton cases
        require_once PM_SYS . "Controller/Skeleton_cases.ctrl.php";
        //
        $modelPath = PM_SYS . "Model/";
        require_once $modelPath . "Skeleton.header.model.php";
        require_once $modelPath . "Skeleton.depends.model.php";
        require_once $modelPath . "Skeleton.footer.model.php";
        $this->modelHeader = new SkeletonHeader;
        $this->modelDepends = new SkeletonDepends;
        $this->modelFooter = new SkeletonFooter;
        return;
    }

    function index($sPageContent = '')
    {
        if (!defined("PM_ROOT")) return false;
        $modelHeader = $this->modelHeader;
        $modelDepends = $this->modelDepends;
        $modelFooter = $this->modelFooter;
        // $isAdmin = $this->isAdmin;

        $showAgreeCookie = '';
        if (empty($_COOKIE) || empty($_COOKIE['I_WANT_COOKIE'])) {
            ob_start();
            require_once PM_SYS . "View/agree.cookie.view.html.php";
            $showAgreeCookie = ob_get_contents();
            ob_clean();
        }
        //Store page content to $sPageContent
        require PM_ROOT . $this->viewsNames['index'];
        //MODULES
        require_once PM_SYS . "modules/thebility/thebility.view.php";
        return true;
    }

    function show404()
    {
        global $_SERVER;
        $serverProtocol = (empty($_SERVER["SERVER_PROTOCOL"]) ? 'HTTP/1.0' : $_SERVER["SERVER_PROTOCOL"]);
        header($serverProtocol . " 404 Not Found");
        $pm_lang = PM_LANG;
        require PM_SYS . "SysInfo/404.php";
    }


    public function __destruct()
    {
        $this->modelHeader = null;
        $this->modelDepends = null;
        $this->modelFooter = null;
        return;
    }
}