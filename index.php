<?php
session_start();
//include config file
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

    //Fetch result as objects, can also be fetched as array or loaded into a class
    $contacts = $statement->fetchAll(PDO::FETCH_OBJ);

    if($contacts) {
        $zeroContacts = false;
    }
}
?>

<?php require 'views/index.view.php'; //Load the view file ?>

