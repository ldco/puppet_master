<?php

ini_set('display_errors', 1);
error_reporting(E_ALL); ?>
<?php


$now = date("Y-m-d H:i:s");

if (isset($_POST["gitself"])) {
    if (isset($_POST["gitmaster"])) {
        $add = shell_exec('git add');
        $com = shell_exec('git commit -m "self commit ' . $now . '"');
        echo $com;
        $push = shell_exec('git push -u origin master');
        echo  $add . $com . $push;
    } else {
        $add = shell_exec('git add');
        $com = shell_exec('git commit -m "self commit ' . $now . '"');
        echo $com;
        $push = shell_exec('git push -u' . $_POST["gitto"]);
        echo  $add . $com . $push;
    }
} else {
    if (isset($_POST["gitmaster"])) {
        $add = shell_exec('git add');
        $com = shell_exec('git commit -m' . $_POST["gitcom"]);
        echo $com;
        $push = shell_exec('git push -u origin master');
        echo  $add . $com . $push;
        echo $output;
    } else {
        $add = shell_exec('git add');
        $com = shell_exec('git commit -m' . $_POST["gitcom"]);
        echo $com;
        $push = shell_exec('git push -u' . $_POST["gitto"]);
        echo  $add . $com . $push;
    }
}



/* PM_GIT_REPO
PM_GIT_PASS */
