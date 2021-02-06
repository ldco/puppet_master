<?php

declare(strict_types=1);

require_once (dirname($_SERVER['DOCUMENT_ROOT'], 1)) . "/config.ini.php";

//Config
if (!defined("PM_LOCAL_APPFOLDER") && !defined("PM_REMOTE_APPFOLDER")) die("config.ini is incorrect");

//Server or local
if (defined("PM_REMOTE_APPFOLDER") && basename($_SERVER['DOCUMENT_ROOT']) === PM_REMOTE_APPFOLDER) {
  define("PM_IS_LOCAL", false);
} else {
  define("PM_IS_LOCAL", true);
}

//Root
if (PM_IS_LOCAL) {
  define("PM_APPFOLDER", PM_LOCAL_APPFOLDER . "/");
  define("PM_ROOT", join(DIRECTORY_SEPARATOR, array(dirname($_SERVER["DOCUMENT_ROOT"], 1), PM_APPFOLDER)));
} else {
  define("PM_APPFOLDER", PM_REMOTE_APPFOLDER . "/");
  if (defined("PM_IS_DEV") && PM_IS_DEV) {
    define("PM_IS_DEV_DEFINED", true);
    define("PM_ROOT", join(DIRECTORY_SEPARATOR, array(dirname($_SERVER["DOCUMENT_ROOT"], 1), PM_APPFOLDER .  "PM_DEV/")));
  } else {
    define("PM_IS_DEV_DEFINED", false);
    define("PM_ROOT", join(DIRECTORY_SEPARATOR, array(dirname($_SERVER["DOCUMENT_ROOT"], 1), PM_APPFOLDER)));
  }
}

//sys core
define("PM_SYS", PM_ROOT . "sys/");
define("PM_CORE", PM_ROOT . "core/");

//misc paths
define("PM_HELPER", PM_SYS . "helpers/");
define("PM_ASSETS_SYS", (PM_SYS . "assets/"));
define("PM_ASSETS", (PM_CORE . "assets/"));
define("PM_FONTS", (PM_ASSETS . "fonts/"));
//relative misc paths
//..core
define("PM_ASSETS_REL", "core/assets/");
define("PM_FONTS_REL", (PM_ASSETS_REL . "fonts/"));
//..sys
define("PM_ASSETS_REL_SYS", "sys/assets/");
define("PM_FONTS_REL_SYS", (PM_ASSETS_REL_SYS . "fonts/"));

if (PM_IS_LOCAL) {
  define("DB_HOST", "localhost");
  define("DB_NAME", DB_NAME_LOCAL);
  define("DB_USER", DB_USER_LOCAL);
  define("DB_PASS", DB_PASS_LOCAL);
  //
  define("PM_DEPENS_JS", "pm_master.js");
  //..core
  define("PM_IMAGES", PM_ASSETS . "images/images_dev/");
  define("PM_IMAGES_REL", PM_ASSETS_REL . "images/images_dev/");
  define("PM_VIDEOS", PM_ASSETS . "videos/videos_dev/");
  define("PM_VIDEOS_REL", PM_ASSETS_REL . "videos/videos_dev/");
  define("PM_ICONS", PM_ASSETS . "icons/vector_dev/");
  define("PM_ICONS_REL", PM_ASSETS_REL . "icons/vector_dev/");
  //..sys
  define("PM_IMAGES_SYS", PM_ASSETS_SYS . "images/images_dev/");
  define("PM_IMAGES_REL_SYS", PM_ASSETS_REL_SYS . "images/images_dev/");
  define("PM_ICONS_SYS", PM_ASSETS_SYS . "icons/vector_dev/");
  define("PM_ICONS_REL_SYS", PM_ASSETS_REL_SYS . "icons/vector_dev/");
  define("PM_DEPENS_JS_SYS", "pm_master.js");
} else {
  define("DB_HOST", DB_HOST_URL);
  define("DB_NAME", DB_NAME_REMOTE);
  define("DB_USER", DB_USER_REMOTE);
  define("DB_PASS", DB_PASS_REMOTE);
  //
  define("PM_DEPENS_JS", "pm_master.min.js");
  //..core
  define("PM_IMAGES", PM_ASSETS . "images/images/");
  define("PM_IMAGES_REL", PM_ASSETS_REL . "images/images/");
  define("PM_VIDEOS", PM_ASSETS . "videos/videos/");
  define("PM_VIDEOS_REL", PM_ASSETS_REL . "videos/videos/");
  define("PM_ICONS", PM_ASSETS . "icons/vector/");
  define("PM_ICONS_REL", PM_ASSETS_REL . "icons/vector/");
  //..sys
  define("PM_IMAGES_SYS", PM_ASSETS_SYS . "images/images/");
  define("PM_IMAGES_REL_SYS", PM_ASSETS_REL_SYS . "images/images/");
  define("PM_ICONS_SYS", PM_ASSETS_SYS . "icons/vector/");
  define("PM_ICONS_REL_SYS", PM_ASSETS_REL_SYS . "icons/vector/");
}

