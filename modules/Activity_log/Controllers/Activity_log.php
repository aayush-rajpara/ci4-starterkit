<?php 
namespace Activity_log\Controllers;
use \Activity_log\Models\Activity_logModel;
use \Hermawan\DataTables\DataTable; 

class Activity_log extends \App\Controllers\BaseController
{
  public function __construct()
    {
        $this->model = new Activity_logModel();
    }

  /**
   * INDEX ACTIVITY LOG
   */
  public function index() {
    $request = \Config\Services::request();
    if ($request->is('post')) {
      $builder = $this->model->select('activity_log.id, activity_log.created_at, username, log_type, log_type_id,created_by,description')->join('users', 'users.id = activity_log.created_by');
          return DataTable::of($builder)
          ->edit('log_type', function($row) {
            return "<span>{$row->log_type} : {$row->description} [ item_id - {$row->log_type_id} ]</span>"; 
        })
          ->toJson();
    }
	     echo view('Activity_log\Views\index_activity_log');
  }

  /**
   * INSERT ACTIVITY LOG
   */
  public function insert() {
	 echo view('Activity_log\Views\insert_activity_log');
  }

  /**
   * UPDATE ACTIVITY LOG
   */
  public function update() {
	 echo view('Activity_log\Views\update_activity_log');
  }

  /**
   * DELETE ACTIVITY LOG
   */
  public function delete() {
	 echo view('Activity_log\Views\delete_activity_log');
  }

}
