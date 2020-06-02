<?php
define("MYAPP_LANG", "en");
define("MYAPP_TITLE", "HAMARKETPLACE");
define("MYAPP_BGCOLOR", "#00a3ac");
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
                width: 60vh;
            }
        }

        @media (orientation: portrait) {
            #underConstructionImg {
                width: 70vw;
            }
        }
    </style>
</head>

<body>
    <div>
        <img id="underConstructionImg" src=<?= MYAPP_IMG ?>; alt="">
    </div>
</body>

<script></script>

</html>