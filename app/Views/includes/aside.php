<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="../../index3.html" class="brand-link">
        <img src="<?= base_url('assets/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/img/user8-128x128.jpg') ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-3">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview"
                role="menu" data-accordion="false">
                <?php foreach (nestable() as $parent) { ?>
                <li class="nav-item has-treeview <?= current_url() == base_url($parent->route) ? 'menu-open' : '' ?>">
                    <a href="<?= base_url($parent->route) ?>" class="nav-link <?= current_url() == base_url($parent->route) ? 'active' : '' ?>">
                        <i class="nav-icon <?= $parent->icon ?>"></i>
                        <p>
                            <?= $parent->title ?>
                            <?php if (!empty($parent->children)): ?>
                                <?php if (count($parent->children)) { ?>
                                    <i class="right fas fa-angle-left"></i>
                                <?php } ?>
                            <?php endif ?>
                        </p>
                    </a>
                    <?php if (!empty($parent->children)): ?>
                        <?php if (count($parent->children)) { ?>
                        <ul class="nav nav-treeview">
                            <?php foreach ($parent->children as $child) { ?>
                            <li class="nav-item has-treeview">
                                <a href="<?= base_url($child->route) ?>"
                                    class="nav-link <?= current_url() == base_url($child->route) ? 'active' : '' ?>">
                                    <i class="nav-icon <?= $child->icon ?>"></i>
                                    <p><?= $child->title ?></p>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                        <?php } ?>
                    <?php endif ?>
                </li>
                <?php } ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>
