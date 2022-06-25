<?php
session_start();

require 'framework/helpers/helper_functions.php';

App::bind('config', require 'config.php');

$pdo = Connection::connect(App::get('config')['database']); //new PDO connection

App::bind('database', new QueryBuilder($pdo));