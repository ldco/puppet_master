<?php

ini_set('display_errors', 1);
error_reporting(E_ALL); ?>
<?php


$now = date("Y-m-d H:i:s");

if (isset($_POST["gitself"])) {
    if (isset($_POST["gitmaster"])) {
        exec('git add .', $output, $status);
        exec('git commit -m "self commit ' . $now . '"', $output, $status);
        exec('git push -u origin master', $output, $status);
        echo json_encode($status);
    } else {

        exec('git add .', $output, $status);
        exec('git commit -m "self commit ' . $now . '"', $output, $status);
        exec('git push -u ' . $_POST["gitto"], $output, $status);
        echo json_encode($output . $status);
    }
} else {
    if (isset($_POST["gitmaster"])) {

        exec('git add .', $output, $status);
        exec('git commit -m "self commit ' . $now . '"', $output, $status);
        exec('git push -u ' . $_POST["gitto"], $output, $status);
        echo json_encode($output . $status);
    } else {

        exec('git add .', $output, $status);
        exec('git commit -m "' . $_POST["gitcom"] . '"', $output, $status);
        exec('git push -u ' . $_POST["gitto"], $output, $status);
        echo json_encode($output . $status);
    }
}



/* PM_GIT_REPO
PM_GIT_PASS */
