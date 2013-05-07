<?php

/**
 * Xiumi Framework
 * @author roop <roop@hakz.co>
 * @copyright 2013, Hakz Project, http://hakz.co/
 * @package Core functions for bootstrap file
 */

class coreFunc {

	/**
	 * Converts an array to an object
	 * @param array
	 * @return object
	 */
	static public function arrayToObject($array) {
		$object = new stdClass();
		if (is_array($array) && count($array) > 0) {
			foreach ($array as $name=>$value) {
				$name = strtolower(trim($name));
				if (!empty($name)) {
					$object->$name = self::arrayToObject($value);
				}
			}

			return $object;
		} else {
			return false;
		}
	}

	/**
	 * Checks an array if it contains associative or numeric keys
	 * @link https://gist.github.com/Thinkscape/1965669
	 * @param array
	 * @return boolean
	 */
	static public function isAssoc($array) {
		$array = array_keys($array); return ($array !== array_keys($array));
	}

}