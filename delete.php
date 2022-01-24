<?php
session_start();
require_once ('helpers/db_config.php');

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

        // Prepare a select statement
        $sql = "SELECT * FROM contacts WHERE id = " . $id;

        //Prepare Query
        $statement = $pdo->prepare($sql);

        //Execute Statement
        if($statement->execute()){
            //Fetch result
            $contact = $statement->fetch(PDO::FETCH_OBJ);
        }
    } else {
        $_SESSION['error'] = 'Something went horribly wrong with the last action!';
        //Redirect to index
        header('location:index.php');
        exit();
    }
}
?>
<?php require 'views/delete.view.php'; //Load the view file ?>

