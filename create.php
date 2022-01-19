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
        exit();
    } else {
        $error_msg = 'Unable to save this contact!';
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
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="needs-validation" method="post" novalidate>
        <h1 class="h4 mb-3 fw-normal">Create New Contact</h1>

        <div class="form-floating mb-3">
            <input type="text" name="first-name" class="form-control" id="first-name" placeholder="name@example.com" required>
            <label for="first-name">First Name</label>
            <div class="invalid-feedback">
                Please enter a first name.
            </div>
        </div>

        <div class="form-floating mb-3">
            <input type="text" name="last-name" class="form-control" id="last-name" placeholder="name@example.com">
            <label for="last-name">Last Name</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" name="phone-number" class="form-control" id="phone-number" placeholder="name@example.com" required>
            <label for="phone-number">Phone Number</label>
            <div class="invalid-feedback">
                Please enter a phone number.
            </div>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Save Contact</button>
    </form>
</main>
<?php require 'layout/footer.php' ?>

