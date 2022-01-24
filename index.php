<?php
session_start();
//include config file
require_once ('helpers/db_config.php');

// Attempt select query execution
$sql = "SELECT * FROM contacts";

//Variable to determine if there are contacts or not
$zeroContacts = true;
//Variable to determine if the connection was successful
$dataLink = false;

if($result = mysqli_query($link, $sql)){
    $dataLink = true;
    if(mysqli_num_rows($result) > 0) {
        $zeroContacts = false;
    }
    mysqli_close($link); //Close db connection
}
?>
<?php require 'views/index.view.php'; //Load the view file ?>

