<?php

ini_set('display_errors', 1);
error_reporting(E_ALL); ?>
<?php


$now = date("Y-m-d H:i:s");

if (isset($_POST["gitself"])) {
    if (isset($_POST["gitmaster"])) {

        exec('git add .', $output1, $status1);
        echo json_encode($status1);

        exec('git commit -m "self commit ' . $now, $output2, $status2);
        echo json_encode($status2);

        exec('git push -u origin master', $output3, $status3);
        echo json_encode($status3);
    } else {
        exec('git add . &&
git commit -m "self commit ' . $now . '"
 && git push -u ' . $_POST["gitto"], $output, $status);
        echo json_encode($output);
    }
} else {
    if (isset($_POST["gitmaster"])) {
        exec('git add . &&
git commit -m "' . $_POST["gitcom"] . '"
 && git push -u origin master', $output, $status);
        echo json_encode($output);
    } else {
        exec('git add . &&
git commit -m "' . $_POST["gitcom"] . '"
 && git push -u ' . $_POST["gitto"], $output, $status);
        echo json_encode($output);
    }
}



/* PM_GIT_REPO
PM_GIT_PASS */
