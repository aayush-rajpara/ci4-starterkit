<?php

namespace Menus\Models;

use \CodeIgniter\Model;

class MenusModel extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'id';
    protected $allowedFields = ['parent_id', 'active', 'title', 'icon', 'route', 'sequence'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
