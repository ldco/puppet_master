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


        $output = shell_exec('
git add . &&
git commit -m "self commit ' . $now . '"
git push -u ' . $_POST["gitto"] . '"');
        echo $output;
    }
} else {
    if (isset($_POST["gitmaster"])) {
        $output = shell_exec('
git add .
git commit -m "' . $_POST["gitcom"] . '"
git push -u origin master');
        echo $output;
    } else {
        $output = shell_exec('
git add .
git commit -m "' . $_POST["gitcom"] . '"
git push -u ' . $_POST["gitto"]);
        echo $output;
    }
}



/* PM_GIT_REPO
PM_GIT_PASS */
