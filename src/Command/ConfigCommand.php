<?php
namespace wowozZ\phpcc\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ConfigCommand extends Command
{
    protected static $defaultName = "config";

    public function __construct()
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription("Show or Edit config items for phpcc.")
             ->setHelp("You can configure phpcc through this command.");
    }

    public function execute(InputInterface $input, OutputInterface $output) 
    {
        return 0;
    }
}