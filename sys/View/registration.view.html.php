<?php


// include the configs / constants for the database connection
//require_once "../../pm_config.ini.php";

// load the registration class
//require_once "registration.class.php";

// create the registration object. when this object is created, it will do all registration stuff automatically
// so this single line handles the entire registration process.
$registration = new Registration();

// show potential errors / feedback (from registration object)
if (isset($registration)) {
    if ($registration->errors) {
        foreach ($registration->errors as $error) {
            echo '<div class="loginMessageText errorText">' . $error . '</div>';
        }
    }
    if ($registration->messages) {
        foreach ($registration->messages as $message) {
            echo '<div class="loginMessageText errorText">' . $message . '</div>';
        }
    }
}

$pageTitle = "הרשמה";


?>

<!-- register form -->
<form method="post" action="<?php $_SERVER['DOCUMENT_ROOT'] . '/adminRegister/index.php' ?>" name="registerform">

    <!-- the user name input field uses a HTML5 pattern check -->
    <div id="formDiv">


        <div class="input oneline" id="adminInput">
            <span class="inputName">שם משתמש</span></div>
        <div class="input">
            <input id="login_input_username" class="req" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required placeholder="הכנס שם משתשמש"></div>

        <!-- the email input field uses a HTML5 email type check -->
        <div class="input oneline" id="adminInput">
            <span class="inputName">מייל</span></div>
        <div class="input">
            <input id="login_input_email" class="req" type="email" name="user_email" required placeholder="הכנס כתובת מייל"></div>

        <div class="input oneline" id="adminInput">
            <span class="inputName">סיסמה</span></div>
        <div class="input">
            <input id="login_input_password_new" class="req" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" placeholder="הזן סיסמה חדשה"></div>

        <div class="input oneline" id="adminInput">
            <span class="inputName">חזור על סיסמה</span></div>
        <div class="input">
            <input id="login_input_password_repeat" class="req" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" placeholder="חזור על הסיסמה"></div>

        <div id="submitDiv" class="newSegment">
            <input type="submit" name="register" value="שלח"></div>


    </div>
</form>

<!-- backlink -->
<a href="../index.php">חזור לדף כניסה</a>