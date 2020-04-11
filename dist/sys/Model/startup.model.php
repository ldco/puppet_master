<?php

declare(strict_types=1);

require_once (dirname($_SERVER['DOCUMENT_ROOT'], 1)) . "/config.ini.php";

if (!defined("PM_LOCAL_APPFOLDER") && !defined("PM_REMOTE_APPFOLDER")) die("config.ini is incorrect");

if (defined("PM_REMOTE_APPFOLDER") && basename($_SERVER['DOCUMENT_ROOT']) === PM_REMOTE_APPFOLDER) {
  define("PM_IS_LOCAL", false);
} else {
  define("PM_IS_LOCAL", true);
}

if (PM_IS_LOCAL) {
  define("PM_APPFOLDER", PM_LOCAL_APPFOLDER . "/");
  define("PM_ROOT", join(DIRECTORY_SEPARATOR, array(dirname($_SERVER["DOCUMENT_ROOT"], 1), PM_APPFOLDER)));
  define("PM_ROOT_REL", "");
} else {
  define("PM_APPFOLDER", PM_REMOTE_APPFOLDER . "/");
  if (defined("PM_IS_DEV") && PM_IS_DEV) {
    define("PM_IS_DEV_DEFINED", true);
    define("PM_ROOT", join(DIRECTORY_SEPARATOR, array(dirname($_SERVER["DOCUMENT_ROOT"], 1), PM_APPFOLDER .  "PM_DEV/")));
    define("PM_ROOT_REL", "");
  } else {
    define("PM_IS_DEV_DEFINED", false);
    define("PM_ROOT", join(DIRECTORY_SEPARATOR, array(dirname($_SERVER["DOCUMENT_ROOT"], 1), PM_APPFOLDER)));
    define("PM_ROOT_REL", "");
  }
}

if (!defined("PM_SYS_FOLDER")) die("Define PM_SYS_FOLDER in config.ini");

define("PM_ASSETS", (PM_ROOT . PM_SYS_FOLDER . "/assets/"));
define("PM_FONTS", join(DIRECTORY_SEPARATOR, array(PM_ASSETS, "fonts/")));
define("PM_ASSETS_REL", PM_ROOT_REL . PM_SYS_FOLDER . "/assets/");
define("PM_FONTS_REL", join(DIRECTORY_SEPARATOR, array(PM_ASSETS_REL, "fonts/")));

if (PM_IS_LOCAL) {
  define("DB_HOST", "localhost");
  define("DB_NAME", DB_NAME_LOCAL);
  define("DB_USER", DB_USER_LOCAL);
  define("DB_PASS", DB_PASS_LOCAL);
  define("PM_IMAGES", PM_ASSETS . "images/images_dev/");
  define("PM_IMAGES_REL", PM_ASSETS_REL . "images/images_dev/");
  define("PM_VIDEOS", PM_ASSETS . "videos/videos_dev/");
  define("PM_VIDEOS_REL", PM_ASSETS_REL . "videos/videos_dev/");
  define("PM_ICONS", PM_ASSETS . "icons/vector_dev/");
  define("PM_ICONS_REL", PM_ASSETS_REL . "icons/vector_dev/");
  define("PM_DEPENS_JS", "pm_master.js");
} else {
  define("DB_HOST", DB_HOST_URL);
  define("DB_NAME", DB_NAME_REMOTE);
  define("DB_USER", DB_USER_REMOTE);
  define("DB_PASS", DB_PASS_REMOTE);
  define("PM_IMAGES", PM_ASSETS . "images/images/");
  define("PM_IMAGES_REL", PM_ASSETS_REL . "images/images/");
  define("PM_VIDEOS", PM_ASSETS . "videos/videos/");
  define("PM_VIDEOS_REL", PM_ASSETS_REL . "videos/videos/");
  define("PM_ICONS", PM_ASSETS . "icons/vector/");
  define("PM_ICONS_REL", PM_ASSETS_REL . "icons/vector/");
  define("PM_DEPENS_JS", "pm_master.min.js");
}


define("PM_ADMIN_ROOT", PM_ROOT . "admin/");
define("PM_CLIENT_LANG", substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 2));
define("PM_ADMIN_TITLE", "Admin Dashboard - " . PM_TITLE);


//theme

