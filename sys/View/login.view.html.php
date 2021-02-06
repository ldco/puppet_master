<div id="pm_adminLoginView">
    <?php

    // show potential errors / feedback (from login object)
    if (isset($login)) {
        if ($login->errors) {
            foreach ($login->errors as $error) {
                echo "<div class='loginMessageText errorText'>" . $error . "</div>";
            }
        }
        if ($login->messages) {
            foreach ($login->messages as $message) {
                echo "<div class='loginMessageText'>" . $message . "</div>";
            }
        }
    }
    ?>

    <script>
    let el = document.getElementsByClassName("loginMessageText")[0];
    if (el.className === "loginMessageText errorText") {
        el.style.borderBottom = "solid 2vh red";
    }
    </script>

    <!-- login form box -->
    <?php
    require_once "../vendor/formr/formr/class.formr.php"; ?>

    <div class="adminTitle"><img src="../<?= PM_IMAGES_REL ?>brand/barLogo.svg"></div>

    <?php
    $form = new Formr\Formr();
    $loginformaction = "index.php";
    $form->html_purifier = $_SERVER["DOCUMENT_ROOT"] . "vendor/masterjoa/htmlpurifier-standalone/src/HTMLPurifier.php";
    echo $form->form_open("loginform", "loginform", "", "", "");
    echo $form->input_text("user_name", "User name", "", "", "placeholder='User name'");
    echo $form->input_password("user_password", "Password", "", "", "placeholder='Password'");
    echo $form->input_submit("login", "", "Go");
    echo $form->form_close();
    ?>

</div>