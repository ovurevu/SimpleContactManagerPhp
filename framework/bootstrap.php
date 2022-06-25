<?php
session_start();

require 'framework/helpers/helper_functions.php';

$app = []; //Initialize app variable

$app['config'] = require 'config.php';

$pdo = Connection::connect($app['config']['database']); //new PDO connection

$app['database'] = new QueryBuilder($pdo);