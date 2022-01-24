<?php require 'layout/header.php' ?>
<?php if ($dataLink): //If there is a connection ?>
    <?php if (!$zeroContacts): //If the contacts are more than zero?>
        <main>
            <div class="d-flex pb-3">
                <a href="create.php" class="btn btn-primary px-4 ms-auto">Create New</a>
            </div>

            <?php if(isset($_SESSION['success'])): ?>
                <div class="alert alert-success text-center" role="alert"><?= $_SESSION['success'] ?></div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>

            <?php if(isset($_SESSION['error'])): ?>
                <div class="alert alert-danger text-center" role="alert"><?= $_SESSION['error'] ?></div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>
            <?php while ($row = mysqli_fetch_array($result)): ?>
                <div class="card mb-2">
                    <div class="card-body row">
                        <div class="col-10">
                            <h5 class="card-title"><?= $row['first_name'] ?> <?= $row['last_name'] ?></h5>
                            <p class="card-text"><?= $row['phone_number'] ?></p>
                        </div>
                        <div class="col-2">
                            <div class="dropdown float-end">
                                <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuContact1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li>
                                        <a class="dropdown-item" href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="delete.php?id=<?= $row['id'] ?>">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </main>
    <?php else: //If there are zero contacts?>
        <main class="pt-5 text-center">
            <p class="lead">
                Oops! You don't have any contacts yet. Create one to get started.
            </p>
            <p>
                <a href="create.php" class="btn btn-lg btn-outline-primary">Create New Contact</a>
            </p>
        </main>
    <?php endif; ?>
    <?php mysqli_free_result($result); //free result set ?>
<?php else: //If there was a bad db connection?>
    <main class="pt-5 text-center">
        <p class="lead">
            Oops! Something went wrong and the records could not be retrieved. Try again later.
        </p>
    </main>
<?php endif; ?>
<?php require 'layout/footer.php' ?>