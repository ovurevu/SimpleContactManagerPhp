<?php
$queryBuilder = require 'bootstrap.php';

// Define variables and initialize with empty values
$first_name = $last_name = $phone_number = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    $first_name = trim($_POST['first-name']);
    $last_name = trim($_POST['last-name']);
    $phone_number = trim($_POST['phone-number']);

    $update = $queryBuilder->update('contacts', 'id', $id, [
        'first_name' => $first_name,
        'last_name' => $last_name,
        'phone_number' => $phone_number
    ]);

    //Edit contact
    if($update){
        redirectToIndex('success', 'Contact updated successfully');
    } else {
        $error_msg = 'Unable to update this contact!';
    }
} else {
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Get URL parameter
        $id = trim($_GET["id"]);
        $contact = $queryBuilder->selectById('contacts', 'id', $id);
    } else {
        redirectToIndex('error', 'Something went horribly wrong with the last action!');
    }
}
?>
<?php require 'views/edit.view.php'; //Load the view file ?>

