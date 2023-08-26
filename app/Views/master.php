<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->renderSection('title') ?></title>
    <?= $this->include('includes/assets/header_assets') ?>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?= $this->include('includes/header') ?>
        <?= $this->include('includes/aside') ?>

        <div class="content-wrapper">
            <?= $this->include('includes/content') ?>
        </div>
        
        <?= $this->include('includes/footer') ?>  
    </div>
    <?= $this->include('includes/assets/footer_assets') ?>
    <?= $this->renderSection('script') ?>
</body>
</html>