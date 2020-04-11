<?php

require_once "../config.ini.php";

if (isset($_POST["gitself"])) {
    if (isset($_POST["gitmaster"])) {

        exec('
git add .
git commit -m "DEPLOY TO PRODUCTION"
git push -u origin master', $output, $status);
    } else {
        exec('
git add .
git commit -m "DEPLOY TO PRODUCTION"
git push -u ' . $_POST["gitto"], $output, $status);
    }
} else {
    if (isset($_POST["gitmaster"])) {

        exec('
git add .
git commit -m "' . $_POST["gitcom"] . '"
git push -u origin master', $output, $status);
    } else {
        exec('
git add .
git commit -m "' . $_POST["gitcom"] . '"
git push -u ' . $_POST["gitto"], $output, $status);
    }
}



/* PM_GIT_REPO
PM_GIT_PASS */
