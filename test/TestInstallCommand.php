<?php
namespace wowozZ\phpcc\test;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class TestInstallCommand extends KernalTestCase
{
    public function testExecute()
    {
        $kernel = static::createKernel();
        $application = new Application($kernel);

        $command = $application->find('install');
        $commandTester = new CommandTester($command);
        $commandTester->execute();

        // the output of the command in the console
        $output = $commandTester->getDisplay();
        $this->assertStringContainsString('install success', $output);

    }
}