<?php
session_start();

use App\Framework\App;
use App\Framework\Database\{Connection, QueryBuilder};
//use App\Framework\Database\QueryBuilder;

require 'framework/helpers/helper_functions.php';

App::bind('config', require 'config.php');

$pdo = Connection::connect(\App\Framework\App::get('config')['database']); //new PDO connection

App::bind('database', new QueryBuilder($pdo));