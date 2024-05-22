<?php

declare(strict_types=1);

namespace sys\helpers;

class Html
{
    public static function make($content = NULL, $tag, $id, $class, $atrr)
    {
        $content = htmlentities($content);
        $tag = htmlentities($tag);
        $id = htmlentities($id);
        $class = htmlentities($class);
        $atrr = htmlentities($atrr);


        echo "<{$tag} id='{$id}' class='{$class}' {$atrr}>{$content}";
    }
    public static function close($tag)
    {
        $tag = htmlentities($tag);
        echo "</{$tag}>";
    }

    public static function makeOne($content = NULL, $tag, $id, $class, $atrr)
    {
        $content = htmlentities($content);
        $tag = htmlentities($tag);
        $id = htmlentities($id);
        $class = htmlentities($class);
        $atrr = htmlentities($atrr);

        echo "<{$tag} id='{$id}' class='{$class}' {$atrr}>{$content}</{$tag}>";
    }
}
