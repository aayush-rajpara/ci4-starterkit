<?php

namespace Menus\Controllers;

use Menus\Models\MenusModel;
use Menus\Entities\MenusEntity;

class Menus extends \App\Controllers\BaseController
{
    public function index()
    {
        if ($this->request->getPost()) {

            $validationRules = [
                'parent_id'   => 'required|numeric',
                'active'      => 'required|numeric',
                'icon'        => 'required|min_length[5]|max_length[55]',
                'route'       => 'required|max_length[255]',
                'title'       => 'required|min_length[2]|max_length[255]'
            ];

            if (!$this->validate($validationRules)) {
                return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
            }

            $entity = new MenusEntity();
            $model  = new MenusModel();

            $postData = $this->request->getPost();
            $postData['sequence'] = $entity->sequence() + 1;

            $model->insert($postData);
        }
        echo view('Menus\Views\index');
    }
}
