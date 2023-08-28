<?php 
namespace Products\Controllers;
use \Products\Models\ProductsModel;
use \Hermawan\DataTables\DataTable;

class Products extends \App\Controllers\BaseController
{

  public function __construct()
  {
      $this->model = new ProductsModel();
  }

  public function index()
  {
      return view('Products\Views\index_products');
  }

    public function addOrEditProducts()
    {
        $posted_data = $this->request->getPost();
        
        $validationRules = [
            'product_id'      => 'required|is_unique[products_master.product_id,id,'.$posted_data['id'].']',
            'product_name'    => 'required',
            'version'      => 'required|regex_match[^(?!^\d+$)(?!.*\.\..*\.)\d+(\.\d+){0,2}$]',
            'category'     => 'required',
        ];

        if (!$this->validate($validationRules)) {
            $data = [
                'success' => false,
                'message' => $this->validator->getErrors()
            ];
            return $this->response->setJSON($data);
        }

        $response = $this->model->add_or_edit_product($posted_data);

        return $this->response->setJSON($response);
    }

    public function getData()
    {
        $builder = $this->model->select('id, product_id, product_name, version, category');
        return DataTable::of($builder)
            ->filter(function ($builder, $request) {
                if (property_exists($request, 'product_version')) {
                    $builder->whereIn('version', $request->product_version);
                }
                if (property_exists($request, 'products_name')) {
                    $builder->whereIn('product_name', $request->products_name);
                }
            })
            ->add('action', function($row) {
            return '<div class="btn-group btn-group-sm">
                <a href="javascript:void(0)" onclick="add_edit_products(' . $row->id . ')" class="btn btn-primary btn-edit"><i class="fas fa-pencil-alt"></i></a>
                <button class="btn btn-danger btn-delete-product" data-id=' . $row->id . '><i class="fas fa-trash"></i></button>
            </div>';
        }, 'last')->toJson();
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = $this->model->getDataById(['id' => $id]);
        return $this->response->setJSON($data);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $where['id'] = $id;
        $status = $this->model->delete_data($where);
        return $this->response->setJSON(['status' => $status ? true : false]);
    }
}
