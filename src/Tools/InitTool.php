<?php
namespace wowozZ\phpcc\Tools;

class InitTool
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
        !is_dir('./vendor/zhenggui') ? mkdir('./vendor/zhenggui') : '';
        !is_dir('./vendor/zhenggui/php-cc') ? mkdir('./vendor/zhenggui/php-cc') : '';
        !is_file('./vendor/zhenggui/php-cc/phpcc.ini') ? exec('cp ./phpcc.ini ./vendor/zhenggui/php-cc/') : '';
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
