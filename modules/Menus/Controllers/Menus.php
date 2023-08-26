<?php

namespace Menus\Controllers;

use Menus\Entities\MenusEntity;
use Menus\Models\MenusModel;

class Menus extends \App\Controllers\BaseController
{
    public function index()
    {
        $entity = new MenusEntity();
        $model  = new MenusModel();

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

            $postData = $this->request->getPost();
            $postData['sequence'] = $entity->sequence() + 1;

            $model->insert($postData);

            return redirect()->to(route_to('routeToMenu'));
        }

        $data['menus'] = $model->findAll();
        echo view('Menus\Views\index', $data);
    }
}
