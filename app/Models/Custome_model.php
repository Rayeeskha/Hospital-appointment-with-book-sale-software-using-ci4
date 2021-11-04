<?php 
namespace App\models;
use CodeIgniter\Model;
class Custome_model extends Model
{
    public function Insertdata($tablename,$data){
	    $this->db->table($tablename)
		        ->insert($data);
		if ($this->db->affectedRows() == 1) {
			return true;
		}else{
			return false;
		}
	}
	
	
	
	public function fetch_getschedulelistdatevise($tablename, $args){
		$result = $this->db->table($tablename)
		          ->select('*')
		          ->where($args)
		          ->orderBy('id','asc')
                  ->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return false;
		}
	}
	
	public function fetch_rec_by_args($tablename, $args){
		$result = $this->db->table($tablename)
		          ->select('*')
		          ->orderBy('id','desc')
		          ->where($args)
		          ->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return false;
		}
	}
	
	public function fetch_doctors($tablename, $args){
		$result = $this->db->table($tablename)
		          ->select('*')
		          ->orderBy('id','asc')
		          ->where($args)
		          ->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return false;
		}
	}
	
	public function update_rec_by_args($tablename, $args, $data){
		$this->db->table($tablename)
		     ->where($args)
		     ->update($data);
		if ($this->db->affectedRows() == 1) {
			return true;
		}else{
			return false;
		}
	}
	
	public function fetch_all_records($tablename){
		$result = $this->db->table($tablename)
		          ->orderBy('id','DESC')
		          ->select('*')
		          ->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return false;
		}
	}
	
	public function delete_records($tablename, $args){
		$this->db->table($tablename)
		       ->where($args)
		       ->delete();
		if ($this->db->affectedRows() == 1) {
			return true;
		}else{
			return false;
		}
	}
	
	public function fetch_all_records_with_dept_join($tablename){
	    $result = $this->db->table($tablename)
		          ->select("department.departmentname,$tablename.*")
		          ->join('department', "$tablename.department_id = department.id")
		          ->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return false;
		}
	}
	
	public function fetch_rec_by_args_with_dept_join($tablename, $args){
	    $result = $this->db->table($tablename)
		          ->select("department.departmentname,department.status,$tablename.*")
		          ->where($args)
		          ->join('department', "$tablename.department_id = department.id")
		          ->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return false;
		}
	}
	
	
	public function fetchrec_by_schdl_join($tablename){
	    $result = $this->db->table($tablename)
		          ->select("staff_member.id,staff_member.department_id,staff_member.email,staff_member.Speciality,staff_member.name,staff_member.photo,staff_member.mobile,department.id,department.departmentname,$tablename.*")
		          ->join('staff_member', "$tablename.doctor_id = staff_member.id")
		          ->join('department', "staff_member.department_id = department.id")
		          ->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return false;
		}
	}
	
	public function fetch_schd_dtl_join($tablename, $args){
	    $result = $this->db->table($tablename)
		          ->select("staff_member.id,staff_member.department_id,staff_member.email,staff_member.Speciality,staff_member.name,staff_member.photo,staff_member.mobile,department.id,department.departmentname,$tablename.*")
		          ->where($args)
		          ->join('staff_member', "$tablename.doctor_id = staff_member.id")
		          ->join('department', "staff_member.department_id = department.id")
		          ->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return false;
		}
	}
	
	public function fetch_apmnt_Schd_join($tablename, $args){
	    $result = $this->db->table($tablename)
		          ->select("appointment.doctor_id,appointment.book_date,appointment.book_time,$tablename.*")
		          ->where($args)
		          ->join('appointment', "appointment.doctor_id = $tablename.doctor_id")
		          ->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return false;
		}
	}
	
	public function fetch_event($tablename){
		$result = $this->db->table($tablename)
		          ->select('*')
		          ->orderBy('id','desc')
                  ->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResultArray();
		}else{
			return false;
		}
	}
	
	public function Insertdata_return_id($tablename,$data){
	 	$builder = $this->db->table($tablename);
	 	$res = $builder->insert($data);
	 	if ($this->db->affectedRows() == 1) {
	 		return $this->primaryKey = $this->db->insertID();
	 	}else{
			return false;
	 	}
	}
	
	public function fetch_orders($tablename, $args){
	    $result = $this->db->table($tablename)
		          ->select("products.productname,products.photo,products.stock,products.mrpprice,products.price,order_details.qty,order_details.pro_price,order_details.product_id,order_details.ord_status,order_details.id as ord_dtl_id, $tablename.*")
		          ->where($args)
		          ->orderBy('id','desc')
		          ->join('order_details', "order_details.order_id = orders.order_id")
		          ->join('products', "order_details.product_id=products.id")
		          ->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return false;
		}
	}
	
	public function fetch_latest_order($tablename, $args){
	    $result = $this->db->table($tablename)
		          ->select("products.productname,products.photo,products.stock,products.mrpprice,products.price,order_details.qty,order_details.pro_price,order_details.product_id, $tablename.*")
		          ->where($args)
		          ->orderBy('id','desc')
		          ->join('order_details', "order_details.order_id = orders.order_id")
		          ->join('products', "order_details.product_id=products.id")
		          ->limit(6)
		          ->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return false;
		}
	}
	
	
}