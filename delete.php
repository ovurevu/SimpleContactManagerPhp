<?php
session_start();
require_once ('helpers/db_config.php');

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    //Prepare SQL query
    $sql = 'delete from contacts where id = '.$id;
    //Perform query
    if($result = mysqli_query($link, $sql)) {
        $_SESSION['success'] = 'Contact deleted successfully!';
        //Redirect to index
        header('location:index.php');
        //Free result set
        mysqli_free_result($result);
        exit();
    } else {
        $_SESSION['error'] = 'Unable to delete the contact. You could try again.';
        //Redirect to index
        header('location:index.php');
        exit();
    }
    // Close connection
    mysqli_close($link);
} else {
    // Check existence of id parameter before processing further
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Get URL parameter
        $id = trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM contacts WHERE id = " . $id;
        if ($result = mysqli_query($link, $sql)) {
            if (mysqli_num_rows($result) > 0) {
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
<?php require 'layout/header.php'; ?>
<main class="pt-5 text-center">
    <p class="lead">
        Are you sure that you want to delete <span class="fw-bold"><?php echo $row['first_name']?> <?php echo $row['last_name'] ?: '' ?></span> from you contacts list?
    </p>
    <p>
        <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
            <button type="submit" name="submit" class="btn btn-lg btn-outline-danger">Delete Contact</button>
        </form>
    </p>
</main>
<?php require 'layout/footer.php'; ?>
