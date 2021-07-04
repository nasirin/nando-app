<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->include('components/meta') ?>
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?= $this->include('components/menu') ?>

            <!-- top navigation -->
            <?= $this->include('components/navbar') ?>
            <!-- /top navigation -->

            <!-- page content -->
            <?= $this->renderSection('content') ?>
            <!-- /page content -->
        </div>
    </div>
    <?= $this->include('components/modal_laporan') ?>
    <?= $this->include('components/js') ?>

</body>

</html>