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
	 * @access public
	 */
	public $object = array();

	/**
	 * All the necessary logic to be done are placed here
	 * @param void
	 * @access private
	 */
	private function __construct() {

		// Define Constants
		define('DS', DIRECTORY_SEPARATOR);
		define('ROOT_PATH', dir(dir(__FILE__)) . DS);
		define('CORE_PATH', ROOT . DS . dir(__FILE__) . DS);
		define('LIBRARY_PATH', CORE_PATH . DS 'library' . DS);

		requrie_once CORE_PATH . "core.functions.php";

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

		if(!is_array($array)) {
			return $array;
		}

		foreach($array as $key => $val) {
			self::$object[$key] = '';
		}

		self::$object = self::arrayToObject(self::$object);

		foreach($array as $key => $val) {

			if(!file_exists(LIBRARY_PATH . "class.{$val['name']}.php")) {
				return false;
			}

			self::$objects[$key] = array(
				'name' => $val['name'],
				'params' => $val['params'],
				'functions' => $val['functions']
			);

			require_once LIBRARY_PATH . "class.{$val['name']}.php";
			self::$object->$key = new self::$objects[$key]['name'](self::$objects[$key]['params']);

			if(array_key_exists('functions', $val) && count($val['functions']) >= 1) {
				if(coreFunc::isAssoc($val['functions'])) {
					foreach($val['functions'] as $function => $params) {
						if(is_array($params) && count($params) > 0) {
							eval("self::\$object->$key->$function('". implode('\',\'', $params) ."');");
						}
					}
				} else {
					foreach($val['functions'] as $function) {
						if(is_array($function) && count($function) > 0) {
							eval("self::\$object->$key->$function();");
						}
					}
				}
			}
		}

		return true;
	}

}
