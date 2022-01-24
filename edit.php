<?php
session_start();
require_once ('helpers/db_config.php');

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
    //Perform query
    if($result = mysqli_query($link, $sql)) {
        $_SESSION['success'] = 'Contact updated successfully';
        //Redirect to index
        header('location:index.php');
        //Free result set
        mysqli_free_result($result);
        exit();
    } else {
        $error_msg = 'Unable to update this contact!';
    }
    // Close connection
    mysqli_close($link);
} else {
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Get URL parameter
        $id = trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM contacts WHERE id = " . $id;
        if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);
            }
            //Free result set
            mysqli_free_result($result);
        }
        // Close connection
        mysqli_close($link);
    } else {
        $_SESSION['error'] = 'Something went horribly wrong with the last action!';
        //Redirect to index
        header('location:index.php');
        exit();
    }
}
?>
<?php require 'views/edit.view.php'; //Load the view file ?>

