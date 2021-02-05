<?php
function pmImg($alt, $src, $svg = false, $class = null, $id = null)
{
    if ($class != null) {
        $_class = " " . $class;
    } else {
        $_class = "";
    }

    if ($id != null) {
        $_id = " " . $id;
    } else {
        $_id = "";
    }

    $origin_extension = pathinfo($src, PATHINFO_EXTENSION);
    if ($origin_extension === "svg") {
        $src = pathinfo($src, PATHINFO_DIRNAME) . "/" . pathinfo($src, PATHINFO_FILENAME);
        $extension = "svg";
    }
    if ($origin_extension === "png") {
        $src = pathinfo($src, PATHINFO_DIRNAME) . "/" . pathinfo($src, PATHINFO_FILENAME);
        $extension = "png";
    }
    if ($origin_extension === "") {
        if ($svg) {
            $extension = "svg";
        } else {
            $extension = "png";
        }
    }
    if (PM_WEBP) {
        if (PM_IS_LOCAL) {
            echo "<img alt='$alt' src='$src.$extension' class='$_class' id='$_id'>";
        } else {
            if ($extension === "svg") {
                echo "<img alt='$alt' src='$src.svg' class='$_class' id='$_id'>";
            } else {
                echo "<picture>
              <source type='image/webp' srcset='$src.webp'>
              <source type='image/png' srcset='$src.png'>
              <img alt='$alt' src='$src.png' class='$_class' id='$_id'>
              </picture>";
            }
        }
    } else {
        echo "<img alt='$alt' src='$src.$extension' class='$_class' id='$_id'>";
    }
}