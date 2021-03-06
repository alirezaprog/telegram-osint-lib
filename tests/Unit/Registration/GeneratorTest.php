<?php

declare(strict_types=1);

namespace Unit\Registration;

use PHPUnit\Framework\TestCase;
use TelegramOSINT\Registration\DeviceGenerator\DeviceResource;
use TelegramOSINT\Registration\NameGenerator\NameResource;

class GeneratorTest extends TestCase
{
    public function test_human_name_generation(): void
    {
        $generator = new NameResource();
        $this->assertTrue(strlen($generator->getName()) > 0);
        $this->assertTrue(strlen($generator->getLastName()) > 0);
    }

    public function test_device_generation(): void
    {
        $generator = new DeviceResource();
        $this->assertTrue(strpos($generator->getSdkString(), 'SDK') === 0);
        $this->assertTrue(strlen($generator->getDeviceString()) > 0);
    }
}
