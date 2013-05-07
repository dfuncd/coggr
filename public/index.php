<?php

/**
 * Xiumi Framework
 * @author roop <roop@hakz.co>
 * @copyright 2013, Hakz Project, http://hakz.co/
 * @package The God File
 */

require_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "xiumi\bootstrap.php";

Xiumi::bootIt();


Routing::setBasePath('/github.xiumi');



$match = Routing::match();
?>
<h3>Current request: </h3>
<pre>
	Target: <?php var_dump($match['target']); ?>
	Params: <?php var_dump($match['params']); ?>
	Name: 	<?php var_dump($match['name']); ?>
</pre>