//theme
if (isset($_POST['submitTheme'])) {

  define("PM_THEME_LIGHT", filter_var($_POST['submitTheme'], FILTER_VALIDATE_BOOLEAN));

  if (defined("PM_RUN_DEV") && PM_RUN_DEV === true) {
    $_SESSION['PM_THEME_LIGHT'] = filter_var($_POST['submitTheme'], FILTER_VALIDATE_BOOLEAN); //PHP HTTP server does not support cookie
  } else {
    setcookie("PM_THEME_LIGHT", $_POST['submitTheme'], time() + (86400 * 30), '/', strtr($_SERVER['HTTP_HOST'], ['www.' => '']));
  }
} else {
  define("PM_THEME_LIGHT", PM_DEFAULT_THEME_LIGHT);
}

//lang
define("PM_CLIENT_LANG", substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));

if (isset($_POST['submitLang'])) {
  if (in_array($_POST['submitLang'], PM_ALL_LANGS)) {
    define("PM_LANG", $_POST['submitLang']);
    if (defined("PM_RUN_DEV") && PM_RUN_DEV === true) {
      $_SESSION['PM_LANG'] = $_POST['submitLang']; //PHP HTTP server does not support cookie
    } else {
      setcookie("PM_LANG", $_POST['submitLang'], time() + (86400 * 30), '/', strtr($_SERVER['HTTP_HOST'], ['www.' => '']));
    }
  }
} elseif (!empty($_COOKIE) && !empty($_COOKIE['PM_LANG'])) {
  if (in_array($_COOKIE['PM_LANG'], PM_ALL_LANGS)) {
    define("PM_LANG", $_COOKIE['PM_LANG']);
  }
} elseif (defined("PM_RUN_DEV") && PM_RUN_DEV === true && !empty($_SESSION) && !empty($_SESSION['PM_LANG'])) {
  if (in_array($_SESSION['PM_LANG'], PM_ALL_LANGS)) {
    define("PM_LANG", $_SESSION['PM_LANG']);
  }
} else {
  if (defined("PM_ALLOW_CLIENTLANG") && PM_ALLOW_CLIENTLANG === true) {
    if (in_array(PM_CLIENT_LANG, PM_ALL_LANGS)) {
      define("PM_LANG", PM_CLIENT_LANG);
    } else {
      if (defined("PM_DEFAULT_LANG")) {
        define("PM_LANG", PM_DEFAULT_LANG);
      } else {
        define("PM_LANG", "en");
      }
    }
  } else {
    if (defined("PM_DEFAULT_LANG")) {
      define("PM_LANG", PM_DEFAULT_LANG);
    } else {
      define("PM_LANG", "en");
    }
  }
}

//RTL LTR
define("RTL_LANGS", array("he", "ar", "arc", "dv", "fa", "ha", "khw", "ku", "ps", "ur", "yi"));

if (in_array(PM_LANG, RTL_LANGS)) {
  define("PM_DIRECTION", "rtl");
} else {
  define("PM_DIRECTION", "ltr");
}

//mobile
require_once PM_HELPER . "checkIfIsMobileNow.fun.help.php";
checkIfIsMobileNow();

//title
define("PM_RENDERED_TITLE", PM_TITLE);

//path to views
define("PM_VIEWS", [
  "bar_mobile" => "sys/View/bar_mobile.view.html.php", "bar_skeleton" => "sys/View/bar_skeleton.view.html.php", "depends" => "sys/View/depends.view.html.php", "footer" => "sys/View/footer.view.html.php", "index" => "sys/View/index.view.html.php", "logout" => "sys/View/logout.view.html.php", "nav_lang" => "sys/View/nav_lang.view.html.php", "nav" => "sys/View/nav.view.html.php"
]);

//DB
require_once PM_SYS . "Controller/DB.class.ctrl.php";