<?php 
namespace Api\Models;
use \CodeIgniter\Model;

class ApiModel extends Model
{
  protected $table = 'api';
  protected $primaryKey = 'id';
  protected $allowedFields = [];
  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';

  // protected $useSoftDeletes = true;
  // protected $deletedField  = 'deleted_at';
  // protected $skipValidation  = false;

  protected $returnType = 'Api\Entities\Api';
}
