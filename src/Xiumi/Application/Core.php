<?php

namespace Xiumi\Application;

use Illuminate\Container\Container;

class Core
{
	/**
	 * Boots Xiumi
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->registerBaseBindings();
	}

	/**
	 * Register the basic bindings into the container.
	 *
	 * @return void
	 */
	public function registerBaseBindings()
	{
		$this->app = new Container;

		$this->instance('app', $this);

		$this->instance('Illuminate\Container\Container', $this);
	}
	
}