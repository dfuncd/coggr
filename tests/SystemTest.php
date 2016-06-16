<?php

use PHPUnit\Framework\TestCase;
use Coggr\Application\{System, Provider};

class TestHelperProvider extends Provider
{			
	public function register()
	{

	}
}

class SystemTest extends TestCase
{
	public function testInit()
	{
		$system = new Coggr\Application\System;

		$this->assertInstanceOf('Illuminate\Container\Container', $system);
	}

	public function testProvider()
	{
		$system = new Coggr\Application\System;
		$system->register('TestHelperProvider');

		$this->assertTrue(true, $system->isProviderRegistered('TestHelperProvider'));
	}
}