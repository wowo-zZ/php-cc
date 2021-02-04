<?php
namespace wowozZ\phpcc\Tools;

use Symfony\Component\Console\Output\OutputInterface;

class OutputTool
{
    public static function loading(OutputInterface $output, int $i)
    {
        while ($i > 0) {
            $output->write('.');
            usleep(500000);
            $i--;
        }
        $output->writeln('');
    }
}