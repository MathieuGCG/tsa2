<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white py-3">
                <h2 class="h5 mb-0">About the Developer</h2>
            </div>
            <div class="card-body">
                <h4 class="card-title text-primary"><?= esc($developer['name']) ?></h4>
                <p class="card-text text-muted"><?= esc($developer['course']) ?></p>
                <hr>
                <p>This web application was constructed for Technical Summative Assessment 1 (TSA1). It demonstrates the implementation of Model-View-Controller (MVC) architecture using CodeIgniter 4, dynamic query filtering, and shared view layouts.</p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>