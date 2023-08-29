<?= $this->extend('master') ?>
<?= $this->section('title') ?>Permission<?= $this->endSection() ?>
<?= $this->section('content_header') ?><h1>Permission</h1><?= $this->endSection() ?>
<?= $this->section('link') ?>Permission<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <div class="float-left">
                    <h5 class="m-0">Permission</h5>
                </div>
                <div class="float-right">
                    <div class="btn-group">
                        <a href="javascript:void(0)" class="btn btn-sm btn-block btn-primary" onclick="add_edit_permission()"><i class="fa fa-plus"></i> Add new Permission</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
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
            </div>
        </div>
    </div>
</div>
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
	 var permissionTable = $('#table-permissions').DataTable({
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
            url : '<?php echo site_url('permissions'); ?>',
            method : 'POST',
        },
        order: [[ 0, 'asc' ]]
    });
	function add_edit_permission(permission_id) {
        $('#permission-management-modal').modal('show');
        if (permission_id !== '' && permission_id !== undefined) {
            $.post('<?= base_url('permissions/getPermission') ?>/' + permission_id).done(function(response) {
                var editPermission = $('#add-edit-permission');
                editPermission.find('input[name="id"]').val(response.id);
                editPermission.find('input[name="name"]').val(response.name);
                editPermission.find('input[name="description"]').val(response.description);
            }).fail(function() {
                Toast.fire({
                    icon: 'error',
                    title: 'Something went wrong',
                });
            });
        }
    }

    $(document).on('click', '.btn-delete-permission', function(e) {
        Swal.fire({
                title: '<?= lang('permission delete') ?>',
                text: "<?= lang('permissison delete') ?>",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '<?= lang('Are you sure ? Delete') ?>'
            })
            .then((result) => {
                if (result.value) {
                    var id = $(this).attr('data-id');
                    $.ajax({
                        url: '<?= base_url('permissions/delete/') ?>/' + id,
                        method: 'DELETE',
                    }).done((data, textStatus, jqXHR) => {
                        Toast.fire({
                            icon: 'success',
                            title: 'Permission deleted.',
                        });
                        permissionTable.ajax.reload();
                    }).fail((jqXHR, textStatus, errorThrown) => {
                        Toast.fire({
                            icon: 'error',
                            title: 'Something went wrong',
                        });
                    })
                }
            })
    });
</script>
<?= $this->endSection() ?>