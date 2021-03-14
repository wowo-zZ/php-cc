<?php

namespace wowozZ\phpcc\tests\Console;

use PHPUnit\Framework\TestCase;
use wowozZ\phpcc\Console\Application;

final class ApplicationTest extends TestCase
{
    public function testCanBeCreate(): void
    {
        $this->assertInstanceOf(
            Application::class,
            new Application()
        );
    }
}
