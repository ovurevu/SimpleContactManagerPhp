<?php require 'layout/header.php' ?>
<main class="text-center w-50 m-auto">
    <?php if(isset($error_msg)): ?>
        <div class="alert alert-danger text-center" role="alert"><?= $error_msg ?></div>
    <?php endif; ?>
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="needs-validation" method="post" novalidate>
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
