<?= $this->extend('master') ?>
<?= $this->section('title') ?>Permission<?= $this->endSection() ?>
<?= $this->section('content_header') ?><h1>Permission</h1><?= $this->endSection() ?>
<?= $this->section('link') ?>Permission<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <table id="table-permissions" class="table table-striped table-hover va-middle">
        <thead>
            <tr>
                <th>#</th>
                <th>Permission</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
<?= $this->endSection() ?>