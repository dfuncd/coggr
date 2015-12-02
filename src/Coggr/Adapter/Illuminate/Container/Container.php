<?php

namespace Coggr\Adapter\Illuminate\Container;

use Illuminate\Container\Container as IlluminateContainer;
use Coggr\Contract\Container\Container as ContainerInterface;

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
		return $this->getConcrete($id);
	}

	/**
	 * Register an existing instance as shared in the container.
	 *
	 * @param  string  $abstract
	 * @param  mixed   $instance
	 * @return void
	 */
	public function set($id)
	{
		return $this->instance($abstract, $instance);
	}

}