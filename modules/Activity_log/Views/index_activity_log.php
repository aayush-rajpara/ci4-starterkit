<?= $this->extend('master') ?>
<?= $this->section('title') ?>Activity Log<?= $this->endSection() ?>
<?= $this->section('content_header') ?><h1>Activity Log</h1><?= $this->endSection() ?>
<?= $this->section('link') ?>Activity Log<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <div class="float-left">
                    <h5 class="m-0">Activity Logs</h5>
                </div>
                <div class="float-right">

                </div>
            </div>
            <div class="card-body">
                <table id="table-activity_log" class="table table-striped table-hover va-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Action By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>

    var itemsTable = $('#table-activity_log').DataTable({
        dom: '<"row"<"col-md-3"l><"col-md-6"B><"col-md-3"f>><"row"<"col-md-12 mb-2"t>><"row mb-3"<"col"i><"col"p>>',
        buttons: [
            'colvis',
            'excel',
            'csv',
            'copy',
            'pdf',
            'print'
        ],
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url : '<?php echo site_url('activity_log'); ?>',
            method : 'POST',
        },
        order: [[ 0, 'asc' ]]
    });
</script>
<?= $this->endsection() ?>