<?php

namespace Xiumi\Application;

use Illuminate\Container\Container;

class Core
{

	/**
	 * The names of the loaded service providers.
	 *
	 * @var array
	 */
	protected $loadedProviders = [];

	/**
	 * All of the registered service providers.
	 *
	 * @var array
	 */
	protected $serviceProviders = [];

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
	}
	
}