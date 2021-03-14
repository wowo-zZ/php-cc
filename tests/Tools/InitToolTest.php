<?php

namespace wowozZ\phpcc\tests\Tools;

use PHPUnit\Framework\TestCase;
use wowozZ\phpcc\Tools\InitTool;

final class InitToolTest extends TestCase
{
    public function testEnvDev(): void
    {
        file_exists('./vendor/zhenggui/php-cc/phpcc.ini') && unlink('./vendor/zhenggui/php-cc/phpcc.ini');
        file_exists('./vendor/zhenggui/php-cc/phpcc.yml') && unlink('./vendor/zhenggui/php-cc/phpcc.yml');
        InitTool::init('development');
        $this->assertFileExists('./vendor/zhenggui/php-cc/phpcc.ini');
        $this->assertFileExists('./vendor/zhenggui/php-cc/phpcc.yml');
    }

    public function testCheckEnv(): void
    {

        $env = file_exists('.dev.lock') ? 'development' : 'production';
        $this->assertTrue(InitTool::checkEnv($env));
    }
}
