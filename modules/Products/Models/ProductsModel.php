<?php 
namespace Products\Models;
use \CodeIgniter\Model;

class ProductsModel extends Model
{
  protected $DBGroup              = 'default';
  protected $table                = 'products_master';
  protected $primaryKey           = 'id';
  protected $useAutoIncrement     = true;
  protected $insertID             = 0;
  protected $returnType           = 'json';
  protected $useSoftDelete        = false;
  protected $protectFields        = true;
  protected $allowedFields        = ['product_id','product_name','version','category'];

  // Dates
  protected $useTimestamps        = false;
  protected $dateFormat           = 'datetime';
  protected $createdField         = 'created_at';
  protected $updatedField         = 'updated_at';
  protected $deletedField         = 'deleted_at';

  // Validation
  protected $validationRules      = [];
  protected $validationMessages   = [];
  protected $skipValidation       = false;
  protected $cleanValidationRules = true;

  // Callbacks
  protected $allowCallbacks       = true;
  protected $beforeInsert         = [];
  protected $afterInsert          = [];
  protected $beforeUpdate         = [];
  protected $afterUpdate          = [];
  protected $beforeFind           = [];
  protected $afterFind            = [];
  protected $beforeDelete         = [];
  protected $afterDelete          = [];

  public function __construct()
    {
        helper('auth');
    }

  public function getData($order, $dir)
  {
    $query = $this->orderBy($order,$dir)->get();
    return $query->getResult();
  }

  public function getDataById(array $where)
  {
    return $this->asArray()->where($where)->first();
  }

  public function add_or_edit_product($posted_data)
  {
    $insert = false;
        $update = false;
        
        if (empty($posted_data['id'])) {
            $insert = $this->insert($posted_data);
            $activity_log = [
              'created_at' => date("Y-m-d H:i:s"),
              'created_by' => '1', // static user id
              'log_type'   => 'products',
              'log_type_id'=> $insert,
              'description' => 'New product Created'
            ];
            $this->db->table('activity_log')->insert($activity_log);
        } else {
            $update = $this->update(['id' => $posted_data['id']], $posted_data);
            $activity_log = [
              'created_at' => date("Y-m-d H:i:s"),
              'created_by' => '1', // static user id
              'log_type'   => 'products',
              'log_type_id'=> $posted_data['id'],
              'description' => 'products has been modified'
            ];
            $this->db->table('activity_log')->insert($activity_log);
        }

        $type    = ($insert || $update);
        $message = 'Something went wrong';

        if ($type) {
          cache()->delete('Envatoproducts');
            $message = ($insert) ? 'product saved successfully.' : 'product updated successfully.';
        }

        return [
            'success' => $type ? true : false,
            'message' => $message
        ];
  }

  public function update_data($data, $where)
  {
    $query = $this->update($where, $data);
    $query ? true : false;
  }

  public function delete_data($where)
  {
    if ($this->where($where)->delete()) { 
      $activity_log = [
        'created_at' => date("Y-m-d H:i:s"),
            'created_by' => '1', // static user id
            'log_type'   => 'products',
            'log_type_id'=> $where['id'],
            'description' => 'products has been Deleted'
          ];
          $this->db->table('activity_log')->insert($activity_log);
          cache()->delete('Envatoproducts');
          return true;
    }
    return false;
  }
}
