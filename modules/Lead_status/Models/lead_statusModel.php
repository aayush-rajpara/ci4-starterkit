<?php 
namespace Lead_status\Models;
use \App\Model;

class Lead_statusModel extends Model
{
  protected $table = 'lead_status';
  protected $primaryKey = 'id';
  protected $allowedFields = ["status","created_at","updated_at"];
  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';

  // protected $useSoftDeletes = true;
  // protected $deletedField  = 'deleted_at';
  // protected $skipValidation  = false;

  protected $returnType = 'App\Entities\Lead_status';
}
