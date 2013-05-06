<?php

/**
 * Xiumi Framework
 * @author roop <roop@hakz.co>
 * @copyright 2013, Hakz Project, http://hakz.co/
 * @package Core functions for bootstrap file
 */

class coreFunc {

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