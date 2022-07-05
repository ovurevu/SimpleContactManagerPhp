<?php
$router->get('', 'ContactsController@index'); //Get index page
$router->get('home', 'ContactsController@index'); //Get index page as home uri for redirects
$router->get('create-new', 'ContactsController@create'); //GET create page
$router->post('create-new', 'ContactsController@store'); //POST create page to create a new contact
$router->get('edit-contact', 'ContactsController@edit'); //GET edit page
$router->post('edit-contact', 'ContactsController@update'); //POST edit page
$router->get('delete-contact', 'ContactsController@delete'); //GET delete page
$router->post('delete-contact', 'ContactsController@delete'); //POST delete page