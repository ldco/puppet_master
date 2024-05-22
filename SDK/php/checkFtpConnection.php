<?php


require_once "../../../config.ini.php";

if (isset($_POST)) {
    $ftp_conn = ftp_connect(REMOTE);
    $login = ftp_login($ftp_conn, REMOTE_USER, REMOTE_FTPPASS);

    if (!$ftp_conn) {
        echo "Ftp COnnection ERROR";
    } else {
        if (!$login) {
            echo "Ftp Login ERROR";
        } else {
            $ftpchdir = ftp_chdir($ftp_conn, PM_REMOTE_APPFOLDER);
            if (!$ftpchdir) {
                echo "Change Ftp Dir ERROR";
            } else {
                echo "Connected to: " . REMOTE_USER . ftp_pwd($ftp_conn);
                $ftpclose = ftp_close($ftp_conn);
                if (!$ftpclose) {
                    echo ("Ftp Connection closing ERROR");
                }
            }
        }
    }
}