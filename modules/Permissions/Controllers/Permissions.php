<?php
namespace Permissions\Controllers;
use \Permissions\Models\PermissionsModel;
use CodeIgniter\API\ResponseTrait;
use \Hermawan\DataTables\DataTable;

class Permissions extends \App\Controllers\BaseController
{
   use ResponseTrait;

  /** @var \agungsugiarto\boilerplate\Models\PermissionModel */
  protected $permission;

  /**
   * __construct.
   *
   * @return void
   */
  public function __construct()
  {
      $this->permission = new PermissionsModel();
  }

  /**
   * INDEX PERMISSIONS
   */
  public function index() {
    $request = \Config\Services::request();
    if ($request->is('post')) {
      $builder = $this->permission->select('id, name, description');
          return DataTable::of($builder)
          ->add('action', function($row) {
            return '<div class="btn-group btn-group-sm">
                <a href="javascript:void(0)" onclick="add_edit_permission(' . $row->id . ')" class="btn btn-primary btn-edit"><i class="fas fa-pencil-alt"></i></a>
                <button class="btn btn-danger btn-delete-permission" data-id=' . $row->id . '><i class="fas fa-trash"></i></button>
            </div>';
        }, 'last')->toJson();
    }
    echo view('Permissions\Views\index_permissions');
  }

  /**
   * INSERT PERMISSIONS
   */
  public function save() {
    if (!$data = $this->permission->save($this->request->getPost())) {
      return $this->fail($this->permission->errors());
    }

    return redirect('permissions','refresh');
  }

  /**
   * UPDATE PERMISSIONS
   */
  public function getPermission($id) : object {
    $found = $this->permission->find($id);
    return $this->response->setJSON($found);
  }

  /**
   * DELETE PERMISSIONS
   */
  public function delete($id) {
    $status = $this->permission->delete($id);
    return $this->response->setJSON(['status' => $status ? true : false]);
  }

}
