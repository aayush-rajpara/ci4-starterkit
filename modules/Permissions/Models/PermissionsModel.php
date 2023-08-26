<?php 
namespace Permissions\Models;
use \CodeIgniter\Model;

class PermissionsModel extends Model
{
  protected $table = 'permissions';
  protected $primaryKey = 'id';
  protected $allowedFields = [];
  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';

  // protected $useSoftDeletes = true;
  // protected $deletedField  = 'deleted_at';
  // protected $skipValidation  = false;

  protected $returnType = 'Permissions\Entities\Permissions';
}
