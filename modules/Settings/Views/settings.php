<?= $this->extend('master'); ?>
<?= $this->section('content'); ?>
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Settings /</span> <span id="title">General</span> </h4>
<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item" id="general_settings">
                <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i>General</a>
            </li>
            <li class="nav-item" id="email_settings">
                <a class="nav-link" href="javascript:void(0);"><i class='bx bx-envelope me-1'></i>Email</a>
            </li>
            <li class="nav-item" id="database_settings">
                <a class="nav-link" href="javascript:void(0);"><i class='bx bx-data me-1'></i>Database</a>
            </li>
            <li class="nav-item" id="add_user">
                <a class="nav-link" href="javascript:void(0);"><i class="bx bx-user me-1"></i>Add User</a>
            </li>
        </ul>
        <div class="card mb-4">
            <!-- Account -->
            <div class="col-xl">  
                <div class="card-body">
                    <form action="#" method="post" id="form" enctype="multipart/form-data">
                        <div id="display">

                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
            <!-- /Account -->
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script') ?>
<script type="text/javascript">
    $(function() {
        $(document).on('click', '.nav-item a', function(event) {
            event.preventDefault();
            $('.nav-item a').removeClass('active');
            $(this).addClass('active');
        });

        // Default settings view
        data = {title : 'General Settings', settings_view_name : 'general_settings', csrf : $('meta[name="csrf-token"]').attr('content')};
        $('#display').load('<?= site_url('settings/settings_view'); ?>', data);

        // Opens the selected settings view
        $(document).on('click', '#general_settings, #email_settings, #database_settings, #add_user', function(event) {
            event.preventDefault();
            var settings_view_name = $(this).attr('id');
            var settings_title = $(this).text();
            $('#title').html(settings_title);
            $('#display').show();
            data = {title : settings_title, settings_view_name : settings_view_name, csrf : $('meta[name="csrf-token"]').attr('content')};
            $('#display').load('<?= site_url('settings/settings_view'); ?>', data);
        });

        // For Email Settings
        if($('#send_mail').is(':checked') || $('#smtp').is(':checked')) {
            $('#email_encryption_settings').show();
        } else {
            $('#email_encryption_settings').hide();
        }
        $(document).on('click', '#send_mail, #smtp', function(event) {
            $('#email_encryption_settings').show();
        });
        $(document).on('click', '#e_mail', function(event) {
            $('#email_encryption_settings').hide();
        });

        // Form Submit
        $(document).on('submit', '#form', function(event) {
            event.preventDefault();
            //var formData = $(this).serialize();
            $.ajax({
                url: '<?= base_url('settings/save'); ?>',
                type: 'POST',
                dataType: 'JSON',
                data: new FormData(this),
                contentType: false,  
                cache: false,  
                processData:false
            })
            .done(function(res) {
                if(res.success == true) {
                    location.reload();
                    $('.toast').removeClass('hide');
                    $('.toast').addClass('show');
                }
            })
        });

        $(document).on('click', '#delete', function(event) {
            var name = $(this).data('name');
            event.preventDefault();
            $.ajax({
                url: '<?= site_url('settings/delete/'); ?>' + name,
                type: 'POST',
                dataType: 'JSON',
                success: function () {
                    location.reload();
                }
            })
        });

        // Export Database
        $(document).on('click', '#export_database', function(event) {
            event.preventDefault();
            $.ajax({
                url: '<?= site_url('settings/export_database') ?>',
                type: 'POST',
                dataType: 'JSON',
            })
            .done(function(res) {
                if(res.success == true) {
                    console.log("success");
                }
            });
        });

        // Send Test Mail
        $(document).on('click', '#send_test_mail', function(event) {
            event.preventDefault();
            var email = $('#test_mail').val();
            if(email!=='') {
                $.ajax({
                    url: '<?= site_url('settings/send_test_mail'); ?>',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        'data' : email
                    },
                })
                .done(function(res) {
                    if(res.success == true) {
                        alert('success');
                    }
                });
            } else {
                alert('Please Enter Email');
            }
        });
    });
</script>
<?= $this->endSection() ?>