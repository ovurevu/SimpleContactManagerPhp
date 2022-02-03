<?php
session_start();
require 'framework/database/Connection.php';
require 'framework/helpers/helper_functions.php';
require 'models/Contact.php';

$config = require 'config.php';

$pdo = Connection::connect($config['database']); //new PDO connection

// Define variables and initialize with empty values
$first_name = $last_name = $phone_number = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
    $first_name = trim($_POST['first-name']);
    $last_name = trim($_POST['last-name']);
    $phone_number = trim($_POST['phone-number']);

    //Prepare SQL query using  a prepared statement
    $sql = "insert into contacts (first_name, last_name, phone_number) values (:first_name, :last_name, :phone_number)";

    //Prepare Query
    $statement = $pdo->prepare($sql);

    //Execute prepared statement. This operation makes sql injection impossible
    $created = $statement->execute([
        ':first_name' => $first_name,
        ':last_name' => $last_name,
        ':phone_number' => $phone_number
    ]);

    //Create contact
    if($created){
        redirectToIndex('success', 'Contact saved successfully');
    } else {
        $error_msg = 'Unable to save this contact!';
    }
}
?>
<?php require 'views/create.view.php'; //Load the view file ?>