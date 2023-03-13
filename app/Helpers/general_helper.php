<?php  

if (!function_exists('get_logged_in_user')) {
    function get_logged_in_user($userid) {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.*, auth_groups_users.group');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id', 'left');
        return $builder->getWhere(["users.id" => $userid])->getRow();
    }
}

if(! function_exists('get_email_settings')) {
    function get_email_settings($value) {
        return service('settings')->get('Email.'.$value);
    }
}

if(! function_exists('get_option')) {
    function get_option($value) {
        return service('settings')->get('App.'.$value);
    }
}

if(! function_exists('send_test_mail')) {
    function send_test_mail($to) {
        $email = emailer()->setFrom(setting('Email.fromEmail'), setting('Email.fromName') ?? '');
        $email->setTo($to);
        $email->setSubject('SMTP Setup Testing');
        $email->setMessage(get_email_settings('email_header').'This is test SMTP email. <br/> If you received this message that means that your SMTP settings is set correctly.'.get_email_settings('email_footer'));
        if ($email->send()) {
            return true;
        }
    }
}

?>