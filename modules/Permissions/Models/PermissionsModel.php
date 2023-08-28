<?php 
namespace Permissions\Models;
use \CodeIgniter\Model;

class PermissionsModel extends Model
{
    protected $table         = 'auth_permissions';
    protected $returnType    = 'array';
    protected $allowedFields = [
        'name',
        'description',
    ];

  const ORDERABLE = [
        1 => 'name',
        2 => 'description',
    ];

    /**
     * Get resource data.
     *
     * @param string $search
     *
     * @return \CodeIgniter\Database\BaseBuilder
     */
    public function getResource(string $search = '')
    {
        $builder = $this->builder()
            ->select('id, name, description');

        return empty($search)
            ? $builder
            : $builder->groupStart()
                ->like('name', $search)
                ->orLike('description', $search)
            ->groupEnd();
    }
}
