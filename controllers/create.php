<?php
session_start();
require '../database/Connection.php';
require '../helpers/helper_functions.php';
require '../models/Contact.php';

$pdo = Connection::connect(); //new PDO connection

// Define variables and initialize with empty values
$first_name = $last_name = $phone_number = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
    $first_name = trim($_POST['first-name']);
    $last_name = trim($_POST['last-name']);
    $phone_number = trim($_POST['phone-number']);

    //Instantiate object
    $contact = new Contact($first_name, $last_name, $phone_number);

    //Create contact
    if($contact->createContact($pdo)){
        redirectToIndex('success', 'Contact saved successfully');
    } else {
        $error_msg = 'Unable to save this contact!';
    }
}
?>
<?php require '../views/create.view.php'; //Load the view file ?>