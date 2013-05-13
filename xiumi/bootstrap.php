<?php

/**
 * Xiumi Framework
 * @author roop <roop@hakz.co>
 * @copyright 2013, Hakz Project, http://hakz.co/
 * @package Framework Bootstrap File
 */


final class Xiumi {

	/**
	 * Matches from the routing class
	 * @param array
	 * @access private
	 */
	static public $matches = array();

	/**
	 * Objects array container
	 * @param array
	 * @access private
	 */
	static private $objects = array();

	/**
	 * Individual object use container
	 * @param array
	 * @access public
	 */
	static public $object = array();

	/**
	 * Settings array container
	 * @param array
	 * @access protected
	 */
	static protected $settings = array();

	/**
	 * All the necessary logic to be done are placed here
	 * @param void
	 * @access private
	 */
	private function __construct() {

		

		// Define Constants
		define('DS', DIRECTORY_SEPARATOR);
		define('ROOT_PATH', dirname(dirname(__FILE__)) . DS);
		define('XUMI_PATH', ROOT_PATH . DS . 'xiumi' . DS);
		define('CORE_PATH', XUMI_PATH . 'core' . DS);
		define('LIBRARY_PATH', CORE_PATH . DS . 'library' . DS);
		define('APP_PATH', ROOT_PATH . 'application' . DS);
		define('APP_TPL', APP_PATH . "templates" . DS);
		
		// Include application setting file
		self::$settings = require_once APP_PATH . "settings.php";
		define('BASE_PATH', self::$settings['BASE_PATH']);

		require_once CORE_PATH . "core.controller.php";
		require_once CORE_PATH . "core.functions.php";
		require_once CORE_PATH . "core.routing.php";
		require_once CORE_PATH . "core.templator.php";
		
		require_once APP_PATH . "routes.php";
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

		self::$object = coreFunc::arrayToObject(self::$object);

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

	/**
	 * Calls a function from an object without binding it with the application
	 * @param array Array library files with their corresponding functions and parameters
	 * @return mixed
	 */
	static public function callObjectFunction($array) {
		foreach($array as $key => $val) {
			if(!file_exists(LIBRARY_PATH . "class.{$val['name']}.php")) {
				return false;
			}

			require_once LIBRARY_PATH . "class.{$val['name']}.php";
			self::$objects[$key] = new $val['name']("'".implode('\',\'', $val['params'])."'");

			if(array_key_exists('functions', $val) && count($val['functions']) >= 1) {
				if(coreFunc::isAssoc($val['functions'])) {
					foreach($val['functions'] as $function => $params) {
						if(is_array($params) && count($params) > 0) {
							eval("self::\$objects[$key]->$function('". implode('\',\'', $params) ."');");
						}
					}
				} else {
					foreach($val['functions'] as $function) {
						if(is_array($function) && count($function) > 0) {
							eval("self::\$object[$key]->$function();");
						}
					}
				}
			}		
		}
	}


	/**
	 * Dispath the whole website
	 * @param null
	 * @return mixed
	 */
	static public function dispatch() {
		self::$matches = Routing::match();

		if(isset(self::$matches['target']['controller'])) {
			require_once APP_PATH . "controllers" . DS . self::$matches['target']['controller'] . ".php";
			$controller = self::$matches['target']['controller'] . "Controller";
			$action = isset(Xiumi::$matches['target']['action']) ? self::$matches['target']['action'] : '';
			
			new $controller($action);
		}
		
	}

}