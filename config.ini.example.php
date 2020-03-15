<?php

declare(strict_types=1);


//PM: MOVE THE FILE FOLDER UP!

//title
define("PM_TITLE", "FABRICA21 STUDIO");
//credits
define("PM_COPYBY", "Louis David & Co.");
//by who
define("PM_BYWHO", "FABRICA21");
//web
define("PM_BYWHOWEB", "https://fabrica21.com");
//if under construction
define("PM_UNDERCONSTRACTION", false); // or true

//sceleton items
define("PM_BAR", true);
define("PM_FOOTER", true);
define("PM_FOOTER_NAV", false);

//system
define("PM_SYS_FOLDER", "sys"); //or core
define("PM_IS_DEV", true); // or true
define("PM_PROD_SERVER", "apache"); //or nginx
define("PM_LOCAL_APPFOLDER", "root");
define("PM_REMOTE_APPFOLDER", "public_html/2020");
define("PM_DEV_OS", "lin"); //lin/win/mac
define("PM_ISAPP", false); //true or false

//langs
define("PM_DEFAULT_LANG", "en");
define("PM_ALL_LANGS", array("ru", "he", "en")); //list oh langs
define("PM_ALLOW_CLIENTLANG", false); // or true (if true, default is client lang)
define("PM_ADMIN_LANG", "en"); // define lang of admin area

//DB local
define("DB_HOST_URL", "localhost");
define("DB_NAME_LOCAL", "");
define("DB_USER_LOCAL", "");
define("DB_PASS_LOCAL", ""); //hash

//DB remote
define("DB_NAME_REMOTE", "");
define("DB_USER_REMOTE", "");
define("DB_PASS_REMOTE", ""); //hash


//ftp/sftp
//define("DB_FTP_HOST", "");
//define("DB_FTP_NAME", "");
//define("DB_FTP_USER", "");
//define("DB_FTP_PASS", "");
