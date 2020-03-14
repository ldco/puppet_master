<?php

declare(strict_types=1);

require_once (dirname($_SERVER['DOCUMENT_ROOT'], 1)) . "/config.ini.php";

if (basename($_SERVER['DOCUMENT_ROOT']) === PM_LOCAL_APPFOLDER) {
  define("PM_IS_LOCAL", 1);
} else {
  define("PM_IS_LOCAL", 0);
}

define("PM_ICONS", "/" . PM_SYS_FOLDER . "/assets/icons/vector");

if (PM_IS_LOCAL) {
  define("PM_APPFOLDER", PM_LOCAL_APPFOLDER . "/");
} else {
  define("PM_APPFOLDER", PM_REMOTE_APPFOLDER . "/");
}

if (PM_IS_DEV) {

  define("PM_ROOT", join(DIRECTORY_SEPARATOR, array(dirname($_SERVER["DOCUMENT_ROOT"], 1), PM_APPFOLDER, "pm_dev/")));
  define("PM_ROOT_REL", "/pm_dev/");
} else {

  define("PM_ROOT", join(DIRECTORY_SEPARATOR, array(dirname($_SERVER["DOCUMENT_ROOT"], 1), PM_APPFOLDER)));
  define("PM_ROOT_REL", "");
}

define("PM_ASSETS", (PM_ROOT . PM_SYS_FOLDER . "/assets/"));
define("PM_FONTS", join(DIRECTORY_SEPARATOR, array(PM_ASSETS, "fonts/")));
define("PM_ASSETS_REL", PM_SYS_FOLDER . "/assets/");
define("PM_FONTS_REL", join(DIRECTORY_SEPARATOR, array(PM_ASSETS_REL, "fonts/")));

if (PM_IS_LOCAL) {

  define("DB_HOST", "localhost");
  define("PM_IMAGES", (PM_ASSETS . "images/images_dev/"));
  define("PM_IMAGES_REL", (PM_ASSETS_REL . "images/images_dev/"));
  define("PM_VIDEOS", (PM_ASSETS . "videos/videos_dev/"));
  define("PM_VIDEOS_REL", (PM_ASSETS_REL . "videos/videos_dev/"));
  define("PM_ICONS_REL", join(DIRECTORY_SEPARATOR, array(PM_ASSETS_REL, "icons/vector_dev/")));
  define("PM_DEPENS_JS", "pm_master.js");
} else {
  define("DB_HOST", DB_HOST_URL);
  define("PM_IMAGES", (PM_ASSETS . "images/images/"));
  define("PM_IMAGES_REL", (PM_ASSETS_REL . "images/images/"));
  define("PM_VIDEOS", (PM_ASSETS . "videos/videos/"));
  define("PM_VIDEOS_REL", (PM_ASSETS_REL . "videos/videos/"));
  define("PM_ICONS_REL", join(DIRECTORY_SEPARATOR, array(PM_ASSETS_REL, "icons/vector/")));
  define("PM_DEPENS_JS", "pm_master.min.js");
}




define("PM_ADMIN_ROOT", PM_ROOT . "admin/");
define("PM_CLIENT_LANG", substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 2));
define("PM_ADMIN_TITLE", "Admin Dashboard - " . PM_TITLE);

if (isset($_POST['submitLang'])) {
  if (in_array($_POST['submitLang'], PM_ALL_LANGS)) {
    define("PM_LANG", $_POST['submitLang']);
    setcookie("PM_LANG", $_POST['submitLang'], time() + (86400 * 30), '/', strtr($_SERVER['HTTP_HOST'], ['www.' => '']));
  }
} elseif (!empty($_COOKIE) && !empty($_COOKIE['PM_LANG'])) {
  if (in_array($_COOKIE['PM_LANG'], PM_ALL_LANGS)) {
    define("PM_LANG", $_COOKIE['PM_LANG']);
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


require_once PM_ROOT . PM_SYS_FOLDER . "/helpers/checkIfIsMobileNow.fun.help.php";
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
  "bar_mobile" => PM_SYS_FOLDER . "/View/bar_mobile.view.html.php", "bar_skeleton" => PM_SYS_FOLDER .  "/View/bar_skeleton.view.html.php", "depends" => PM_SYS_FOLDER . "/View/depends.view.html.php", "footer" => PM_SYS_FOLDER . "/View/footer.view.html.php",
  "index" => PM_SYS_FOLDER . "/View/index.view.html.php", "logout" => PM_SYS_FOLDER . "/View/logout.view.html.php", "nav_lang" => PM_SYS_FOLDER . "/View/nav_lang.view.html.php", "nav" => PM_SYS_FOLDER . "/View/nav.view.html.php"
]);

require_once PM_ROOT . PM_SYS_FOLDER . "/Controller/DB.class.ctrl.php";
//require_once PM_ROOT . PM_SYS_FOLDER . "/helpers/Html.class.help.php";
