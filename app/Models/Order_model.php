<?php 
namespace App\models;
use CodeIgniter\Model;

    class Order_model extends Model
	{
		protected $table      = 'orders';
	    protected $primaryKey = 'id';

	    // protected $returnType     = 'array';
	    // protected $useSoftDeletes = true;
	    protected $allowedFields     = ['user_id','order_id','firstname','lastname', 'companyname','email','mobile','alternative_mobile','address','total_quantity','total_amount','optionaladdress','city','zipcode','order_status'];
	    protected $useTimestamps     = true;
	    protected $createdField      = 'created_at';
	    protected $returnType        = 'array';

	    // $model->setValidationRule($fieldName, $fieldRules);

	    public function fetch_all_records($tablename){
	        return $this->table($tablename)
		          ->orderBy('id','DESC')
		          ->select('*')
		          ->paginate(10);
	    }
	    public function searchorder($key){   
			return $this->table('orders')->like('order_id',$key);
	    }

	  

	 





	}


?>