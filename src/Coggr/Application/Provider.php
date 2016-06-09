<?php

namespace Coggr\Application;

use Coggr\Application\System;

abstract class Provider
{

	/**
	 * System application container
	 *
	 * @var \Coggr\Application\System
	 */
	protected $system;

	/**
	 * Classes that are provided by the service
	 *
	 * @var array
	 */
	protected $provides = [];

	/**
	 * List of classes to be required first before running thee provider
	 *
	 * @var array
	 */
	protected $requires = [];

	/**
	 * Class constructor
	 *
	 * @param \Coggr\Application\System $system
	 */
	public function __construct(System $system)
	{
		$this->system = $system;
	}

	/**
	 * @inheritdocs
	 */
	public function get(string $name) : object
	{
		return $this->system->get($name);
	}

	/**
	 * @inheritdocs
	 *
	 * @return $this
	 */
	public function set(string $name, object $object) : self
	{
		$this->system->set($name, $object);

		return $this;
	}

	abstract public function register();

	/**
	 * Return list an array of classes that are provided
	 *
	 * @return array
	 */
	public function getProvides() : array
	{
		return $this->provides;
	}

}