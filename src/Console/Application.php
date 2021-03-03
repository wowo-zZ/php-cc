<?php
namespace wowozZ\phpcc\Console;

use Symfony\Component\Console\Application as BaseApplication;
use Symfony\Component\Console\Input\InputInterface;

class Application extends BaseApplication
{
    const NAME = "phpcc";
    const VERSION = "2.0";

    public function __construct()
    {
        parent::__construct(self::NAME, self::VERSION);
    }
}
