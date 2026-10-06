<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="card shadow-sm">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h2 class="h4 mb-0 text-dark">Full Task Listing</h2>
        <div>
            <?php if (session()->get('isLoggedIn')): ?>
                <a href="<?= base_url('tasks/new') ?>" class="btn btn-primary btn-sm me-2">+ Add Task</a>
            <?php endif; ?>
            <span class="badge bg-secondary"><?= count($tasks) ?> Total Records</span>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Task Title</th>
                        <th>Scheduled Date</th>
                        <th>Status</th>
                        <?php if (session()->get('isLoggedIn')): ?>
                            <th class="text-center">Actions</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tasks as $task): ?>
                        <tr>
                            <td><?= esc($task['id']) ?></td>
                            <td><?= esc($task['title']) ?></td>
                            <td><?= esc($task['task_date']) ?></td>
                            <td>
                                <span class="badge bg-<?= $task['status'] === 'completed' ? 'success' : 'warning' ?>">
                                    <?= esc(ucfirst($task['status'])) ?>
                                </span>
                            </td>
                            <?php if (session()->get('isLoggedIn')): ?>
                                <td class="text-center">
                                    <a href="<?= base_url('tasks/edit/' . $task['id']) ?>" class="btn btn-sm btn-outline-warning me-1">Edit</a>
                                    <a href="<?= base_url('tasks/delete/' . $task['id']) ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Archive this task?')">Delete</a>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>