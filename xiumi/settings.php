<?php

/**
 * Xiumi Framework
 * @package Settings File
 */

$settings = array(
	/**
	 * Base URL mapping for the website
	 */
	'baseRouting' => array(
		array('GET', '/', '{"controller":"index"}'),
		array('GET', '/about', '{"controller":"index","action":"about"}')
	),

	/**
	 * Libraries to be included
	 */
	'includeLibraries' => array(

	)
);
?>