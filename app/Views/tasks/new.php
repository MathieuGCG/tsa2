<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3 class="h5 mb-0">Create New Task</h3>
            </div>
            <div class="card-body">
                <?php $validation = session()->getFlashdata('validation'); ?>

                <form action="<?= base_url('tasks/create') ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label class="form-label">Task Title</label>
                        <input type="text" name="title" class="form-control <?= isset($validation) && $validation->hasError('title') ? 'is-invalid' : '' ?>" value="<?= old('title') ?>">
                        <?php if (isset($validation) && $validation->hasError('title')): ?>
                            <div class="invalid-feedback"><?= $validation->getError('title') ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Scheduled Date</label>
                        <input type="date" name="task_date" class="form-control <?= isset($validation) && $validation->hasError('task_date') ? 'is-invalid' : '' ?>" value="<?= old('task_date', date('Y-m-d')) ?>">
                        <?php if (isset($validation) && $validation->hasError('task_date')): ?>
                            <div class="invalid-feedback"><?= $validation->getError('task_date') ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="pending" <?= old('status') === 'pending' ? 'selected' : '' ?>>Pending</option>
                            <option value="completed" <?= old('status') === 'completed' ? 'selected' : '' ?>>Completed</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Save Task</button>
                    <a href="<?= base_url('tasks') ?>" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>