<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="card shadow-sm">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h2 class="h4 mb-0 text-primary">Tasks for Today (<?= date('Y-m-d') ?>)</h2>
        <span class="badge bg-info text-dark"><?= count($tasks) ?> Tasks</span>
    </div>
    <div class="card-body">
        <?php if (empty($tasks)): ?>
            <div class="alert alert-info mb-0">No tasks scheduled for today!</div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Task Title</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tasks as $task): ?>
                            <tr>
                                <td><?= esc($task['id']) ?></td>
                                <td class="fw-medium"><?= esc($task['title']) ?></td>
                                <td>
                                    <span class="badge bg-<?= $task['status'] === 'completed' ? 'success' : 'warning' ?>">
                                        <?= esc(ucfirst($task['status'])) ?>
                                    </span>
                                </td>
                                <td><?= esc($task['task_date']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>