<?php session_start(); ?>
<?php require 'layout/header.php' ?>
<?php
//include config file
require_once ('helpers/db_config.php');

// Attempt select query execution
$sql = "SELECT * FROM contacts";

if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0) {
        echo '<main>';
        echo '<div class="d-flex pb-3">';
        echo '<a href="create.php" class="btn btn-primary px-4 ms-auto">Create New</a>';
        echo '</div>';

        if(isset($_SESSION['success'])) {
            echo '<div class="alert alert-success text-center" role="alert">'.$_SESSION['success'].'</div>';
            unset($_SESSION['success']);
        }

        if(isset($_SESSION['error'])) {
            echo '<div class="alert alert-danger text-center" role="alert">'.$_SESSION['error'].'</div>';
            unset($_SESSION['error']);
        }
            while ($row = mysqli_fetch_array($result)) {
                echo '<div class="card mb-2">';
                echo '<div class="card-body row">';
                echo '<div class="col-10">';
                echo '<h5 class="card-title">' . $row['first_name'] . ' ' . $row['last_name'] . '</h5>';
                echo '<p class="card-text">' . $row['phone_number'] . '</p>';
                echo '</div>';
                echo '<div class="col-2">';
                echo '<div class="dropdown float-end">';
                echo '<a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuContact1" data-bs-toggle="dropdown" aria-expanded="false">';
                echo 'Actions';
                echo '</a>';
                echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">';
                echo '<li>';
                echo '<a class="dropdown-item" href="edit.php?id='.$row['id'].'">Edit</a>';
                echo '</li>';
                echo '<li><a class="dropdown-item" href="delete.php?id='.$row['id'].'">Delete</a></li>';
                echo '</ul>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';

            }
        echo '</main>';
        }else{
            echo '<main class="pt-5 text-center">';
            echo '<p class="lead">';
            echo "Oops! You don't have any contacts yet. Create one to get started.";
            echo '</p>';
            echo '<p>';
            echo '<a href="create.php" class="btn btn-lg btn-outline-primary">Create New Contact</a>';
            echo '</p>';
            echo '</main>';
        }
    // Free result set
    mysqli_free_result($result);
    } else{
        echo '<main class="pt-5 text-center">';
        echo '<p class="lead">';
        echo "Oops! Something went wrong and the records could not be retrieved. Try again later.";
        echo '</p>';
        echo '</main>';
    }


// Close connection
mysqli_close($link);
?>
<?php require 'layout/footer.php' ?>

