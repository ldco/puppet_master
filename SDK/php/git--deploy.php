<?php

ini_set("display_errors", 1);
error_reporting(E_ALL); ?>
<?php


$now = date("Y-m-d H:i:s");

if (isset($_POST["gitself"])) {
    if (isset($_POST["gitmaster"])) {

        $com = shell_exec("git commit -am 'self commit " . $now . "'");
        $push = shell_exec("git push -u origin master");
        echo "1 -> \r\n git commit -am 'self commit " . $now . "'" . "\r\n" . $com . "git push -u origin master" . "\r\n" . $push;
    } else {

        $com = shell_exec("git commit -am 'self commit " . $now . "'");
        $push = shell_exec("git push -u" . $_POST['gitto']);
        echo "2 -> git commit -am 'self commit " . $now . "'" . "\r\n" . $com . "git push -u" . $_POST['gitto']  . "\r\n" . $push;
    }
} else {
    if (isset($_POST["gitmaster"])) {

        $com = shell_exec("git commit -am" . $_POST['gitcom']);
        $push = shell_exec("git push -u origin master");
        echo "3 -> git commit -am 'self commit " . $_POST['gitcom'] . "'" . "\r\n" . $com . "git push -u origin master" . $push;
    } else {

        $com = shell_exec("git commit -am" . $_POST['gitcom']);
        $push = shell_exec("git push -u" . $_POST['gitto']);
        echo "4 -> git commit -am 'self commit " . $_POST['gitcom'] . "'" . "\r\n" . $com . "git push -u" . $_POST['gitto']  . "\r\n" . $push;
    }
}



/* PM_GIT_REPO
PM_GIT_PASS */
