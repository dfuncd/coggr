<?php

/**
 * Xiumi Framework
 * @author roop <roop@hakz.co>
 * @copyright 2013, Hakz Project, http://hakz.co/
 * @package Application Routes file
 */

Routing::setBasePath('/github.xiumi');

Routing::map('GET', '/', array('controller' => 'index'));
Routing::map('GET', '/about', array('controller' => 'index', 'action' => 'about'));