if (isset($_POST['submitTheme'])) {

  define("PM_THEME_LIGHT", filter_var($_POST['submitTheme'], FILTER_VALIDATE_BOOLEAN));

  if (defined("PM_RUN_DEV") && PM_RUN_DEV == true) {
    $_SESSION['PM_THEME_LIGHT'] = filter_var($_POST['submitTheme'], FILTER_VALIDATE_BOOLEAN); //PHP HTTP server does not support cookie
  } else {
    setcookie("PM_THEME_LIGHT", $_POST['submitTheme'], time() + (86400 * 30), '/', strtr($_SERVER['HTTP_HOST'], ['www.' => '']));
  }
} else {
  define("PM_THEME_LIGHT", PM_DEFAULT_THEME_LIGHT);
}

//lang
if (isset($_POST['submitLang'])) {
  if (in_array($_POST['submitLang'], PM_ALL_LANGS)) {
    define("PM_LANG", $_POST['submitLang']);
    if (defined("PM_RUN_DEV") && PM_RUN_DEV == true) {
      $_SESSION['PM_LANG'] = $_POST['submitLang']; //PHP HTTP server does not support cookie
    } else {
      setcookie("PM_LANG", $_POST['submitLang'], time() + (86400 * 30), '/', strtr($_SERVER['HTTP_HOST'], ['www.' => '']));
    }
  }
} elseif (!empty($_COOKIE) && !empty($_COOKIE['PM_LANG'])) {
  if (in_array($_COOKIE['PM_LANG'], PM_ALL_LANGS)) {
    define("PM_LANG", $_COOKIE['PM_LANG']);
  }
} elseif (defined("PM_RUN_DEV") && PM_RUN_DEV == true && !empty($_SESSION) && !empty($_SESSION['PM_LANG'])) {
  if (in_array($_SESSION['PM_LANG'], PM_ALL_LANGS)) {
    define("PM_LANG", $_SESSION['PM_LANG']);
  }
}
if (!defined("PM_LANG")) {
  if (PM_ALLOW_CLIENTLANG) {
    if (in_array(PM_CLIENT_LANG, PM_ALL_LANGS)) {
      define("PM_LANG", PM_CLIENT_LANG);
    } else {
      define("PM_LANG", PM_DEFAULT_LANG);
    }
  } else {
    define("PM_LANG", PM_DEFAULT_LANG);
  }
}

define("RTL_LANGS", array("he", "ar", "arc", "dv", "fa", "ha", "khw", "ku", "ps", "ur", "yi"));

if (in_array(PM_LANG, RTL_LANGS)) {
  define("PM_DIRECTION", "rtl");
} else {
  define("PM_DIRECTION", "ltr");
}

if (in_array(PM_ADMIN_LANG, RTL_LANGS)) {
  define("PM_ADMIN_DIRECTION", "rtl");
} else {
  define("PM_ADMIN_DIRECTION", "ltr");
}

if (PM_ISAPP) {
  define("PM_ADMIN_ISROOT", 1);
} else {
  define("PM_ADMIN_ISROOT", 0);
}

define("PM_HELPER", PM_ROOT . PM_SYS_FOLDER . "/helpers/");


require_once PM_HELPER . "checkIfIsMobileNow.fun.help.php";
checkIfIsMobileNow();


if ((getcwd() . "/") === PM_ADMIN_ROOT) {
  define("PM_DEFINE_ADMIN", true);
} else {
  define("PM_DEFINE_ADMIN", false);
}
if (PM_DEFINE_ADMIN) {
  define("PM_RENDERED_TITLE", PM_ADMIN_TITLE);
  define("PM_BODY_ID", "pm_admin_body_id");
} else {
  define("PM_RENDERED_TITLE", PM_TITLE);
  define("PM_BODY_ID", "pm_body_id");
}

//path to views
define("PM_VIEWS", [
  "bar_mobile" => PM_SYS_FOLDER . "/View/bar_mobile.view.html.php", "bar_skeleton" => PM_SYS_FOLDER . "/View/bar_skeleton.view.html.php", "depends" => PM_SYS_FOLDER . "/View/depends.view.html.php", "footer" => PM_SYS_FOLDER . "/View/footer.view.html.php",
  "index" => PM_SYS_FOLDER . "/View/index.view.html.php", "logout" => PM_SYS_FOLDER . "/View/logout.view.html.php", "nav_lang" => PM_SYS_FOLDER . "/View/nav_lang.view.html.php", "nav" => PM_SYS_FOLDER . "/View/nav.view.html.php"
]);

require_once PM_ROOT . PM_SYS_FOLDER . "/Controller/DB.class.ctrl.php";
