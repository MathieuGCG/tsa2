<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?> | Tasks System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?= base_url('/') ?>">Tasks Manager</a>
            <div class="navbar-nav me-auto">
                <a class="nav-link" href="<?= base_url('/') ?>">Today's Tasks</a>
                <a class="nav-link" href="<?= base_url('tasks') ?>">All Tasks</a>
                <a class="nav-link" href="<?= base_url('profile') ?>">Profile</a>
                <a class="nav-link" href="<?= base_url('about') ?>">About</a>
            </div>
            <div class="navbar-nav ms-auto">
                <?php if (session()->get('isLoggedIn')): ?>
                    <span class="navbar-text text-white me-3">Welcome, <?= esc(session()->get('full_name')) ?></span>
                    <a class="btn btn-outline-light btn-sm" href="<?= base_url('logout') ?>">Logout</a>
                <?php else: ?>
                    <a class="btn btn-light btn-sm text-primary fw-bold" href="<?= base_url('login') ?>">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <div class="container">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show"><?= session()->getFlashdata('success') ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show"><?= session()->getFlashdata('error') ?><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
        <?php endif; ?>

        <?= $this->renderSection('content') ?>
    </div>

    <footer class="text-center py-4 text-muted mt-5 border-top">
        <small>IT0049 Technical Summative Assessment 2 &copy; <?= date('Y') ?></small>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>