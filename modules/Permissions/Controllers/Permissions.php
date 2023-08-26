<?php
namespace Permissions\Controllers;

class Permissions extends \App\Controllers\BaseController
{
  /**
   * INDEX PERMISSIONS
   */
  public function index() {
    echo view('Permissions\Views\index_permissions');
  }

  /**
   * INSERT PERMISSIONS
   */
  public function insert() {
    echo view('Permissions\Views\insert_permissions');
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
