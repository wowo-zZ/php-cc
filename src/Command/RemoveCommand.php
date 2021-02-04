<?php

namespace wowozZ\phpcc\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RemoveCommand extends Command
{
    protected static $defaultName = 'remove';

    protected function configure()
    {
        $this
            ->setDescription('Remove phpcc from your project.')
            ->setHelp('This command will remove phpcc from your project by delete pre-commit file...')
    ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        
        return 0;
    }
}
