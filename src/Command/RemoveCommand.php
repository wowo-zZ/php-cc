<?php

namespace wowozZ\phpcc\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use wowozZ\phpcc\Tools\OutputTool;

class RemoveCommand extends Command
{
    protected static $defaultName = 'remove';

    protected function configure()
    {
        $this
            ->setDescription('Remove phpcc from your project.')
            ->setHelp('This command will remove phpcc from your project by delete pre-commit file...');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        # Delete phpcc file
        $output->write("Delete pre-commit file");
        OutputTool::loading($output, 2);
        if (is_file('.git/hooks/pre-commit')) {
            exec('rm -f .git/hooks/pre-commit');
        }
        $output->write("<info>Pre-commit file with phpcc deleted!</>");
        OutputTool::loading($output, 1);

        # Retrieve old file
        $output->write("Retrieve the old pre-commit file");
        OutputTool::loading($output, 2);
        if (is_file('.git/hooks/pre-commit.bak')) {
            exec('mv .git/hooks/pre-commit.bak .git/hooks/pre-commit');
        }
        $output->write("<info>Old pre-commit file retrieved.</>");
        OutputTool::loading($output, 1);

        $output->writeln("<info>Remove phpcc success!</>");
        return 0;
    }
}
