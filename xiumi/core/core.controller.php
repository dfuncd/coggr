<?php

/**
 * Xiumi Framework
 * @author roop <roop@hakz.co>
 * @copyright 2013, Hakz Project, http://hakz.co/
 * @package Controller library class
 */

class Controller {


	protected $action;

	public function __construct($action = '') {

		if(!empty($action)) {
			$this->action = $action;
			if(!method_exists($this, $this->action)) {
				return false;
			}			
		}

		empty($action) ? $this->index() : $this->$action();
	}

	static public function accumulate() {
		return new Controller;
	}
}