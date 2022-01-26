<?php
session_start();
require 'models/Contact.php'; //Bring in the model
require 'helpers/db_config.php';

$pdo = connectDb(); //new PDO connection

//Variable to determine if there are contacts or not
$zeroContacts = true;

$contacts = Contact::fetchAllContacts($pdo); //Fetch all contacts

if($contacts) {
    $zeroContacts = false;
}

?>

<?php require 'views/index.view.php'; //Load the view file ?>

