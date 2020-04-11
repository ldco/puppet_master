<?php

require_once "../config.ini.php";


if (FTP_IS_DEV) :
    define("REMOTE_ROOT", "ftp://" . REMOTE_USER . ":" . REMOTE_PASS . "@" . REMOTE . "/" . PM_REMOTE_APPFOLDER . "/" . FTP_DEV_FOLDER);

else :
    define("REMOTE_ROOT", "ftp://" . REMOTE_USER . ":" . REMOTE_PASS . "@" . REMOTE . "/" . PM_REMOTE_APPFOLDER . "/");

endif;


function createFolder($folder)
{
    $ftp_conn = ftp_connect(REMOTE) or die("Could not connect");
    $login = ftp_login($ftp_conn, REMOTE_USER, REMOTE_PASS);
    if (FTP_IS_DEV) {
        $dir = REMOTE_ROOT . "/" . FTP_DEV_FOLDER . "/" . $folder;
    } else {
        $dir = REMOTE_ROOT . "/" . $folder . "/";
    }


    try {
        if (ftp_nlist($ftp_conn, $dir) == false) {

            ftp_mkdir($ftp_conn, $dir);
        } else if (ftp_nlist($ftp_conn, $dir) == true) {

            // ftp_rmdir($ftp_conn, $dir);
        }
    } catch (\Throwable $th) {
        //throw $th;
    }

    ftp_close($ftp_conn);
}
