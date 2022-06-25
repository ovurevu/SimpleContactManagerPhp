<?php
$router->get('', 'controllers/index.php'); //Get index page
$router->get('home', 'controllers/index.php'); //Get index page as home uri for redirects
$router->get('create-new', 'controllers/create.php'); //GET create page
$router->post('create-new', 'controllers/create.php'); //POST create page to create a new contact
$router->get('edit-contact', 'controllers/edit.php'); //GET edit page
$router->post('edit-contact', 'controllers/edit.php'); //POST edit page
$router->get('delete-contact', 'controllers/delete.php'); //GET delete page
$router->post('delete-contact', 'controllers/delete.php'); //POST delete page