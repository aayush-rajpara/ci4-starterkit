<?= $this->extend('master') ?>

<?= $this->section('title') ?>Menu Management<?= $this->endSection() ?>
<?= $this->section('css') ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fontawesome-iconpicker@3.2.0/dist/css/fontawesome-iconpicker.min.css">
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
    <script>
        $('.icon-picker').iconpicker({
            placement: 'bottomRight',
            hideOnSelect: true,
            inputSearch: true,
        });
        $('.parent').select2();
    </script>
<?= $this->endSection() ?>
            