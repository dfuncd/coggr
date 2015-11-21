<?php

namespace Xiumi\Adapter\Illuminate\Container;

use Illuminate\Container\Container as IlluminateContainer;
use Xiumi\Contract\Container\Container as ContainerInterface;

class Container extends IlluminateContainer implements ContainerInterface
{
	
	/**
	 * Gets an instance from the container
	 *
	 * @param string $id
	 * @return obj
	 */
	public function get($id)
	{
		
	}

	/**
	 * Sets an instance to the container
	 *
	 * @param string $id
	 * @return void
	 */
	public function set($id)
	{

	}

}