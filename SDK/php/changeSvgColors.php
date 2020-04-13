<?php

if (isset($_POST["colorfrom"]) && isset($_POST["colorto"])) {

    $from = $_POST["colorfrom"];
    $to = $_POST["colorto"];
    $path = "sys/assets/icons/vector_dev/";



    $change =  shell_exec("cd " . $path . " && pwd && grep -rli '" . $from . "' * | xargs -i@ sed -i 's/" . $from . "/" . $to . "/g' @; echo $?");


    if ($change) {
        echo "Changed from " . $from . " to " . $to . " in folder " . $change;
    } else {
        echo ("matrix error...");
    }
}
