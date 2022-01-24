<?php require 'layout/header.php'; ?>
    <main class="pt-5 text-center">
        <p class="lead">
            Are you sure that you want to delete <span class="fw-bold"><?= $row['first_name']?> <?= $row['last_name'] ?: '' ?></span> from you contacts list?
        </p>
        <p>
        <form action="<?= htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
            <input type="hidden" name="id" value="<?= $id; ?>"/>
            <button type="submit" name="submit" class="btn btn-lg btn-outline-danger">Delete Contact</button>
        </form>
        </p>
    </main>
<?php require 'layout/footer.php'; ?>