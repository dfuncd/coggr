<?php

namespace Coggr\Contract\Contianer;

interface Container extends \Interop\Container\ContainerInterface
{

	/**
	 * Register an existing instance as shared in the container.
	 *
	 * @param  string  $abstract
	 * @param  mixed   $instance
	 * @return void
	 */
	public function set($abstract, $instance);

}