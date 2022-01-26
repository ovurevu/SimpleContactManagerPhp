<?php
session_start();
require 'helpers/db_config.php';
require 'models/Contact.php'; //Bring in the model

$pdo = connectDb(); //new PDO connection

// Define variables and initialize with empty values
$first_name = $last_name = $phone_number = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    $first_name = trim($_POST['first-name']);
    $last_name = trim($_POST['last-name']);
    $phone_number = trim($_POST['phone-number']);

    //Prepare SQL query
    $sql = "update contacts set first_name = '".$first_name."', last_name='".$last_name."', phone_number='".$phone_number."' where id = ".$id;

    //Prepare Query
    $statement = $pdo->prepare($sql);

    //Execute Query
    if($statement->execute()){
        $_SESSION['success'] = 'Contact updated successfully';
        //Redirect to index
        header('location:index.php');
        exit();
    } else {
        $error_msg = 'Unable to update this contact!';
    }
} else {
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Get URL parameter
        $id = trim($_GET["id"]);
        $contact = Contact::fetchContactById($pdo, $id);
    } else {
        $_SESSION['error'] = 'Something went horribly wrong with the last action!';
        //Redirect to index
        header('location:index.php');
        exit();
    }
}
?>
<?php require 'views/edit.view.php'; //Load the view file ?>

