<?php

namespace Menus\Models;

use \CodeIgniter\Model;

class MenusModel extends Model
{
    protected $table = 'menus';
    protected $primaryKey = 'id';
    protected $allowedFields = [];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $returnType = 'Menus\Entities\Menus';
}
