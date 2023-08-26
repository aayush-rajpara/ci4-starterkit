<?php
namespace Permissions\Controllers;
use \Permissions\Models\PermissionsModel;
use CodeIgniter\API\ResponseTrait;

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
    echo view('Permissions\Views\index_permissions');
  }

  /**
   * INSERT PERMISSIONS
   */
  public function save() {
    $posted_data = $this->request->getPost();
    if (!$data = $this->permission->save($this->request->getPost())) {
      return $this->fail($this->permission->errors());
    }

    return $this->respondCreated($data, lang('Permission Added'));
  }

  /**
   * UPDATE PERMISSIONS
   */
  public function update() {
    echo view('Permissions\Views\update_permissions');
  }

  /**
   * DELETE PERMISSIONS
   */
  public function delete() {
    echo view('Permissions\Views\delete_permissions');
  }

}
