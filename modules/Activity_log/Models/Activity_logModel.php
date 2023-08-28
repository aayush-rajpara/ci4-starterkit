<?php 
namespace Activity_log\Models;
use \CodeIgniter\Model;

class Activity_logModel extends Model
{
  protected $table = 'activity_log';
  protected $primaryKey = 'id';
  protected $allowedFields = ["created_by","log_type","log_type_id","description"];
  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';

  // protected $useSoftDeletes = true;
  // protected $deletedField  = 'deleted_at';
  // protected $skipValidation  = false;

  protected $returnType = 'Activity_log\Entities\Activity_log';
}
