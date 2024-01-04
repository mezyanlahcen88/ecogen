<?php

namespace App\Enums;

/**
 * Final Class
 * Contain All Regex Using in the project
 */

final class RegexEnum
{
    // CONST PHONE = '/^\+(?:[0-9]\x20?){6,14}[0-9]$/';
    CONST PHONE = '/^(?:[0-9]\x20?){6,14}[0-9]$/';
    CONST WEBSITE = '/^(http|https)?(\:\/\/)?[w]+(\.[\w-]+)+([\w.,@?^!=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])+$/';
    CONST EMAIL = '/(.+)@(.+)\.(.+)/i';
}
