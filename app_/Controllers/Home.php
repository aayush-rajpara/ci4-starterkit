<?php 
namespace App\Controllers;

class Home extends ThemedController
{
	public function index()
	{
		//d($this);
		//return view('welcome_message');
		return $this->render('welcome');
	}

	//--------------------------------------------------------------------

}
