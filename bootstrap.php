<?php

require_once __DIR__.'/lib/model/User.php';
require_once __DIR__.'/lib/model/Book.php';


require_once __DIR__.'/lib/service/UserService.php';
require_once __DIR__.'/lib/service/BookService.php';
require_once __DIR__.'/lib/service/Container.php';




$configuration = array(
    'db_dsn'  => 'mysql:host=localhost;dbname=rei',
    'db_user' => 'root',
    'db_pass' => null,
);

