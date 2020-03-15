<?php

declare(strict_types=1);

namespace sys\Model;

class SkeletonIndex
{

    //  private $conn;
    private $modelBar = null;
    private $modelDepends = null;
    private $modelFooter = null;
    private $viewsNames = [];
    private $isLocal = false;
    private $isAdmin = false;
    private $isDev = false;


    public function __construct()
    {
        if (!defined("PM_ROOT")) return;
        $this->viewsNames = PM_VIEWS;
        if (defined("PM_IS_LOCAL")) $this->isLocal = PM_IS_LOCAL;
        if (defined("PM_DEFINE_ADMIN")) $this->isAdmin = PM_DEFINE_ADMIN;
        if (defined("PM_IS_DEV_DEFINED")) $this->isDev = PM_IS_DEV_DEFINED;

        $modelPath = PM_ROOT . PM_SYS_FOLDER . "/Model/";
        require_once $modelPath . "Skeleton.bar.model.php";
        require_once $modelPath . "Skeleton.depends.model.php";
        require_once $modelPath . "Skeleton.footer.model.php";
        $this->modelBar = new SkeletonBar;
        $this->modelDepends = new SkeletonDepends;
        $this->modelFooter = new SkeletonFooter;



        return;
    }

    function index($sPageContent = '')
    {
        if (!defined("PM_ROOT")) return false;
        $modelBar = $this->modelBar;
        $modelDepends = $this->modelDepends;
        $modelFooter = $this->modelFooter;
        $isAdmin = $this->isAdmin;
        $isDev = $this->isDev;
        $isLocal = $this->isLocal;
        $showAgreeCookie = '';
        if (empty($_COOKIE) || empty($_COOKIE['I_WANT_COOKIE'])) {
            ob_start();
            require_once PM_ROOT . PM_SYS_FOLDER . "/View/agree.cookie.view.html.php";
            $showAgreeCookie = ob_get_contents();
            ob_clean();
        }
        //Store page content to $sPageContent
        require PM_ROOT . $this->viewsNames['index'];
        //MODULES
        require_once PM_ROOT . PM_SYS_FOLDER . "/modules/thebility/thebility.view.php";
        return true;
    }

    function show404()
    {
        global $_SERVER;
        $serverProtocol = (empty($_SERVER["SERVER_PROTOCOL"]) ? 'HTTP/1.0' : $_SERVER["SERVER_PROTOCOL"]);
        header($serverProtocol . " 404 Not Found");
        require PM_ROOT . PM_SYS_FOLDER . "/View/404.view.html.php";
    }


    public function __destruct()
    {
        $this->modelBar = null;
        $this->modelDepends = null;
        $this->modelFooter = null;
        return;
    }
}
