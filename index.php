<?php

use Core\{Router, Request};

/**
 * Entry point to the application
 * 
 * 1) Include autoload
 * 2) Begin bootstrap set up
 * 3) Load Router and direct to current URI
 */

require 'vender/autoload.php';

require 'src/core/bootstrap.php';

Router::load('src/routes/routes.php')->direct(Request::uri(), Request::method());
