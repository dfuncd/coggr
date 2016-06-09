<?php

use PHPUnit\Framework\TestCase;
use Coggr\Application\System;

class SystemTest extends TestCase
{
	public function testInit()
	{
		$system = new Coggr\Application\System;

		$this->assertInstanceOf('Coggr\Application\System', $system->get('Coggr\Application\System'));
	}
}