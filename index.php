<?php
$queryBuilder = require 'bootstrap.php';

$zeroContacts = true; //Variable to determine if there are contacts or not

$contacts = $queryBuilder->selectAll('contacts'); //get all contacts

if($contacts) {
    $zeroContacts = false;
}

?>

<?php require 'views/index.view.php'; //Load the view file ?>

