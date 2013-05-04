<?php

/**
 * Xiumi Framework
 * @author roop <roop@hakz.co>
 * @copyright 2013, Hakz Project, http://hakz.co/
 * @package Framework Bootstrap File
 */

class Xiumi {

	/**
	 * Objects array container
	 * @param array
	 * @access private
	 */
	private $objects = array();

	/**
	 * Individual object use container
	 * @param array
	 * @access private
	 */
	public $object = array();



	/**
	 * All the necessary logic to be done are placed here
	 * @param void
	 * @access private
	 */
	private function __construct() {

	}

	/**
	 * By calling this, you're now initializing the framework
	 * @param void
	 * @access public
	 */
	static public function bootIt() {
		return new Xiumi();
	}

	/**
	 * Call objects all objects necessary for the application to work
	 * @param array Array of objects from an app's settings.php
	 * @return boolean
	 */
	static public function callObjects($array) {

	}

}
