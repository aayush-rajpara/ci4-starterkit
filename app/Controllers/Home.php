<?php 
namespace App\Controllers;

class Home extends App_Controller
{
	public function index()
	{
		//d($this);
		//return view('welcome_message');
		return $this->render('welcome');
	}

	//--------------------------------------------------------------------

}
