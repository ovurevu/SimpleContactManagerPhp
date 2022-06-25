<?php

$zeroContacts = true; //Variable to determine if there are contacts or not

$contacts = App::get('database')->selectAll('contacts'); //get all contacts

if($contacts) {
    $zeroContacts = false;
}

?>

<?php require 'views/index.view.php'; //Load the view file ?>