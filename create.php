<?php
session_start();
require_once ('helpers/db_config.php');

// Define variables and initialize with empty values
$first_name = $last_name = $phone_number = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
    $first_name = trim($_POST['first-name']);
    $last_name = trim($_POST['last-name']);
    $phone_number = trim($_POST['phone-number']);

    //Prepare SQL query
    $sql = "insert into contacts (first_name, last_name, phone_number) values ('$first_name','$last_name','$phone_number')";

    //Perform query
    if($result = mysqli_query($link, $sql)) {
        $_SESSION['success'] = 'Contact saved successfully';
        //Redirect to index
        header('location:index.php');
        //Free result set
        mysqli_free_result($result);
        mysqli_close($link); //Close db connection
        exit();
    } else {
        $error_msg = 'Unable to save this contact!';
    }
}
?>
<?php require 'views/create.view.php'; //Load the view file ?>