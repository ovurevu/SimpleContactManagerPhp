<?php
session_start();
$database = require 'framework/bootstrap.php';

$router = new Router();

$router->define([
    '' => 'controllers/index.php'
]);

require $router->direct('');