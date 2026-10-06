<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white py-3">
                <h2 class="h5 mb-0">Demo User Profile</h2>
            </div>
            <div class="card-body">
                <?php if ($user): ?>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>User ID:</strong> <?= esc($user['id']) ?></li>
                        <li class="list-group-item"><strong>Username:</strong> <?= esc($user['username']) ?></li>
                        <li class="list-group-item"><strong>Full Name:</strong> <?= esc($user['full_name']) ?></li>
                        <li class="list-group-item"><strong>Email:</strong> <?= esc($user['email']) ?></li>
                        <li class="list-group-item"><strong>Account Created:</strong> <?= esc($user['created_at']) ?></li>
                    </ul>
                <?php else: ?>
                    <p class="text-danger mb-0">No demo user record found in database.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>