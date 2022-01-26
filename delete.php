<?php
session_start();
require_once ('helpers/db_config.php');
require 'models/Contact.php'; //Bring in the model

$pdo = connectDb(); //new PDO connection

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    //Prepare SQL query
    $sql = 'delete from contacts where id = '.$id;

    //Prepare Query
    $statement = $pdo->prepare($sql);

    //Execute Statement
    if($statement->execute()){
        $_SESSION['success'] = 'Contact deleted successfully!';
        //Redirect to index
        header('location:index.php');
        exit();
    } else {
        $_SESSION['error'] = 'Unable to delete the contact. You could try again.';
        //Redirect to index
        header('location:index.php');
        exit();
    }
} else {
    // Check existence of id parameter before processing further
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Get URL parameter
        $id = trim($_GET["id"]);

        //Get the contact
        $contact = Contact::fetchContactById($pdo, $id);
    } else {
        $_SESSION['error'] = 'Something went horribly wrong with the last action!';
        //Redirect to index
        header('location:index.php');
        exit();
    }
}
?>
<?php require 'views/delete.view.php'; //Load the view file ?>

