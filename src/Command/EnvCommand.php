<?php

namespace wowozZ\phpcc\Command;

use Symfony\Component\Console\Command\Command;

use wowozZ\phpcc\Tools\InitTool;

class EnvCommand extends Command 
{
    protected static $defaultName = "env";

    public function __construct() 
    {
        if(!InitTool::checkEnv(DEV))
        {
            return false;
        }
        parent::__construct();
    }

    protected function configure()
    {
        $this
        ->setDescription('Show information about enviroment')
        ->setHelp('This command will show the information about enviroment');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        return 0;
    }
}