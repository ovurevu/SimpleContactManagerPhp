<?php require 'layout/header.php' ?>
<main class="text-center w-50 m-auto">
    <?php if(isset($error_msg)): ?>
        <div class="alert alert-danger text-center" role="alert"><?= $error_msg ?></div>
    <?php endif; ?>
    <form action="<?= htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" class="needs-validation" method="post" novalidate>
        <h1 class="h4 mb-3 fw-normal">Update Contact</h1>

        <div class="form-floating mb-3">
            <input type="text" name="first-name" class="form-control" id="first-name" placeholder="First Name" value="<?= $row['first_name']?>" required>
            <label for="first-name">First Name</label>
            <div class="invalid-feedback">
                Please enter a first name.
            </div>
        </div>

        <div class="form-floating mb-3">
            <input type="text" name="last-name" class="form-control" id="last-name" placeholder="Last Name" value="<?= $row['last_name']?>">
            <label for="last-name">Last Name</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" name="phone-number" class="form-control" id="phone-number" placeholder="Phone Number" value="<?= $row['phone_number']?>" required>
            <label for="phone-number">Phone Number</label>
            <div class="invalid-feedback">
                Please enter a phone number.
            </div>
        </div>
        <input type="hidden" name="id" value="<?= $id; ?>"/>
        <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Update Contact</button>
    </form>
</main>
<?php require 'layout/footer.php' ?>