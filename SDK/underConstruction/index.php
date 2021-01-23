<?php
define("MYAPP_LANG", "en");
define("MYAPP_TITLE", "RippleVFX Studio");
define("MYAPP_BGCOLOR", "#fbb03b");
define("MYAPP_IMG", "underConstruction.png");
?>
<!DOCTYPE html>
<html lang=<?= MYAPP_LANG ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= MYAPP_TITLE ?></title>
    <style>
        html {}
        body {
            width: 100vw;
            height: 100vh;
            padding: 0 !important;
            margin: 0 !important;
            background-color: <?= MYAPP_BGCOLOR ?>;
            display: flex;
            justify-content: center;
            /* align-items: center; */
        }
        @media (orientation: landscape) {
            #underConstructionImg {
                width: 90vh;
            }}
@media (orientation: portrait) {
            #underConstructionImg {
                width: 100vw;
            }}
    </style>
</head>
<body>
    <div>
        <img id="underConstructionImg" src=<?= MYAPP_IMG ?> alt="logo - under construction">
    </div>
</body>
<script></script>
</html>