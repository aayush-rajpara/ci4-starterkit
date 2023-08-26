<?= $this->extend('master') ?>
<?= $this->section('title') ?>Permission<?= $this->endSection() ?>
<?= $this->section('content_header') ?><h1>Permission</h1><?= $this->endSection() ?>
<?= $this->section('link') ?>Permission<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row">
	<a href="javascript:void(0)" class="btn btn-primary btn-sm" onclick="add_edit_permission()">+ Add Permission</a>
</div>
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
    <!-- Add/Edit Modal -->
<div class="modal fade" id="permission-management-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add / Edit Permission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-edit-permission" action="<?php echo route_to('permissions/save') ?>" method="post">
                    <input type="hidden" name="id">
                    <div id="error_div" class="alert-danger"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Permission Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Name of Permission">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control" name="description" placeholder="Description of Permission">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">close</button>
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
	function add_edit_permission() {
        $('#permission-management-modal').modal('show');
    }
</script>
<?= $this->endSection() ?>