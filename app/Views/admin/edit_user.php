<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color:#f1b559ff;">
<div class="container mt-5">
    <h2>Edit User</h2>

    <!-- Display validation errors -->
    <?php if(session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <?= implode('<br>', session()->getFlashdata('errors')) ?>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('admin/update/' . $user['id']) ?>">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="<?= set_value('name', esc($user['name'])) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="<?= set_value('email', esc($user['email'])) ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-select">
                <option value="admin" <?= set_value('role', $user['role']) == 'admin' ? 'selected' : '' ?>>Admin</option>
                <option value="user" <?= set_value('role', $user['role']) == 'user' ? 'selected' : '' ?>>User</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="<?= base_url('admin/users') ?>" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>
