<?php 
namespace Settings\Models;
use \CodeIgniter\Model;

class SettingsModel extends Model
{
  protected $table = 'settings';
  protected $primaryKey = 'id';
  protected $allowedFields = [];
  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';

  // protected $useSoftDeletes = true;
  // protected $deletedField  = 'deleted_at';
  // protected $skipValidation  = false;

  protected $returnType = 'Settings\Entities\Settings';
}
