<?php if (session('success')) : ?>
    <div class="alert alert-info" role="alert">
        <strong>Success</strong> <?= session('success') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php elseif (session('error')) : ?>
    <div class="alert alert-danger" role="alert">
        <strong>Error</strong> <?= session('error') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>