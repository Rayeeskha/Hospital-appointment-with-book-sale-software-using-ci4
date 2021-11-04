<?php
namespace App\Controllers;
use App\Controllers\BaseController;

class Login extends BaseController {
	
	public function index() {
		if ((session()->has('ADMIN_LOGGEID_IN'))) {
			return redirect()->to(base_url().'/Admin/index');
		}
		return view('admin/login');
	}

	public function login(){
	    $data = [];
		//site login 
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'email'  => 'required|valid_email',
				'password'   => 'required|min_length[4]|max_length[16]'
			];
			if ($this->validate($rules)) {
				$email     = $this->request->getVar('email');
				$password  = $this->request->getVar('password');
				$rememberme  = $this->request->getVar('rememberme');
				
				$throttler = \Config\Services::throttler();
				$allow     = $throttler->check($this->request->getIPAddress(), 4, MINUTE);
				if ($allow) {
					$userdata = $this->loginModel->verify_admin_account($email, $password);
					if ($userdata) {
					    if ($rememberme === null) {
					        setcookie('login_email', $email, 100);
                            setcookie('login_pwd', $password, 100);
					    }else{
					        setcookie('login_email', $email, time()+60*60*24*100);
                            setcookie('login_pwd', $password, time()+60*60*24*100);
					    }
					    
					    
					    
					    
					    if($userdata['role'] == 1){
					        $logged_in_admin_info  = [
    							'ADMIN_ID'           => $userdata['id'],
    							'ADMIN_NAME'         => $userdata['username'],
    							'ADMIN_EMAIL'        => $userdata['email'], 
    							'ADMIN_ROLE'          => $userdata['role'],
    							'ADMIN_LOGGEID_IN'   => TRUE    
    						];
    						$this->session->set($logged_in_admin_info);
					    }else{
					        $logged_in_user_info  = [
    							'ADMIN_ID'           => $userdata['id'],
    							'ADMIN_NAME'         => $userdata['username'],
    							'ADMIN_EMAIL'        => $userdata['email'],
    							'USER_ROLE'          => $userdata['role'],
    							'USER_PHOTO'          => $userdata['photo'],
    							'ADMIN_LOGGEID_IN'   => TRUE    
    						];
						$this->session->set($logged_in_user_info);
					    }
					
						return redirect()->to(base_url().'/Admin');
					}else{
						$data['error']  = 'Sorry ! Unable to Login Email & Password doesNot Exists';
					}
				}else{
					$data['error']  = 'Max No. of failed Login Attempt, Try Again a Few Minutes';
				}
			}else{
				
				$data['validation']  = $this->validator;
			}
		}		
		//Google Software Developer Khan Rayees
		return view('admin/login', $data);

	}
	
	public function userloginregister(){
	    $data['validation']  = null;
	    return view('shop/userloginregister', $data);
	}
	
	public function customerregister(){
	    $data = [];
	    $jsonArr = array();
		if ($this->request->getMethod() == 'post') {
		    $rules = [
				'email'         => 'required|valid_email|is_unique[customer.email]',
			];
		    if ($this->validate($rules)) {
		    $user_id = rand(1111111,9999999);
			$data = [
			        'user_id' => $user_id,
			        'name'  => $this->request->getVar('name',FILTER_SANITIZE_STRING),
			        'username'  => $this->request->getVar('lastname',FILTER_SANITIZE_STRING),
			        'mobile'  => $this->request->getVar('mobile',FILTER_SANITIZE_STRING),
			        'email'  => $this->request->getVar('email',FILTER_SANITIZE_STRING),
			        'country'  => $this->request->getVar('country',FILTER_SANITIZE_STRING),
			        'address'  => $this->request->getVar('address',FILTER_SANITIZE_STRING),
			        'password'  => md5($this->request->getVar('regpassword',FILTER_SANITIZE_STRING)),
			        'created_at' => date('y-m-d h:i:s')
			    ];
			    $status = $this->mainmodel->Insertdata('customer',$data);
			    if ($status == true) {
    				$jsonArr = array('is_error' => 'no',  'dd'=>'Account Created Successfully');
    			}else{
    				$jsonArr = array('is_error' => 'yes',  'dd'=>'Sorry ! Unable to Create Account');
		        }
		}else{
			$jsonArr = array('is_error' => 'yes',  'dd'=>'Sorry ! Email Already Taken Please Choose Another');
		}
	}
	echo json_encode($jsonArr);
	}
	
	
	public function logincustomer(){
	    $data = [];
		//site login 
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'customeremail'  => 'required',
				'password'   => 'required|min_length[4]|max_length[16]'
			];
			if ($this->validate($rules)) {
				$email     = $this->request->getVar('customeremail');
				$password  = $this->request->getVar('password');
				$rememberme  = $this->request->getVar('rememberme');
				$throttler = \Config\Services::throttler();
				$allow     = $throttler->check("login", 4, MINUTE);
				if ($allow) {
					$userdata = $this->loginModel->verifyEmail($email, $password);
					if (!$userdata) {
						$this->session->setTempdata('error', 'Sorry ! Unable to Login Email & Password doesNot Exists ?', 3);
						return redirect()->to(base_url().'/Login/userloginregister');
					}else{
					    if ($userdata['status'] == 'Active') {
					        if ($rememberme === null) {
    					        setcookie('login_user_email', $email, 100);
                                setcookie('login_user_pwd', $password, 100);
    					    }else{
    					        setcookie('login_user_email', $email, time()+60*60*24*100);
                                setcookie('login_user_pwd', $password, time()+60*60*24*100);
    					    }
    						$loginInfo  = [
								'LOGIN_USER_ID'     => $userdata['id'],
								'USER_ID' => $userdata['user_id'],
								'NAME'    => $userdata['name'],      
								'USER_NAME'    => $userdata['username'],      
								'USER_MOBILE'  => $userdata['mobile'],      
								'USER_EMAIL'   => $userdata['email'],      
								'USER_STATUS'  => $userdata['status'],      
								'USER_GENDER'  => $userdata['gender'],  
								'LOGIN_USER' => TRUE    
							];
							$this->session->set($loginInfo);
							return redirect()->to(base_url().'/Shop/viewcartdetails');
						}else{
							$this->session->setTempdata('error', 'Invalid Login Details', 3);
						}
						return redirect()->to(base_url().'/Login/userloginregister');
							}
						}else{
							$this->session->setTempdata('error', 'Max No. of failed Login Attempt, Try Again a Few Minutes', 3);
						}
				}else{
					$data['validation']  = $this->validator;
				}
			}
			return view('shop/userloginregister', $data);
	}
	
	

	public function logout(){
		if (session()->has('ADMIN_LOGGEID_IN')) {
		}
		session()->remove('ADMIN_LOGGEID_IN');
		session()->destroy();
		return redirect()->to(base_url()."/Login/index");
	}
	
	public function customerlogout(){
	    if (session()->has('LOGIN_USER')) {
		}
		session()->remove('LOGIN_USER');
		session()->destroy();
		return redirect()->to(base_url()."/Shop");
	}

	



}
