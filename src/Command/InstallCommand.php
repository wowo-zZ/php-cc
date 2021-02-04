<?php

namespace wowozZ\phpcc\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InstallCommand extends Command
{
    protected static $defaultName = 'install';

    public function __construct()
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this
        ->setDescription('Install phpcc to your git config.')
        ->setHelp('This command will modify your pre-commit file. Make phpcc work.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        # check git
        $output->writeln("Checking git repository...");
        if (!is_dir("./.git")) {
            $output->writeln("Your project has not been init by git! Please check it...");
            return 1;
        }
        $output->writeln('<info>Git repository check done.</info>');
        $output->writeln('.');
        $output->writeln('.');

        # check phplint
        $output->writeln("Checking phplint install...");
        exec('./vendor/bin/phplint --version', $phplint_check_rs, $return_var);
        if ($return_var) {
            $output->writeln("Checking phplint failed! Please install phplint first!");
            return 1;
        } else {
            $output->writeln([
                "<info>Checking phplint success!</info>",
                "<comment>" . $phplint_check_rs[0] . "</comment>"
            ]);
        }
        $output->writeln('.');
        $output->writeln('.');

        # check phpcs
        $output->writeln("Checking phpcs install...");
        exec('./vendor/bin/phpcs --version', $phpcs_check_rs, $return_var);
        if ($return_var) {
            $output->writeln("<error>Checking phpcs failed! Please install phpcs first!</error>");
            return 1;
        } else {
            $output->writeln("<info>Checking phpcs success!</info>");
            $output->writeln('<comment>' . $phpcs_check_rs[0] . '</comment');
        }
        $output->writeln('.');
        $output->writeln('.');

        if (is_file('./.git/hooks/pre-commit')) {
            exec('mv ./.git/hooks/pre-commit ./.git/hooks/pre-commit.bak.' . time());
        }
        $source_file = ENV == 'development' ? './pre-commit' : 'cp ./vendor/zhenggui/php-cc/pre-commit';
        if (!is_file($source_file)) {
            $output->writeln([
                '<error>A deadly error occurs, we cannot move on :(</>',
                '<info>If you commit an issue at <comment>https://github.com/wowo-zZ/php-cc/issues/new</comment> to report this</info>',
                '<info>I will do appreciate it.</>'
                ]);
            return 1;
        }
        exec(sprintf('cp %s ./.git/hooks', $source_file));

        echo "php-cc install success!\n";
        
        return 0;
    }
}
