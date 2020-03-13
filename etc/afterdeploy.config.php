<?php

declare(strict_types=1);
function pmAfterUpload()
{
    return true;
}

function pmUploadSuccess()
{
    unlink(__FILE__);
}

if (pmAfterUpload()) {
    pmUploadSuccess();
}
