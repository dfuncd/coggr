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
	public $requires = [];

	/**
	 * Class constructor
	 *
	 * @param \Coggr\Application\System $system
	 */
	public function __construct(System $system)
	{
		$this->system = $system;
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