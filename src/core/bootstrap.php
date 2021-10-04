<?php

use Core\App;

/**
 * Begin bootstrapping the app
 * Set up the required services to run
 * */

//  * Inject dependecies to the App
App::bind('db_config', require 'src/config/database.php');

App::bind('database', new QueryBuilder(
    Connection::make(App::get('db_config')['database'])
));
