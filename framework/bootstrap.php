<?php
session_start();
require 'models/Contact.php'; //Bring in the model
require 'framework/helpers/helper_functions.php';
require 'framework/database/Connection.php';
require 'framework/database/QueryBuilder.php';
require 'framework/Router.php';
require 'framework/Request.php';

$app = []; //Initialize app variable

$app['config'] = require 'config.php'; //create an entry in app for config

$pdo = Connection::connect($app['config']['database']); //new PDO connection

$app['database'] = new QueryBuilder($pdo); //create and entry in app for query builder