<?= $this->extend('master') ?>
<?= $this->section('title') ?>Products<?= $this->endSection() ?>
<?= $this->section('content_header') ?><h1>Products</h1><?= $this->endSection() ?>
<?= $this->section('link') ?>Products<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <div class="float-left">
                    <h5 class="m-0">Products</h5>
                </div>
                <div class="float-right">
                    <div class="btn-group">
                        <a href="javascript:void(0)" class="btn btn-sm btn-block btn-primary" onclick="add_edit_products()"><i class="fa fa-plus"></i> Add new Product</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="table-product_management" class="table table-striped table-hover va-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Version</th>
                            <th>Category</th>
                            <th>Actions</th>
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
<div class="modal fade" id="product-management-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add / Edit products</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-edit-products" action="<?php echo route_to('products/save') ?>" method="post">
                    <input type="hidden" name="id" value="">
                    <div id="error_div" class="alert-danger"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>product Id</label>
                                <input type="number" class="form-control" name="product_id" placeholder="product Id">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Version</label>
                                <input type="text" class="form-control" name="version" placeholder="Version">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" class="form-control" name="product_name" placeholder="Product Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Category</label>
                                <input type="text" class="form-control" name="category" placeholder="Category">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('close') ?></button>
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
      //var selected_versions;
    var selected_product_names;

    var productsTable = $('#table-product_management').DataTable({
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
            url : '<?php echo base_url('products'); ?>',
            method : 'POST',
            data: function (d) {
                d.products_name = selected_product_names;
            }
        },
        order: [[ 0, 'asc' ]]
    });

    $(document).on('show.bs.modal', '#product-management-modal', function(event) {
        $("#add-edit-products").trigger("reset");
        $("#add-edit-products").find("input[name='id']").val('');
    });

    $(document).on('submit', '#add-edit-products', function(event) {
        event.preventDefault();
        $('.text-danger').remove();
        $('.is-invalid').removeClass('is-invalid');
        var productForm = $('#add-edit-products');

        $.post('<?php echo base_url('products/save') ?>', {
                id        : productForm.find('input[name="id"]').val(),
                product_id   : productForm.find('input[name="product_id"]').val(),
                product_name : productForm.find('input[name="product_name"]').val(),
                version : productForm.find('input[name="version"]').val(),
                category  : productForm.find('input[name="category"]').val()
        }, function(data, textStatus, xhr) {
            if (data.success == false) {
                $.each(xhr.responseJSON.message, (elem, messages) => {
                    $('#add-edit-products').find('input[name="' + elem + '"]').addClass('is-invalid').after('<p class="text-danger">' + messages + '</p>');
                });
            } else {
                Toast.fire({
                    icon: 'success',
                    title: data.message
                });
                productsTable.ajax.reload();
                $("#add-edit-products").trigger("reset");
                $("#product-management-modal").modal('hide');
            }
        });
    });

    // $(document).on('change', 'select[name="product_version"], select[name="products_name"]', function(event) {
    //     //selected_versions = $("#product_version").select2('val');
    //     selected_product_names = $("#products_name").select2('val');
    //     productsTable.ajax.reload();
    // });

    function add_edit_products(product_id) {
        $('#product-management-modal').modal('show');
        if (product_id !== '' && product_id !== undefined) {
            $.post('<?= base_url('products/getProductDataById') ?>/' + product_id).done(function(response) {
                var editproduct = $('#add-edit-products');
                editproduct.find('input[name="id"]').val(response.id);
                editproduct.find('input[name="product_id"]').val(response.product_id);
                editproduct.find('input[name="product_name"]').val(response.product_name);
                editproduct.find('input[name="version"]').val(response.version);
                editproduct.find('input[name="category"]').val(response.category);
            }).fail(function() {
                Toast.fire({
                    icon: 'error',
                    title: 'Something went wrong',
                });
            });
        }
    }

    $(document).on('click', '.btn-delete-product', function(e) {
        Swal.fire({
                title: '<?= lang('product Delete') ?>',
                text: "<?= lang('Product Delete') ?>",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '<?= lang('Are you Sure ? Delete') ?>'
            })
            .then((result) => {
                if (result.value) {
                    var id = $(this).attr('data-id');
                    $.ajax({
                        url: '<?= base_url('products/deleteProductById') ?>/' + id,
                        method: 'DELETE',
                    }).done((data, textStatus, jqXHR) => {
                        Toast.fire({
                            icon: 'success',
                            title: 'product deleted.',
                        });
                        productsTable.ajax.reload();
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