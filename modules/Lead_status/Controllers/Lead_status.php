<?php 
namespace Lead_status\Controllers;

class Lead_status extends \App\Controllers\BaseController
{
  /**
   * INDEX LEAD STATUS
   */
  public function index() {
	 echo view('Lead_status\Views\index_lead_status');
  }

  /**
   * INSERT LEAD STATUS
   */
  public function insert() {
	 echo view('Lead_status\Views\insert_lead_status');
  }

  /**
   * UPDATE LEAD STATUS
   */
  public function update() {
	 echo view('Lead_status\Views\update_lead_status');
  }

  /**
   * DELETE LEAD STATUS
   */
  public function delete() {
	 echo view('Lead_status\Views\manage_lead_status');
  }

}
