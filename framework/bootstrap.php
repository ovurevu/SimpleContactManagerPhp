<?php
session_start();
require 'models/Contact.php'; //Bring in the model
require 'framework/helpers/helper_functions.php';
require 'framework/database/Connection.php';
require 'framework/database/QueryBuilder.php';
require 'framework/Router.php';
$config = require 'config.php';

$pdo = Connection::connect($config['database']); //new PDO connection

return new QueryBuilder($pdo);