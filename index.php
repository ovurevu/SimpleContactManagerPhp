<?php
session_start();
require 'models/Contact.php'; //Bring in the model
require 'helpers/db_config.php';

// Write SQL query
$sql = "SELECT * FROM contacts";

//Variable to determine if there are contacts or not
$zeroContacts = true;
//Variable to determine if the connection was successful
$dataLink = false;

//Prepare Query
$statement = $pdo->prepare($sql);

//Execute Statement
if($statement->execute()){
    $dataLink = true;

    /*Fetch result into the class. Before we were fetching as a generic object.
      The advantage of this is that we can create methods in the class and use in this script. */
    $contacts = $statement->fetchAll(PDO::FETCH_CLASS, 'Contact');

    if($contacts) {
        $zeroContacts = false;
    }
}
?>

<?php require 'views/index.view.php'; //Load the view file ?>

