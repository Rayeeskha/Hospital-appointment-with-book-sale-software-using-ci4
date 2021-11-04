<?php 
namespace App\models;
use CodeIgniter\Model;

    class Appointmentmodel extends Model
	{
		protected $table      = 'appointment';
	    protected $primaryKey = 'id';

	    // protected $returnType     = 'array';
	    // protected $useSoftDeletes = true;
	    protected $allowedFields     = ['doctor_id','appoint_uid','username','phone','email', 'book_date','cashamount','reference_link','book_time','message','photo','status','apmnt_created','booking_date','Year'];
	    protected $useTimestamps     = true;
	    protected $createdField      = 'apmnt_created';
	    protected $returnType        = 'array';

	    // $model->setValidationRule($fieldName, $fieldRules);

	    public function fetch_all_records($tablename){
	        return $this->table($tablename)
		          ->orderBy('id','DESC')
		          ->select('*')
		          ->paginate(10);
	    }
	    
	    public function fetch_rec_by_args($tablename, $args){
	        return $this->table($tablename)
		          ->orderBy('id','DESC')
		          ->select('*')
		          ->where($args)
		          ->paginate(10);
	    }
	    
	    public function searchappointment($key){   
			return $this->table('appointment')->like('appoint_uid',$key);
	    }
	    
	    
	    public function searchapayment($key, $args){   
			return $this->table('appointment')->like('appoint_uid',$key)->where($args);
	    }
	    
	}


?>