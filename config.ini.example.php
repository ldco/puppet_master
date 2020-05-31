<?php

declare(strict_types=1);


//PM: MOVE THE FILE FOLDER UP!

//title
define("PM_TITLE", "PUPPET MASTER");
//meta description
define("PM_META_DESCRIPT", "");
//credits
define("PM_COPYBY", "Louis David & Co.");
//by who
define("PM_BYWHO", "FABRICA21");
//web
define("PM_BYWHOWEB", "https://fabrica21.com");
//if under construction
define("PM_UNDERCONSTRACTION", false); // or true
//theme
define("PM_DEFAULT_THEME_LIGHT", true);

//sceleton items
define("PM_BAR", true);
define("PM_FOOTER", true);
define("PM_FOOTER_NAV", false);

//system
define("PM_SYS_FOLDER", "sys"); //or core
define("PM_IS_DEV", false); // or true -> don't forget to replace config file on host!
define("PM_PROD_SERVER", "apache"); //or nginx
define("PM_LOCAL_APPFOLDER", "root");
define("PM_REMOTE_APPFOLDER", "public_html"); //don't touch unless
define("PM_DEV_OS", "lin"); //lin/win/mac
define("PM_ISAPP", false); //true or false

//langs
define("PM_DEFAULT_LANG", "en");
define("PM_ALL_LANGS", array("ru", "he", "en")); //list oh langs
define("PM_ALLOW_CLIENTLANG", false); // or true (if true, default is client lang)
define("PM_ADMIN_LANG", "en"); // define lang of admin area

//DB local
define("DB_NAME_LOCAL", "");
define("DB_USER_LOCAL", "");
define("DB_PASS_LOCAL", "");

//DB remote
define("DB_HOST_URL", "localhost");
define("DB_NAME_REMOTE", "");
define("DB_USER_REMOTE", "");
define("DB_PASS_REMOTE", "");



define("PM_MAIN_GMAIL_USER", "");
define("PM_MAIN_GMAIL_PASS", "");

//ftp/sftp

define("REMOTE", "");
define("REMOTE_USER", "");
define("REMOTE_PASS", "");
define("LOCAL_ROOT", "" . PM_LOCAL_APPFOLDER . "/");
define("LOCAL_DIST", "dist" . "/");
define("FTP_DEV_FOLDER", "PM_DEV" . "/");
define("FTP_IS_DEV", true);

//GIT

define("PM_GIT_REPO", "");
