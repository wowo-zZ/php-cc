<?php
namespace wowozZ\phpcc\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Yaml\Yaml;

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
             ->setHelp("You can configure phpcc through this command.")
             ->setDefinition(
                 new InputDefinition([
                    new InputOption('set', 's'),
                    new InputOption('field', 'f', InputOption::VALUE_REQUIRED),
                    new InputOption('value', 'a', InputOption::VALUE_OPTIONAL)
                 ])
             );
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        do {
            // config command require the field key
            if (empty($field_key = $input->getOption('field'))) {
                $output->writeln("<error>Need to specify a field!</error>");
                break;
            }

            // get the content of current config
            $config_file_path = VENDOR_DIR . 'wowo-zz' . DIRECTORY_SEPARATOR . 'php-cc' . DIRECTORY_SEPARATOR . 'phpcc.yml';
            $config_content = Yaml::parseFile($config_file_path);

            // if 'set' option is null, it is a get option
            if (empty($input->getOption('set'))) {
                $output->write("<info>Option $field_key is {$config_content[$field_key]}.</>");
                break;
            }

            $field_value = $input->getOption('value');
            if (empty($field_value)) {
                $output->writeln("<error>Please specify the value of option $field_key by -a opton!</error>");
                break;
            }

            if (!isset($config_content[$field_key])) {
                $output->writeln("<error>Config option $field_key not exists!</error>");
                break;
            }

            $config_content[$field_key] = $field_value;
            $new_config_content = Yaml::dump($config_content);
            file_put_contents($config_file_path, $new_config_content);
        } while (false);
    }
}
