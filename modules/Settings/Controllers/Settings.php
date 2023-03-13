<?php 
namespace Settings\Controllers;
use \Hermawan\DataTables\DataTable;
use Settings\Models\SettingsModel;
use CodeIgniter\Shield\Entities\User;

class Settings extends \App\Controllers\BaseController
{
    public function __construct()
    {
        $this->settings = new SettingsModel();
        
    }
    public function index() {
        echo view('Settings\Views\settings');
    }

    public function settings_view() {
        $posted_data = $this->request->getVar();
        $data['title'] = $posted_data['title'];
        echo view('Settings\Views/'.$posted_data['settings_view_name'].'', $data);
    }

    public function save() {
        $posted_data = $this->request->getVar(null, FILTER_SANITIZE_SPECIAL_CHARS);

        // $users = model('UserModel');
        // $user = new User([
        //     'username' => $posted_data['username'],
        //     'email'    => $posted_data['email'],
        //     'password' => $posted_data['password'],
        // ]);
        // $users->save($user);

        // // To get the complete user object with ID, we need to get from the database
        // $user = $users->findById($users->getInsertID());

        // // Add to default group
        // $users->addToDefaultGroup($user);

        $image = $this->request->getFiles();

        foreach ($image as $key => $value) {
            if(!empty($value->guessExtension())) {
                $name = $key.'.png';
                $value->move(ROOTPATH.'/public/uploads/general',$name);
                service('settings')->set('App.'.$key, $name);
            }
        }

        setting()->set('Auth.allowRegistration', $posted_data['allow_user_to_register'] == 'yes');
        unset($posted_data['allow_user_to_register']);

        foreach ($posted_data as $key => $settings) {
            service('settings')->set('App.'.$key, $settings);
        }

        echo json_encode(['success' => true]);
    }

    public function save_email_settings() {
        $posted_data = $this->request->getVar(null, FILTER_SANITIZE_SPECIAL_CHARS);
        foreach ($posted_data as $key => $settings) {
            service('settings')->set('Email.'.$key, $settings);
        }
        echo json_encode(['success' => true]);
    }

    public function send_test_mail() {
        $to = $this->request->getPost('data');
        if(send_test_mail($to)) {
            echo json_encode(['success'=>true]);
        }
    }

    public function delete($name) {
        $image_name = service('settings')->get('App.'.$name);
        unlink(ROOTPATH.'/public/uploads/general/'.$image_name);
        service('settings')->forget('App.'.$name);
        echo json_encode(['success' => true]);
    }

    public function database_table()
    {
        $db = db_connect();
        $builder = $db->table('database_backup')->select('id, name, date');
        
        return DataTable::of($builder)->toJson();
    }

    // public function export_database()
    // {
    //     helper('filesystem');
    //     $data = $this->settings->listTables();
    //     $util = \CodeIgniter\Database\Config::utils();

    //     $config = [
    //         'tables' => '',
    //         'format' => 'txt',
    //         'filename' => 'my_backup_db.sql',
    //         'add_drop' => TRUE,
    //         'add_insert' => TRUE,
    //         'newline' => "\n",
    //         'foreign_key_checks' => FALSE,
    //     ];

    //     $file = $util->backup($config);
    //     write_file(APPPATH.'Views/database_backup/my_backup.txt', $file);
    // }
}
