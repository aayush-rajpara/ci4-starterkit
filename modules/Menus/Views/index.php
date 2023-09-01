<?= $this->extend('master') ?>

<?= $this->section('title') ?>Menu Management<?= $this->endSection() ?>
<?= $this->section('css') ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fontawesome-iconpicker@3.2.0/dist/css/fontawesome-iconpicker.min.css">
    <style>
        .dd{position:relative;display:block;margin:0;padding:0;max-width:600px;list-style:none;font-size:13px;line-height:20px}.dd-list{display:block;position:relative;margin:0;padding:0;list-style:none}.dd-list .dd-list{padding-left:30px}.dd-empty,.dd-item,.dd-placeholder{display:block;position:relative;margin:0;padding:0;min-height:20px;font-size:13px;line-height:20px}.dd-handle{display:block;height:35px;margin:5px 0;padding:5px 10px;color:#333;text-decoration:none;font-weight:700;border:1px solid #ccc;background:#fff;border-radius:3px;box-sizing:border-box}.dd-handle:hover{color:#2ea8e5;background:#fff}.dd-item>button{position:relative;cursor:pointer;float:left;width:25px;height:20px;margin:5px 0;padding:0;text-indent:100%;white-space:nowrap;overflow:hidden;border:0;background:0 0;font-size:12px;line-height:1;text-align:center;font-weight:700}.dd-item>button:before{display:block;position:absolute;width:100%;text-align:center;text-indent:0}.dd-item>button.dd-expand:before{content:'+'}.dd-item>button.dd-collapse:before{content:'-'}.dd-expand{display:none}.dd-collapsed .dd-collapse,.dd-collapsed .dd-list{display:none}.dd-collapsed .dd-expand{display:block}.dd-empty,.dd-placeholder{margin:5px 0;padding:0;min-height:30px;background:#f2fbff;border:1px dashed #b6bcbf;box-sizing:border-box;-moz-box-sizing:border-box}.dd-empty{border:1px dashed #bbb;min-height:100px;background-color:#e5e5e5;background-size:60px 60px;background-position:0 0,30px 30px}.dd-dragel{position:absolute;pointer-events:none;z-index:9999}.dd-dragel>.dd-item .dd-handle{margin-top:0}.dd-dragel .dd-handle{box-shadow:2px 4px 6px 0 rgba(0,0,0,.1)}.dd-nochildren .dd-placeholder{display:none}
    </style>
<?= $this->endSection() ?>
<?= $this->section('content_header') ?><h1>Menu Management</h1><?= $this->endSection() ?>
<?= $this->section('link') ?>Menu Management<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>.fade.in{opacity: 1;}</style>
<div class="row">
    <div class="col-lg-5">
        <div class="card card-primary card-outline">
            <div id="nestable-menu" class="card-header">
                <div class="btn-group">
                    <button class="btn btn-info btn-sm tree-tools" data-action="expand" title="Expand">
                        <i class="fas fa-chevron-down"></i>&nbsp;Expand
                    </button>
                    <button class="btn btn-info btn-sm tree-tools" data-action="collapse" title="Collapse">
                        <i class="fas fa-chevron-up"></i>&nbsp;Collapse
                    </button>
                </div>
                <div class="btn-group">
                    <button class="btn btn-primary btn-sm save" data-action="save" title="Save"><i class="fa fa-save"></i><span class="hidden-xs">&nbsp;Save</span></button>
                </div>
                <div class="btn-group">
                    <button class="btn btn-warning btn-sm refresh" data-action="refresh" title="Refresh"><i class="fas fa-sync-alt"></i><span class="hidden-xs">&nbsp;Refresh</span></button>
                </div>
            </div>
            <div class="card-body">
                <div class="dd" id="menu"></div>
            </div>
        </div><!-- /.card -->
    </div>
    <!-- /.col-md-6 -->
    <div class="col-lg-7">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <div class="float-left">
                    <h5>Add Menu</h5>
                </div>
            </div>
            <div class="card-body">
                <form action="<?= route_to('admin/menu') ?>" method="post" class="form-horizontal">
                    <?= csrf_field() ?>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Parent</label>
                        <div class="col-sm-10">
                            <select class="form-control parent select2bs4" name="parent_id" style="width: 100%;">
                                <option selcted value="0">ROOT</option>
                                <?php foreach ($menus as $menu) { ?>
                                    <option <?= ($menu["id"] == old('parent_id')) ? 'selected' : '' ?> value="<?= $menu["id"] ?>"><?= $menu["title"] ?></option>
                                <?php } ?>
                            </select>
                            <span class="help-block">
                                <i class="fas fa-exclamation-triangle text-danger"></i>&nbsp;Please note! the menu only support with max depth 2.
                            </span>
                            <?php if (session('error.parent_id')) { ?>
                                <div class="invalid-feedback">
                                    <h6><?= session('error.parent_id') ?></h6>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Active</label>
                        <div class="col-sm-10">
                            <select class="form-control parent" name="active" style="width: 100%;">
                                <option selected value="1">Active</option>
                                <option value="0">Non Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Icon</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fab fa-font-awesome-flag"></i></span>
                                </div>
                                <input type="text" name="icon" class="icon-picker form-control <?= session('error.icon') ? 'is-invalid' : '' ?>" value="<?= old('icon') ?>" placeholder="Icon from fontawesome" autocomplete="off">
                                <?php if (session('error.icon')) { ?>
                                <div class="invalid-feedback">
                                    <h6><?= session('error.icon') ?></h6>
                                </div>
                                <?php } ?>
                            </div>
                            <span class="help-block">
                                <i class="fa fa-info-circle text-info"></i>&nbsp;For more icons, please see <a href="http://fontawesome.io/icons" target="_blank">http://fontawesome.io/icons</a>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="title" class="form-control <?= session('error.title') ? 'is-invalid' : '' ?>" value="<?= old('title') ?>" placeholder="Name for menu." autocomplete="off">
                                <?php if (session('error.title')) { ?>
                                <div class="invalid-feedback">
                                    <h6><?= session('error.title') ?></h6>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Route</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-link"></i></span>
                                </div>
                                <input type="text" name="route" class="form-control <?= session('error.route') ? 'is-invalid' : '' ?>" value="<?= old('route') ?>" placeholder="Route for link menu." autocomplete="off">
                                <?php if (session('error.route')) { ?>
                                <div class="invalid-feedback">
                                    <h6><?= session('error.route') ?></h6>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="float-right btn btn-sm btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.col-md-6 -->
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
    <script src="https://cdn.jsdelivr.net/npm/fontawesome-iconpicker@3.2.0/dist/js/fontawesome-iconpicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/nestable2@1.6.0/dist/jquery.nestable.min.js"></script>
    <script>
        $('.icon-picker').iconpicker({
            placement: 'bottomRight',
            hideOnSelect: true,
            inputSearch: true,
        });
        $('.parent').select2();

        menu();

        function menu() {
            $.get("<?= base_url('menus') ?>", function(response) {
                $('.dd').nestable({
                    maxDepth: 2,
                    json: response.data,
                    contentCallback: (item) => {
                        return `<i class="${item.icon}"></i>&nbsp;<strong>${item.title}</strong>&nbsp;&nbsp;&nbsp;<a href="<?= base_url() ?>/${item.route}" class="dd-nodrag">${item.route}</a>
                                <span class="float-right dd-nodrag">
                                    <button data-id="${item.id}" id="btn-edit" class="btn btn-primary btn-xs"><span class="fa fa-fw fa-pencil-alt"></span></button>
                                    <button data-id="${item.id}" id="btn-delete" class="btn btn-danger btn-xs"><span class="fa fa-fw fa-trash"></span></button>
                                </span>`;
                    }
                });
            });
        }

        $('.tree-tools').on('click', function(e) {
            var action = $(this).data('action');
            if (action === 'expand') {
                $('.dd').nestable('expandAll');
            }
            if (action === 'collapse') {
                $('.dd').nestable('collapseAll');
            }
        });

        $('.save').on('click', function (e) {
            e.preventDefault();
            var serialize = $('#menu').nestable('toArray');
            var btnSave = $(this);
            $(this).attr('disabled', true);
            $(this).html('<i class="fas fa-spinner fa-spin"></i>');

            $.ajax({
                url: `<?= route_to('menu-update') ?>`,
                method: 'PUT',
                dataType: 'JSON',
                data: JSON.stringify(serialize)
            }).done((data, textStatus, jqXHR) => {
                Toast.fire({
                    icon: 'success',
                    title: jqXHR.statusText
                });
                btnSave.attr('disabled', false);
                btnSave.html('<i class="fa fa-save"></i> ' + "<?= lang('boilerplate.global.save') ?>");
                $('.dd').nestable('destroy');
                menu();
            }).fail((error) => {
                Toast.fire({
                    icon: 'error',
                    title: error.responseJSON.messages.error,
                });
                btnSave.attr('disabled', false);
                btnSave.html('<i class="fa fa-save"></i> ' + "<?= lang('boilerplate.global.save') ?>");
            })
        });

        $('.refresh').on('click', function (e) {
            location.reload(true);
        });

        $(document).on('click', '#btn-delete', function(e) {
            $.ajax({
                url: `<?= base_url('menus/delete') ?>/${$(this).attr('data-id')}`,
                method: 'post',
            }).done((data, textStatus, jqXHR) => {
                $('.dd').nestable('destroy');
                menu();
            })
        })
    </script>
<?= $this->endSection() ?>
            