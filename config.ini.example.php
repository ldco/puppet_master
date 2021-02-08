<?php

declare(strict_types=1);
//PM: MOVE THE FILE FOLDER UP!
//title
define("PM_TITLE", "PUPPET MASTER");
//meta description
define("PM_META_DESCRIPT", "פפאפט מאסטר - ווב-פריימורק | 
Папет Мастер - Веб-фреймворк | 
Puppet Master - Web framework");
//credits
define("PM_COPYBY", "FABRICA21");
//by who
define("PM_BYWHO", "FABRICA21");
//web
define("PM_BYWHOWEB", "https://fabrica21.com");
//theme
define("PM_DEFAULT_THEME_LIGHT", true);
define("PM_ALLOW_THEME", true);
//WEBP
define("PM_WEBP", true);
//need login
define("PM_LOGIN", true);
//need register
define("PM_REGISTER", false);
define("PM_IS_DEV", true); // or true -> don't forget to replace config file on host!

define("PM_PROD_SERVER", "apache"); //or nginx
define("PM_LOCAL_APPFOLDER", "root");
define("PM_REMOTE_APPFOLDER", "public_html"); //don't touch unless
define("PM_DEV_OS", "lin"); //lin/win/mac
define("PM_PROD_OS", "lin"); //lin/win
define("PM_ONEPAGER", false); //true or false
define("PM_PROGRESSIVE_APP", false); //true or false
//sceleton items
define("PM_HEADER", true); //will be false if PM_FLOATHEADER is true
define("PM_FLOATHEADER", true);
define("PM_SOCIO_BAR", false);
define("PM_FOOTER", true);
define("PM_FOOTER_NAV", false); //always false if PM_FOOTER false
//langs
define("PM_DEFAULT_LANG", "en");
define("PM_ALL_LANGS", array("en", "ru", "he", "fr")); //list of langs
define("PM_ALLOW_CLIENTLANG", true); // or true (if true, default is client lang)
//routing
define("PM_PHP_ROUTING", false);

//DB local
define("DB_NAME_LOCAL", "");
define("DB_USER_LOCAL", "");
define("DB_PASS_LOCAL", "");

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