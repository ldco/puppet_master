<?php

declare(strict_types=1);

function path2url($file, $Protocol = 'http://')
{
    return $Protocol . $_SERVER['HTTP_HOST'] . str_replace($_SERVER['DOCUMENT_ROOT'], '', $file);
}
