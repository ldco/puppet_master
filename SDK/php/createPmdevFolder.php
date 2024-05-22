<?php


require_once "../../../config.ini.php";

if (isset($_POST)) {

    if (PM_IS_DEV) {
        $ftp_conn = ftp_connect(REMOTE);
        $login = ftp_login($ftp_conn, REMOTE_USER, REMOTE_FTPPASS);
        $dir = "PM_DEV";
        $dir2 = "vendor";
        if (!$ftp_conn) {
            echo "Conection ERROR";
        } else {
            if (!$login) {
                echo "Login ERROR";
            } else {
                ftp_chdir($ftp_conn, PM_REMOTE_APPFOLDER);
                echo "</br>";
                echo "Connected to: " . REMOTE_USER . ftp_pwd($ftp_conn);
                if (!ftp_nlist($ftp_conn, $dir)) {
                    if (ftp_mkdir($ftp_conn, $dir)) {
                        echo "</br>";
                        echo "</br>";
                        echo "'PM_DEV' folder created!";
                        ftp_chdir($ftp_conn, $dir);
                        echo "</br>";
                        echo "</br>";
                        echo "Connected to: " . REMOTE_USER . ftp_pwd($ftp_conn);
                        if (ftp_mkdir($ftp_conn, $dir2)) {
                            echo "</br>";
                            echo "</br>";
                            echo "'vendor' folder created!";
                        }
                    }
                } else {
                    echo "</br>";
                    echo "PM_DEV folder EXIST on server";
                }
                $ftpclose = ftp_close($ftp_conn);
                if ($ftpclose) {
                    echo "</br>";
                    echo "Connection closed!";
                } else {
                    echo "</br>";
                    echo "Connection closing ERROR";
                }
            }
        }
    } else {
        echo "You are not in PM_DEV mode!";
    }
} else {
    echo "Post ERROR... :(";
}