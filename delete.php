<?php
session_start();
require 'helpers/db_config.php';
require 'helpers/helper_functions.php';
require 'models/Contact.php'; //Bring in the model

$pdo = connectDb(); //new PDO connection

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    //Delete Contact
    if(Contact::deleteContact($pdo, $id)){
        redirectToIndex('success', 'Contact deleted successfully!');
    } else {
        redirectToIndex('error', 'Unable to delete the contact. You could try again.');
    }
} else {
    // Check existence of id parameter before processing further
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Get URL parameter
        $id = trim($_GET["id"]);

        //Get the contact
        $contact = Contact::fetchContactById($pdo, $id);
    } else {
        redirectToIndex('error', 'Something went horribly wrong with the last action!');
    }
}
?>
<?php require 'views/delete.view.php'; //Load the view file ?>

