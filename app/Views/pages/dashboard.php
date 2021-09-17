<?= $this->extend('layouts/home') ?>

<?= $this->section('content') ?>
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row">
        <?= $this->include('components/alert') ?>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Well done!</h4>
            <p>Selamat Datang Di Dpavillon.</p>
        </div>
    </div>

    <?= $this->include('components/modal_kebutuhan') ?>
</div>
<?= $this->endSection() ?>