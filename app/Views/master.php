<?= $this->include('partials/header') ?>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <?= $this->include('partials/sidebar') ?>
        <!-- Layout container -->
        <div class="layout-page">
            <?= $this->include('partials/navbar') ?>
            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    <?= $this->renderSection('content') ?>
                </div>
                <!-- Content -->
                <?= $this->include('partials/footer') ?>
                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
<?= $this->include('partials/assets/footer_assets') ?>