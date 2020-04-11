<?php

if (isset($_POST["pass"])) {
    $password = $_POST["pass"];
    $options = [
        'cost' => 13
    ];
    echo password_hash($password, PASSWORD_ARGON2I, $options);
}


?>
<div>
    <form method="post">
        <input type="text" value="" name="pass" id="">
        <input type="submit">
    </form>
</div>