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
<?php require 'layout/header.php' ?>
<main class="text-center w-50 m-auto">
    <?php
    if(isset($error_msg)) {
        echo '<div class="alert alert-danger text-center" role="alert">'.$error_msg.'</div>';
    }
    ?>
    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" class="needs-validation" method="post" novalidate>
        <h1 class="h4 mb-3 fw-normal">Update Contact</h1>

        <div class="form-floating mb-3">
            <input type="text" name="first-name" class="form-control" id="first-name" placeholder="First Name" value="<?php echo $row['first_name']?>" required>
            <label for="first-name">First Name</label>
            <div class="invalid-feedback">
                Please enter a first name.
            </div>
        </div>

        <div class="form-floating mb-3">
            <input type="text" name="last-name" class="form-control" id="last-name" placeholder="Last Name" value="<?php echo $row['last_name']?>">
            <label for="last-name">Last Name</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" name="phone-number" class="form-control" id="phone-number" placeholder="Phone Number" value="<?php echo $row['phone_number']?>" required>
            <label for="phone-number">Phone Number</label>
            <div class="invalid-feedback">
                Please enter a phone number.
            </div>
        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
        <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Update Contact</button>
    </form>
</main>
<?php require 'layout/footer.php' ?>

