<?php 
namespace App\models;
use CodeIgniter\Model;

    class Customermodel extends Model
	{
		protected $table      = 'customer';
	    protected $primaryKey = 'id';

	    // protected $returnType     = 'array';
	    // protected $useSoftDeletes = true;
	    protected $allowedFields     = ['id','user_id','name','username', 'mobile','email','gender','address','password','status'];
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

	  

	 





	}


?>