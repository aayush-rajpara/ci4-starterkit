<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        d(hooks());
        return view('welcome_message');
    }
}
