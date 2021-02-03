<?php

namespace wowozZ\phpcc\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InstallCommand extends Command 
{
    protected static $defaultName = 'install';

    protected function configure() 
    {
        $this
        // the short description shown while running "php bin/console list"
        ->setDescription('Creates a new user.')

        // the full command description shown when running the command with
        // the "--help" option
        ->setHelp('This command allows you to create a user...')
    ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
            // outputs multiple lines to the console (adding "\n" at the end of each line)
    $output->writeln([
        'User Creator',
        '============',
        '',
    ]);

    // the value returned by someMethod() can be an iterator (https://secure.php.net/iterator)
    // that generates and returns the messages with the 'yield' PHP keyword
    // $output->writeln($this->someMethod());

    // outputs a message followed by a "\n"
    $output->writeln('Whoa!');

    // outputs a message without adding a "\n" at the end of the line
    $output->write('You are about to ');
    $output->write('create a user.');
        return 0;
    }
}