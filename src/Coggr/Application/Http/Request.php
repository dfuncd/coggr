<?php

namespace Coggr\Application\Http;

abstract class Request extends \Symfony\Component\HttpFoundation\Request
{
	protected $validation = [];

	/**
	 * Returns all return keys from the validation and use them for mass assignment
	 *
	 * @return array
	 */
	public function insertKeys() : array
	{
		return array_keys($validation);
	}
}