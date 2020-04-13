<?php

ini_set("display_errors", 1);
error_reporting(E_ALL); ?>
<?php


$now = date("Y-m-d H:i:s");

echo $_POST["gitself"] . $_POST["gitmaster"];

if ($_POST["gitself"] == true) {
    if ($_POST["gitmaster"] == true) {
        $com = shell_exec("git commit -am 'self commit " . $now . "'");
        $push = shell_exec("git push -u origin master");
        echo "1 -> git commit -am 'self commit " . $now . "'" . $com . "git push -u origin master" . $push;
    } else if ($_POST["gitmaster"] == false) {

        $com = shell_exec("git commit -am 'self commit " . $now . "'");
        $push = shell_exec("git push -u" . $_POST['gitto']);
        echo "2 -> git commit -am 'self commit " . $now . "'" . $com . "git push -u" . $_POST['gitto']  . $push;
    }
} else if ($_POST["gitself"] == false) {
    if ($_POST["gitmaster"] == true) {

        $com = shell_exec("git commit -am " . $_POST['gitcom']);
        $push = shell_exec("git push -u origin master");
        echo "3 -> git commit -am 'self commit " . $_POST['gitcom'] . "'" . $com . "git push -u origin master" . $push;
    } else if ($_POST["gitmaster"] == false) {

        $com = shell_exec("git commit -am " . $_POST['gitcom']);
        $push = shell_exec("git push -u" . $_POST['gitto']);
        echo "4 -> git commit -am 'self commit " . $_POST['gitcom'] . "'" . $com . "git push -u" . $_POST['gitto']  . $push;
    }
}
