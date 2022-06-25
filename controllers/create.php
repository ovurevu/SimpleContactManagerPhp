<?php
// Define variables and initialize with empty values
$first_name = $last_name = $phone_number = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
    $first_name = trim($_POST['first-name']);
    $last_name = trim($_POST['last-name']);
    $phone_number = trim($_POST['phone-number']);

    $create = App::get('database')->insert('contacts', [
        'first_name' => $first_name,
        'last_name' => $last_name,
        'phone_number' => $phone_number
    ]);

    //Create contact
    if($create){
        redirectToIndex('success', 'Contact saved successfully');
    } else {
        $error_msg = 'Unable to save this contact!';
    }
}
?>
<?php require 'views/create.view.php'; //Load the view file ?>