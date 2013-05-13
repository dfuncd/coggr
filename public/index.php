<?php

/**
 * Xiumi Framework
 * @author roop <roop@hakz.co>
 * @copyright 2013, Hakz Project, http://hakz.co/
 * @package The God File
 */

require_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "xiumi\bootstrap.php";

Xiumi::bootIt() && Xiumi::dispatch();
?>