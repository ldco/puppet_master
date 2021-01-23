<?php

require_once "../config.ini.php";


if (PM_IS_DEV) :
    define("REMOTE_ROOT", "ftp://" . urlencode(REMOTE_USER) . ":" . urlencode(REMOTE_FTPPASS) . "@" . REMOTE . "/" . PM_REMOTE_APPFOLDER . "/" . "PM_DEV" . "/");

else :
    define("REMOTE_ROOT", "ftp://" . urlencode(REMOTE_USER) . ":" . urlencode(REMOTE_FTPPASS) . "@" . REMOTE . "/" . PM_REMOTE_APPFOLDER . "/");

endif;

function createFolder($folder)
{

    if (PM_IS_DEV) {
        $_remote = REMOTE . "/PM_DEV";
    } else {
        $_remote =
            REMOTE . "";
    }


    $ftp_conn = ftp_connect(REMOTE) or die("Could not connect");
    $login = ftp_login($ftp_conn, REMOTE_USER, REMOTE_FTPPASS);
    $dir = $_remote . $folder;

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
