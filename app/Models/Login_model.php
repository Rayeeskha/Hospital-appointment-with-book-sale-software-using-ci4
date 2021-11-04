<?php 
namespace App\models;
use CodeIgniter\Model;
class Login_model extends Model
{
	public function verify_admin_account($username,$password){
		$result = $this->db->table('admin_login')
		       ->select('id,username,email,password,status,date,role,photo')
		       ->where('email', $username)
		       ->where('password', md5($password))
		       ->get();
		if (count($result->getResultArray()) == 1) {
			return $result->getRowArray();
		}else{
			return false;
		}
	}
	
	public function verifyEmail($email,$password){
		$builder = $this->db->table('customer');
		$builder->select('id,user_id,status,name,username,mobile,email,gender,address,password');
		$builder->where('email', $email);
		$builder->where('password', md5($password));
		$result = $builder->get();
		if (count($result->getResultArray()) == 1) {
			return $result->getRowArray();
		}else{
			return false;
		}
	}
	
	public function CustomerVerify($email,$password){
		$builder = $this->db->table('customer');
		$builder->select('id,user_id,status,name,username,mobile,email,gender,address,password');
		$builder->where('email', $email);
		$builder->where('password', md5($password));
		$result = $builder->get();
		if (count($result->getResultArray()) == 1) {
			return $result->getRowArray();
		}else{
			return false;
		}
	}
}