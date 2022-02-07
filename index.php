<?php
session_start();
$database = require 'framework/bootstrap.php';

$router = new Router();

$router->get('', 'controllers/index.php'); //Get index page
$router->get('home', 'controllers/index.php'); //Get index page as home uri for redirects
$router->get('create-new', 'controllers/create.php'); //GET create page
$router->post('create-new', 'controllers/create.php'); //POST create page to create a new contact
$router->get('edit-contact', 'controllers/edit.php'); //GET edit page
$router->post('edit-contact', 'controllers/edit.php'); //POST edit page
$router->get('delete-contact', 'controllers/delete.php'); //GET delete page
$router->post('delete-contact', 'controllers/delete.php'); //POST delete page


//Using trim() to remove opening and closing slashes from uri to clean it up
//so that /about/us/ becomes something like about/us
//Also parse_url returns just the uri without the query string
//so that contact?id=3 just returns contact
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

//determine if it's a get or post request
$request_type = $_SERVER['REQUEST_METHOD'];

require $router->direct($uri, $request_type);