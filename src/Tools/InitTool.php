<?php

namespace wowozZ\phpcc\Tools;

use wowozZ\phpcc\Tools\Tool;

class InitTool extends Tool
{
    public static function init($env)
    {
        switch ($env) {
            case 'development':
                self::initDev();
                break;
            case 'production':
                self::initProd();
                break;
        }
    }

    private static function initDev()
    {
        !is_dir('./vendor/wowo-zz') ? mkdir('./vendor/wowo-zz') : '';
        !is_dir('./vendor/wowo-zz/php-cc') ? mkdir('./vendor/wowo-zz/php-cc') : '';
        !is_file('./vendor/wowo-zz/php-cc/phpcc.ini') ? exec('cp ./phpcc.ini ./vendor/wowo-zz/php-cc/') : '';
        !is_file('./vendor/wowo-zz/php-cc/phpcc.yml') ? exec('cp ./phpcc.yml ./vendor/wowo-zz/php-cc/') : '';
    }

    private static function initProd()
    {
        return;
    }

    public static function checkEnv($env): bool
    {
        return ENV === $env;
    }
}
