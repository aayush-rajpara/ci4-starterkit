<input type="hidden" name="mailType" value="html">
<div class="mb-3">
    <div class="col-md">
        <small class="text-light fw-semibold d-block">Email Settings</small>
        <div class="form-check form-check-inline mt-3">
            <input
            class="form-check-input"
            type="radio"
            name="protocol"
            id="smtp"
            value="smtp"
            <?php if(get_email_settings('protocol') == 'smtp') { echo 'checked'; } ?>
            />
            <label class="form-check-label" for="smtp">SMTP</label>
        </div>
        <div class="form-check form-check-inline">
            <input
            class="form-check-input"
            type="radio"
            name="protocol"
            id="send_mail"
            value="send_mail"
            <?php if(get_email_settings('protocol') == 'send_mail') { echo 'checked'; } ?>
            />
            <label class="form-check-label" for="send_mail">SEND E-MAIL</label>
        </div>
        <div class="form-check form-check-inline">
            <input
            class="form-check-input"
            type="radio"
            name="protocol"
            id="e_mail"
            value="e_mail"
            <?php if(get_email_settings('protocol') == 'e_mail') { echo 'checked'; } ?>
            />
            <label class="form-check-label" for="e_mail">EMAIL</label>
        </div>
    </div>
</div>
<div id="email_encryption_settings">
    <div class="mb-3">
        <div class="col-md">
            <label for="emailEncryption" class="form-label">Email Encryption</label>
            <select class="form-select" id="emailEncryption" name="emailEncryption">
                <option VALUE=""></option>
                <option value="ssl" <?php if(get_email_settings('emailEncryption') == 'ssl') { echo 'selected'; } ?>>SSL</option>
                <option value="tls" <?php if(get_email_settings('emailEncryption') == 'tls') { echo 'selected'; } ?>>TLS</option>
            </select>
        </div>
    </div>
    <div class="mb-3">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">SMTP host</label>
                <input type="text" class="form-control" placeholder="Enter host" id="SMTPHost" name="SMTPHost" required value="<?= get_email_settings('SMTPHost'); ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">SMTP port</label>
                <input type="text" class="form-control" placeholder="Enter Port" id="SMTPPort" name="SMTPPort" required value="<?= get_email_settings('SMTPPort'); ?>">
            </div>
        </div>
    </div>
    <div class="mb-3">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">SMTP Username</label>
                <input type="text" class="form-control" placeholder="Enter Username" id="SMTPUser" name="SMTPUser" required value="<?= get_email_settings('SMTPUser'); ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">SMTP Password</label>
                <input type="password" class="form-control" placeholder="Enter Password" id="SMTPPass" name="SMTPPass" required value="<?= get_email_settings('SMTPPass'); ?>">
            </div>
        </div>
    </div>
</div>
<div class="mb-3">
    <label class="form-label" for="fromEmail">Email</label>
    <div class="input-group input-group-merge">
        <span class="input-group-text"><i class="bx bx-envelope"></i></span>
        <input
        type="text"
        id="fromEmail"
        class="form-control"
        placeholder=""
        name="fromEmail"
        value="<?= get_email_settings('fromEmail'); ?>"
        />
    </div>
</div>
<hr>
<div class="mb-3">
    <div class="row align-items-center">
        <div class="col-md-11 mb-3">
            <label class="form-label" for="test_mail">Send Test Email</label>
            <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                <input
                type="text"
                id="test_mail"
                class="form-control"
                placeholder=""
                />
            </div>
            <div class="form-text">Send test email to make sure that your SMTP settings is set correctly</div>
        </div>
        <div class="col-md-1 mb-3">
            <button type="button" id="send_test_mail" class="btn btn-primary">Test</button>
        </div>
    </div>
</div>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div class="bs-toast toast fade hide bg-info" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold">Success</div>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Email settings have been added successfully
        </div>
    </div>
</div>