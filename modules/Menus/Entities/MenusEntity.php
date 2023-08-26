<?php

namespace Menus\Entities;

use Menus\Models\MenusModel;
use CodeIgniter\Entity\Entity;

class MenusEntity extends Entity
{
    public function sequence()
    {
        return (new MenusModel())->selectMax('sequence')->get()->getRow()->sequence;
    }
}
