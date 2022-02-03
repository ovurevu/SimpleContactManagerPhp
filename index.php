<?php
session_start();
require 'models/Contact.php'; //Bring in the model
require 'framework/database/Connection.php';
require 'framework/database/QueryBuilder.php';

$pdo = Connection::connect(); //new PDO connection

$queryBuilder = new QueryBuilder($pdo);

$zeroContacts = true; //Variable to determine if there are contacts or not

$contacts = $queryBuilder->selectAll('contacts'); //get all contacts

if($contacts) {
    $zeroContacts = false;
}

?>

<?php require 'views/index.view.php'; //Load the view file ?>

