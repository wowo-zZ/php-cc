<?php

namespace wowozZ\phpcc\Tools;

!defined('ENV') && define('ENV', is_file('./.dev.lock') ? 'development' : 'production');
!defined('DEV') && define('DEV', 'development');
!defined('PRO') && define('PRO', 'production');
!defined('VENDOR_DIR') && define('VENDOR_DIR', ENV == DEV ? __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR : __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);

class Tool
{

}
