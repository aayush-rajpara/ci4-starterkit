<?php

namespace Menus\Controllers;

class Menus extends \App\Controllers\BaseController
{
    public function index()
    {
        if ($this->request->getPost()) {
            $postData = $this->request->getPost();
        }
        echo view('Menus\Views\index');
    }
}
