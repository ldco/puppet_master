<?php

declare(strict_types=1);
//PM: MOVE THE FILE FOLDER UP!
//title
define("PM_TITLE", "PUPPET MASTER v0.8");
//meta description
define("PM_META_DESCRIPT", "פאפט מאסטר - ווב-פריימורק | 
Папет Мастер - Веб-фреймворк | 
Puppet Master - Web framework");
//credits
define("PM_COPYBY", "FABRICA21");
//by who
define("PM_BYWHO", "FABRICA21");
//web
define("PM_BYWHOWEB", "https://fabrica21.com");
//theme
define("PM_DEFAULT_THEME_LIGHT", true); //true or false
define("PM_ALLOW_THEME", true); //true or false
//WEBP
define("PM_WEBP", true); //true or false
//need login
define("PM_LOGIN", true); //true or false
//need register
define("PM_REGISTER", false); //true or false
define("PM_IS_DEV", true); //true or false -> don't forget to replace config file on host!
define("PM_PROD_SERVER", "apache"); // apache || nginx
define("PM_LOCAL_APPFOLDER", "root");
define("PM_REMOTE_APPFOLDER", "public_html"); // don't touch unless
define("PM_DEV_OS", "lin"); // lin || win || mac
define("PM_PROD_OS", "lin"); // lin || win
define("PM_ONEPAGER", false); // true || false
define("PM_ISAPP", false); // true || false
define("PM_PROGRESSIVE_APP", false); // true || false -> always true if PM_ISAPP
//skeleton items
define("PM_HEADER", "vert"); // none || float || horiz || vert || vertext (vetical extended) -> always vertext if PM_ISAPP
define("PM_FOOTER", true); // true || false
define("PM_FOOTER_NAV", false); // true || false -> always false if PM_FOOTER false
//langs
define("PM_SOCIO_BAR", false); // true || false
define("PM_DEFAULT_LANG", "en");
define("PM_ALL_LANGS", array("en", "ru", "he", "fr")); //list of langs
define("PM_ALLOW_CLIENTLANG", true); // true || false (if true, default is client lang)
//routing
define("PM_PHP_ROUTING", false);
//DB TYPE
define("DB_TYPE", "mysql");
//DB local
define("DB_NAME_LOCAL", "pm_db");
define("DB_USER_LOCAL", "admin");
define("DB_PASS_LOCAL", "admin");

//DB remote
define("DB_HOST_URL", "localhost");
define("DB_NAME_REMOTE", "");
define("DB_USER_REMOTE", "");
define("DB_PASS_REMOTE", "");

//GMAIL
define("PM_MAIN_GMAIL_USER", "");
define("PM_MAIN_GMAIL_PASS", "");

//ftp/sftp
define("REMOTE", "");
define("REMOTE_USER", "");
define("REMOTE_FTPPASS", "");
define("LOCAL_ROOT", "" . PM_LOCAL_APPFOLDER . "/");

//GIT
define("PM_GIT_REPO", "https://___.git");