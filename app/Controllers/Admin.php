<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use DateTime;
use DatePeriod;
use DateInterval;

class Admin extends BaseController
{
    public function __construct(){
		$this->email = \Config\Services::email();
	}
	public function index() {
	    $args = ['status' =>'Pending'];
	    $data['pendingapmnt'] = $this->mainmodel->fetch_rec_by_args('appointment', $args);
	    $args = ['book_date' => date('y-m-d')];
	    $data['todayapmnt'] = $this->mainmodel->fetch_rec_by_args('appointment', $args);
	    $data['totalorder'] = $this->mainmodel->fetch_all_records('orders');
	    $args = ['order_status' =>'Pending'];
	    $data['pendingorder'] = $this->mainmodel->fetch_rec_by_args('orders', $args);
	    //Last Five Latest Orders
	     $args = ['orders.order_status' =>'Pending'];
	    $data['latest_order'] = $this->mainmodel->fetch_latest_order('orders', $args);
	    //Last Five Latest Orders
	    
	    //Appointment Chart 
	    $args = ['status' => 'Pending'];
	    $pending_apmnt = $this->mainmodel->fetch_rec_by_args('appointment', $args);
	    $args = ['status' => 'Booked'];
	    $booked_apmnt = $this->mainmodel->fetch_rec_by_args('appointment', $args);
	    $args = ['status' => 'Cancel'];
	    $cancel_apmnt = $this->mainmodel->fetch_rec_by_args('appointment', $args);
	    $all_apmnt = $this->mainmodel->fetch_all_records('appointment');
	    
	    $data['chart_data']  = [
			'ch_pending_apmnt'    => $pending_apmnt? count($pending_apmnt) :'0',
			'ch_booked_apmnt'     => $booked_apmnt ? count($booked_apmnt):'0',
			'ch_cancel_apmnt'     => $cancel_apmnt ? count($cancel_apmnt) :'0',
			'ch_all_apmnt'        => $all_apmnt ? count($all_apmnt) :'0'
		];
	    //Appointment Chart 
		return view('admin/dashboard', $data);
	}
	
	public function addcategory(){
	    return view('admin/addcategory');
	}
	
	public function uploadcategory(){
	    $data  = [];
		$data['validation'] = null;
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'categoryname'        => 'required|is_unique[category.categoryname]',
			];
			if($this->validate($rules)){
				// $avatar = 'NotUploded';
				// $img = $this->request->getFile('avatar');
				// if ($img !== null) {
				// 	if ($img->isValid() &&  !$img->hasMoved()) {
				// 	 	$newName = $img->getRandomName();
				// 	 	$img->move('./public/uploads/categoryimg', $newName); 
	   //             	$avatar  = $img->getName();
				// 	}
				// }
				$data = [
					'categoryname'    => $this->request->getVar('categoryname',FILTER_SANITIZE_STRING),
					'desctiption'     => $this->request->getVar('desctiption',FILTER_SANITIZE_STRING),
					//'photo'           => $avatar,
					'status'          => 'Active',
					'added_date'      => date('Y-m-d h:i:s'),
					'Year'            => date('Y')
				];
				$status = $this->mainmodel->Insertdata('category',$data);
				if ($status == true) {
					$this->session->setTempdata('success', ' Records Added Successfully', 3);
				}else{
					$this->session->setTempdata('error', 'Sorry ! Unable to Add  Records ?', 3);
				}
				return redirect()->to(base_url().'/Admin/addcategory');    
			}else{
				$data['validation'] = $this->validator;
			}
			return view('admin/addcategory');
		}
	}
	
	public function managecategory(){
	    $data['category'] = $this->mainmodel->fetch_all_records('category');
	    return view('admin/managecategory', $data);
	}
	
	public function changecatestatus($id, $status){
	    $args = [ 'id'  => $id ];
	    $data = [ 'status'  => $status ];
	   $status = $this->mainmodel->update_rec_by_args('category', $args, $data);
	   if ($status == true) {
			$this->session->setTempdata('success', 'Records Change Successfully!', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Change  Records?', 3);
		}
		return redirect()->to(base_url().'/Admin/managecategory');
	}
	
	public function deletecate($id){
	    $args = [ 'id'  => $id ];
	    $status = $this->mainmodel->delete_records('category', $args);
	    if ($status == true) {
			$this->session->setTempdata('success', 'Records Deleted Successfully!', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Delete  Records?', 3);
		}
		return redirect()->to(base_url().'/Admin/managecategory');
	}
	
	public function editcate($id){
	    $args = ['id' => $id];
	    $data['editcate'] = $this->mainmodel->fetch_rec_by_args('category', $args);
	    return view('admin/editcate', $data);
	}
	
	public function updatecate($id){
	    $args = ['id'=> $id];
	    $oldimg = $this->mainmodel->fetch_rec_by_args('category', $args);
	     $data  = [];
		$data['validation'] = null;
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'categoryname'        => 'required',
			];
			if($this->validate($rules)){
				// $avatar = $oldimg[0]->photo;
				// $img = $this->request->getFile('avatar');
				// if ($img !== null) {
				// 	if ($img->isValid() &&  !$img->hasMoved()) {
				// 	 	$newName = $img->getRandomName();
				// 	 	$img->move('./public/uploads/categoryimg', $newName); 
	   //             	$avatar  = $img->getName();
				// 	}
				// }
				$data = [
					'categoryname'     => $this->request->getVar('categoryname',FILTER_SANITIZE_STRING),
					'desctiption'  => $this->request->getVar('desctiption',FILTER_SANITIZE_STRING),
					//'photo'           => $avatar,
					'status'          => 'Active',
					'added_date'      => date('Y-m-d h:i:s'),
					'Year'            => date('Y')
				];
				$status = $this->mainmodel->update_rec_by_args('category', $args, $data);
				if ($status == true) {
					$this->session->setTempdata('success', ' Records Added Successfully', 3);
				}else{
					$this->session->setTempdata('error', 'Sorry ! Unable to Add  Records ?', 3);
				}
				return redirect()->to(base_url().'/Admin/managecategory');    
			}else{
				$data['validation'] = $this->validator;
			}
			$data['editcate'] = $this->mainmodel->fetch_rec_by_args('category', $args);
    	    return view('admin/editcate', $data);
		}
	    
	}
	
	public function addproducts(){
	    $args = [ 'status' => 'Active' ];
	    $data['category'] = $this->mainmodel->fetch_rec_by_args('category', $args);
	    return view('admin/products/addproducts', $data);
	}
	
	public function uploadproduct(){
	    $data  = [];
		$data['validation'] = null;
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'categoryname' => 'required',
				'productname'  => 'required',
				'mrpprice'     => 'required',
				'stock'        => 'required',
				'SKU'          => 'required',
				'desctiption'  => 'required',
			];
			if($this->validate($rules)){
				$avatar = 'NotUploded';
				$img = $this->request->getFile('avatar');
				if ($img !== null) {
					if ($img->isValid() &&  !$img->hasMoved()) {
					 	$newName = $img->getRandomName();
					 	$img->move('./public/uploads/productimg', $newName); 
	                	$avatar  = $img->getName();
					}
				}
				$data = [
					'category_id'  => $this->request->getVar('categoryname',FILTER_SANITIZE_STRING),
					'productname'  => $this->request->getVar('productname',FILTER_SANITIZE_STRING),
					'mrpprice'     => $this->request->getVar('mrpprice',FILTER_SANITIZE_STRING),
					'price'        => $this->request->getVar('price',FILTER_SANITIZE_STRING),
					'stock'        => $this->request->getVar('stock',FILTER_SANITIZE_STRING),
					'desctiption'  => $this->request->getVar('desctiption',FILTER_SANITIZE_STRING),
					'longdesc'     => $this->request->getVar('longdesc',FILTER_SANITIZE_STRING),
					'SKU'          => $this->request->getVar('SKU',FILTER_SANITIZE_STRING),
					'photo'        => $avatar,
					'status'       => 'Active',
					'added_date'   => date('Y-m-d h:i:s'),
					'Year'         => date('Y')
				];
				$status = $this->mainmodel->Insertdata_return_id('products',$data);
				if ($status == true) {
				    $proimg = $this->request->getFile('productimage');
    			    if ($this->request->getFileMultiple('productimage')) {
    			        foreach($this->request->getFileMultiple('productimage') as $file){   
                         //$file->move(WRITEPATH . 'uploads');
                         $newName = $file->getRandomName();
					 	$file->move('./public/uploads/productimg', $newName);
                        $data = [
                            'product_id'   => $status,
                            'productimage' => $file->getClientName(),
                            'type'         => $file->getClientMimeType()
                          ];
             
                         $this->mainmodel->Insertdata('products_image',$data);
                         }
    			    }
					$this->session->setTempdata('success', ' Records Added Successfully', 3);
				}else{
					$this->session->setTempdata('error', 'Sorry ! Unable to Add  Records ?', 3);
				}
				return redirect()->to(base_url().'/Admin/addproducts');    
			}else{
				$data['validation'] = $this->validator;
			}
			$args = [ 'status' => 'Active' ];
	        $data['category'] = $this->mainmodel->fetch_rec_by_args('category', $args);
	        return view('admin/products/addproducts', $data);
		}
	}
	
	public function manageproducts(){
	    $data['products'] = $this->mainmodel->fetch_all_records('products');
	    return view('admin/products/manageproducts', $data);
	}
	
	public function changeprostatus($id, $status){
	    $args = [ 'id'  => $id ];
	    $data = [ 'status'  => $status ];
	   $status = $this->mainmodel->update_rec_by_args('products', $args, $data);
	   if ($status == true) {
			$this->session->setTempdata('success', 'Records Change Successfully!', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Change  Records?', 3);
		}
		return redirect()->to(base_url().'/Admin/manageproducts');
	}
	
	public function deletproducts($id){
	    $args = [ 'id'  => $id ];
	    $status = $this->mainmodel->delete_records('products', $args);
	    if ($status == true) {
			$this->session->setTempdata('success', 'Records Deleted Successfully!', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Delete  Records?', 3);
		}
		return redirect()->to(base_url().'/Admin/manageproducts');
	}
	
	public function editproducts($id){
	    $args = ['id'  => $id];
	    $data['editpro'] = $this->mainmodel->fetch_rec_by_args('products', $args);
	    $args = [ 'status' => 'Active' ];
	    $data['category'] = $this->mainmodel->fetch_rec_by_args('category', $args);
	    return view('admin/products/editproducts', $data);
	}
	
	public function updateproducts($id){
	    $args = ['id' => $id];
	    $oldimage = $this->mainmodel->fetch_rec_by_args('products', $args);
	     $data  = [];
		$data['validation'] = null;
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'categoryname' => 'required',
				'productname'  => 'required',
				'mrpprice'     => 'required',
				'stock'        => 'required',
				'desctiption'  => 'required',
			];
			if($this->validate($rules)){
			    $avatar = $oldimage[0]->photo;
				$img = $this->request->getFile('avatar');
				if ($img !== null) {
					if ($img->isValid() &&  !$img->hasMoved()) {
					 	$newName = $img->getRandomName();
					 	$img->move('./public/uploads/productimg', $newName); 
	                	$avatar  = $img->getName();
					}
				}
				$data = [
					'category_id'  => $this->request->getVar('categoryname',FILTER_SANITIZE_STRING),
					'productname'  => $this->request->getVar('productname',FILTER_SANITIZE_STRING),
					'mrpprice'     => $this->request->getVar('mrpprice',FILTER_SANITIZE_STRING),
					'price'        => $this->request->getVar('price',FILTER_SANITIZE_STRING),
					'stock'        => $this->request->getVar('stock',FILTER_SANITIZE_STRING),
					'desctiption'  => $this->request->getVar('desctiption',FILTER_SANITIZE_STRING),
					'longdesc'     => $this->request->getVar('longdesc',FILTER_SANITIZE_STRING),
					'photo'        => $avatar,
					'status'       => 'Active',
					'added_date'   => date('Y-m-d h:i:s'),
					'Year'         => date('Y')
				];
				$status =$this->mainmodel->update_rec_by_args('products', $args, $data);
				if ($status == true) {
					$this->session->setTempdata('success', ' Records Updated Successfully', 3);
				}else{
					$this->session->setTempdata('error', 'Sorry ! Unable to Update  Records ?', 3);
				}
				return redirect()->to(base_url().'/Admin/manageproducts');    
			}else{
				$data['validation'] = $this->validator;
			}
			 $args = ['id'  => $id];
    	    $data['editpro'] = $this->mainmodel->fetch_rec_by_args('products', $args);
    	    $args = [ 'status' => 'Active' ];
    	    $data['category'] = $this->mainmodel->fetch_rec_by_args('category', $args);
    	    return view('admin/products/editproducts', $data);
		}
	}
	
	public function manageorders(){
	   $data = [
			'orders' => $this->ordermodel->fetch_all_records('orders'),
			'pager'  => $this->ordermodel->pager
		];
	   return view('admin/orders/manageorders', $data);
	}
	
	public function searchorder(){
	    $keyword = $this->request->getVar('order_id', FILTER_SANITIZE_STRING);
		
		if ($keyword) {
		 	$result = $this->ordermodel->searchorder($keyword);
		}else{
		 	$result = $this->ordermodel;
		}
		$data = [
            'orders' => $this->ordermodel->fetch_all_records('orders'),
            'pager'  => $this->ordermodel->pager
        ];
	    return view('admin/orders/manageorders', $data);
	}
	
	
	
	public function vieworder($order_id){
	    $args = [ 'order_id'  => $order_id ];
	    $data['orders'] = $this->mainmodel->fetch_rec_by_args('orders', $args);
	    $data['order_details'] = $this->mainmodel->fetch_rec_by_args('order_details', $args);
	    return view('admin/orders/vieworder', $data);
	}
	
	public function changeorder($order_id){
	    $args = ['order_id'  => $order_id];
	    $ord_pro = $this->mainmodel->fetch_rec_by_args('order_details', $args);
	    $order  = $this->request->getVar('orderstatus',FILTER_SANITIZE_STRING);
	   
	    $data = ['order_status' => $order];
	    $status = $this->mainmodel->update_rec_by_args('orders', $args, $data);
	    
	     $rdata = ['ord_status' => $order];
	    $status = $this->mainmodel->update_rec_by_args('order_details', $args, $rdata);
	    
	    if($order == "Delivered"){
	        foreach($ord_pro as $ord){
	            $args = [ 'id' => $ord->product_id ];
	           $products = $this->mainmodel->fetch_rec_by_args('products', $args);
	           $minus_stock = $products[0]->stock - $ord->qty; 
	           $data = [ 'stock' => $minus_stock ];
	           $status =$this->mainmodel->update_rec_by_args('products', $args, $data);         
	        }
	    }
	   	$this->session->setTempdata('success', 'Order Status Updated Successfully!', 3);
		return redirect()->to(base_url().'/Admin/manageorders');
	}
	
	public function orderinvoice($order_id){
	    $args = [ 'order_id'  => $order_id ];
	    $data['orders'] = $this->mainmodel->fetch_rec_by_args('orders', $args);
	    $data['order_details'] = $this->mainmodel->fetch_rec_by_args('order_details', $args);
	    return view('admin/orders/orderinvoice', $data);
	}
	
	public function customers(){
	    $data = [
			'customer' => $this->customermodel->fetch_all_records('customer'),
			'pager'  => $this->customermodel->pager
		];
	    return view('admin/customer/customer_list', $data);
	}
	
	public function changecustomer($id, $status){
	    $args = [ 'id'  => $id ];
	    $data = [ 'status'  => $status ];
	   $status = $this->mainmodel->update_rec_by_args('customer', $args, $data);
	   if ($status == true) {
			$this->session->setTempdata('success', 'Records Change Successfully!', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Change  Records?', 3);
		}
		return redirect()->to(base_url().'/Admin/customers');
	}
	
	public function adddepartment(){
	    return view('admin/appointment/adddepartment');
	}
	
	public function uploaddepartment(){
	      $data  = [];
		$data['validation'] = null;
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'departmentname'        => 'required|is_unique[department.departmentname]',
			];
			if($this->validate($rules)){
				$avatar = 'NotUploded';
				$img = $this->request->getFile('avatar');
				if ($img !== null) {
					if ($img->isValid() &&  !$img->hasMoved()) {
					 	$newName = $img->getRandomName();
					 	$img->move('./public/uploads/department', $newName); 
	                	$avatar  = $img->getName();
					}
				}
				$data = [
					'departmentname'  => $this->request->getVar('departmentname',FILTER_SANITIZE_STRING),
					'desctiption'     => $this->request->getVar('desctiption',FILTER_SANITIZE_STRING),
					'photo'           => $avatar,
					'status'          => 'Active',
					'added_date'      => date('Y-m-d h:i:s'),
					'Year'            => date('Y')
				];
				$status = $this->mainmodel->Insertdata('department',$data);
				if ($status == true) {
					$this->session->setTempdata('success', ' Records Added Successfully', 3);
				}else{
					$this->session->setTempdata('error', 'Sorry ! Unable to Add  Records ?', 3);
				}
				return redirect()->to(base_url().'/Admin/adddepartment');    
			}else{
				$data['validation'] = $this->validator;
			}
			return view('admin/appointment/adddepartment');
		}
	}
	
	public function managedepartment(){
	    $data['department'] = $this->mainmodel->fetch_all_records('department');
	    return view('admin/appointment/managedepartment', $data);
	}
	
	public function deletedepart($id){
	    $args = [ 'id'  => $id ];
	    $status = $this->mainmodel->delete_records('department', $args);
	    if ($status == true) {
			$this->session->setTempdata('success', 'Records Deleted Successfully!', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Delete  Records?', 3);
		}
		return redirect()->to(base_url().'/Admin/managedepartment');
	}
	
	public function editdepartment($id){
	    $args = ['id' => $id];
	    $data['editcate'] = $this->mainmodel->fetch_rec_by_args('department', $args);
	    return view('admin/appointment/editdepartment', $data);
	}
	public function updatedeprt($id){
	    $args = ['id'=> $id];
	    $oldimg = $this->mainmodel->fetch_rec_by_args('department', $args);
	     $data  = [];
		$data['validation'] = null;
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'departmentname'        => 'required',
			];
			if($this->validate($rules)){
				$avatar = $oldimg[0]->photo;
				$img = $this->request->getFile('avatar');
				if ($img !== null) {
					if ($img->isValid() &&  !$img->hasMoved()) {
					 	$newName = $img->getRandomName();
					 	$img->move('./public/uploads/categoryimg', $newName); 
	                	$avatar  = $img->getName();
					}
				}
				$data = [
					'departmentname'  => $this->request->getVar('departmentname',FILTER_SANITIZE_STRING),
					'desctiption'     => $this->request->getVar('desctiption',FILTER_SANITIZE_STRING),
					'photo'           => $avatar,
					'status'          => 'Active',
					'added_date'      => date('Y-m-d h:i:s'),
					'Year'            => date('Y')
				];
				$status = $this->mainmodel->update_rec_by_args('department', $args, $data);
				if ($status == true) {
					$this->session->setTempdata('success', ' Records Updated Successfully', 3);
				}else{
					$this->session->setTempdata('error', 'Sorry ! Unable to Update  Records ?', 3);
				}
				return redirect()->to(base_url().'/Admin/managedepartment');    
			}else{
				$data['validation'] = $this->validator;
			}
			$data['editcate'] = $this->mainmodel->fetch_rec_by_args('department', $args);
    	    return view('admin/appointment/editdepartment', $data);
		}
	}
	
	public function staff(){
	    $args = ['status' => 'Active'];
	    $data['department'] = $this->mainmodel->fetch_rec_by_args('department', $args);
	    return view('admin/appointment/staff', $data);
	}
	
	public function uploadstaff(){
	    $data  = [];
		$data['validation'] = null;
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'department'        => 'required',
				'name'              => 'required',
				'mobile'            => 'required|numeric|exact_length[8]',
				'email'             => 'required|valid_email',
			];
			if($this->validate($rules)){
				$avatar = 'NotUploded';
				$img = $this->request->getFile('avatar');
				if ($img !== null) {
					if ($img->isValid() &&  !$img->hasMoved()) {
					 	$newName = $img->getRandomName();
					 	$img->move('./public/uploads/staff', $newName); 
	                	$avatar  = $img->getName();
					}
				}
				$user_id = rand(2222222, 8888888);
				$data = [
				    'user_id'         => $user_id,
					'department_id'   => $this->request->getVar('department',FILTER_SANITIZE_STRING),
					'name'            => $this->request->getVar('name',FILTER_SANITIZE_STRING),
					'mobile'          => $this->request->getVar('mobile',FILTER_SANITIZE_STRING),
					'email'           => $this->request->getVar('email',FILTER_SANITIZE_STRING),
					'Speciality'      => $this->request->getVar('Speciality',FILTER_SANITIZE_STRING),
					'fee'             => $this->request->getVar('fee',FILTER_SANITIZE_STRING),
					'photo'           => $avatar,
					'staff_status'    => 'Active',
					'added_date'      => date('Y-m-d h:i:s'),
					'Year'            => date('Y')
				];
				$status = $this->mainmodel->Insertdata('staff_member',$data);
				if ($status == true) {
					$this->session->setTempdata('success', ' Records Added Successfully', 3);
				}else{
					$this->session->setTempdata('error', 'Sorry ! Unable to Add  Records ?', 3);
				}
				return redirect()->to(base_url().'/Admin/managestaff');    
			}else{
				$data['validation'] = $this->validator;
			}
			$args = ['status' => 'Active'];
    	    $data['department'] = $this->mainmodel->fetch_rec_by_args('department', $args);
    	    return view('admin/appointment/staff', $data);
		}
	}
	
	public function managestaff(){
	    $data['staff'] = $this->mainmodel->fetch_all_records_with_dept_join('staff_member');
	    return view('admin/appointment/managestaff', $data);
	}
	
	public function changestaffstatus($id, $status, $identity){
	   $args = [ 'id'  => $id ];
	    $data = [ 'staff_status'  => $status, 'identity'=>$identity ];
	   $status = $this->mainmodel->update_rec_by_args('staff_member', $args, $data);
	   if ($status == true) {
			$this->session->setTempdata('success', 'Records Change Successfully!', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Change  Records?', 3);
		}
		return redirect()->to(base_url().'/Admin/managestaff');
	}
	
	public function leavealldoctros(){
	   $args = [ 'leaveid'  => '1','identity'=>0 ];
	    $data = [ 'staff_status'  => 'InActive' ];
	   $status = $this->mainmodel->update_rec_by_args('staff_member', $args, $data);
	   $this->session->setTempdata('success', 'Records Change Successfully!', 3);
	    return redirect()->to(base_url().'/Admin/managestaff'); 
	}
	
	public function activealldoctors(){
	   $args = [ 'leaveid'  => '1','identity'=>0 ];
	   $data = [ 'staff_status'  => 'Active' ];
	   $status = $this->mainmodel->update_rec_by_args('staff_member', $args, $data);
	   $this->session->setTempdata('success', 'Records Change Successfully!', 3);
	    return redirect()->to(base_url().'/Admin/managestaff');  
	}
	
	public function editstaff($id){
	    $args =['id'=> $id];
	    $data['editstaff'] = $this->mainmodel->fetch_rec_by_args('staff_member', $args);
	    $args = ['status' => 'Active'];
    	$data['department'] = $this->mainmodel->fetch_rec_by_args('department', $args);
	    return view('admin/appointment/editstaff', $data);
	}
	
	public function updatestaff($id){
	    $args = ['id' => $id];
	    $oldimage = $this->mainmodel->fetch_rec_by_args('staff_member', $args);
	    $data  = [];
		$data['validation'] = null;
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'department'        => 'required',
				'name'              => 'required',
				'mobile'            => 'required|numeric|exact_length[8]',
				'email'             => 'required|valid_email',
			];
			if($this->validate($rules)){
				$avatar = $oldimage[0]->photo;
				$img = $this->request->getFile('avatar');
				if ($img !== null) {
					if ($img->isValid() &&  !$img->hasMoved()) {
					 	$newName = $img->getRandomName();
					 	$img->move('./public/uploads/staff', $newName); 
	                	$avatar  = $img->getName();
					}
				}
				$user_id = rand(2222222, 8888888);
				$data = [
				    'user_id'         => $user_id,
					'department_id'   => $this->request->getVar('department',FILTER_SANITIZE_STRING),
					'name'            => $this->request->getVar('name',FILTER_SANITIZE_STRING),
					'mobile'          => $this->request->getVar('mobile',FILTER_SANITIZE_STRING),
					'email'           => $this->request->getVar('email',FILTER_SANITIZE_STRING),
					'Speciality'      => $this->request->getVar('Speciality',FILTER_SANITIZE_STRING),
					'fee'             => $this->request->getVar('fee',FILTER_SANITIZE_STRING),
					'photo'           => $avatar,
					'staff_status'    => 'Active',
					'added_date'      => date('Y-m-d h:i:s'),
					'Year'            => date('Y')
				];
				$status = $this->mainmodel->update_rec_by_args('staff_member', $args, $data);
				if ($status == true) {
					$this->session->setTempdata('success', ' Records Updated Successfully', 3);
				}else{
					$this->session->setTempdata('error', 'Sorry ! Unable to Update  Records ?', 3);
				}
				return redirect()->to(base_url().'/Admin/managestaff');    
			}else{
				$data['validation'] = $this->validator;
			}
			$args =['id'=> $id];
    	    $data['editstaff'] = $this->mainmodel->fetch_rec_by_args('staff_member', $args);
    	    $args = ['status' => 'Active'];
        	$data['department'] = $this->mainmodel->fetch_rec_by_args('department', $args);
    	    return view('admin/appointment/editstaff', $data);
		}
	}
	
	public function deletestaff($id){
	    $args = ['id'  => $id];
	    $status = $this->mainmodel->delete_records('staff_member', $args);
	    if ($status == true) {
			$this->session->setTempdata('success', 'Records Deleted Successfully!', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Delete  Records?', 3);
		}
		return redirect()->to(base_url().'/Admin/managestaff');
	}
	
	
	public function apmntsettings(){
	    $args = ['staff_status' => 'Active'];
	    $data['doctor'] = $this->mainmodel->fetch_rec_by_args('staff_member', $args);
	    $data['staff'] = $this->mainmodel->fetchrec_by_schdl_join('doc_schedule');
	    return view('admin/appointment/apmntsettings', $data);
	}
	
	public function get_doctor_department($id){
	    $args = ['staff_member.id'  => $id];
	    $data = $this->mainmodel->fetch_rec_by_args_with_dept_join('staff_member', $args);
	    echo json_encode($data);
	}
	
    public function docsettingperiod(){
	    $data = [];
		$data['validation'] = null;
		$jsonArr = array();
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'doctor'       => 'required',
			];
			if ($this->validate($rules)) {
			    $breaktime =  $this->request->getVar('breaktime',FILTER_SANITIZE_STRING);
			    $breakendtime =  $this->request->getVar('breakendtime',FILTER_SANITIZE_STRING);
			    $period = $this->request->getVar('period',FILTER_SANITIZE_STRING);
			    $doctor_id = $this->request->getVar('doctor',FILTER_SANITIZE_STRING);
                $cargs = [
			    	'doctor_id'       => $doctor_id, 
			    	'givenperiod'     => $period 
				];
			    $checkdoc = $this->mainmodel->fetch_rec_by_args('doc_schedule',$cargs);
			    if ($checkdoc) {
			    	$upargs = [
			    		'doctor_id'       => $doctor_id, 
			    		'givenperiod'     => $period 
			    	];
			    	$updata = [
			    		'doctor_id'       => $doctor_id,
				        'givenperiod'     => $period,
				        //'apmt_start_time' => $starttime,
				        'break_time'      => $breaktime,
				        'breakendtime'    => $breakendtime,
				        //'endtime'         => $endtime,
				        'status'          => 'Active',
				        'added_date'      => date('y-m-d h:i:s') 
			    	];
			    	$this->mainmodel->update_rec_by_args('doc_schedule', $upargs, $updata);
			    	 $schedule_id = $checkdoc[0]->id;
			    }else{
			    	 $data = [
				        'doctor_id'       => $doctor_id,
					    'givenperiod'     => $period,
					    //'apmt_start_time' => $starttime,
					    'break_time'      => $breaktime,
					    'breakendtime'    => $breakendtime,
					    //'endtime'         => $endtime,
					    'status'          => 'Active',
					    'added_date'      => date('y-m-d h:i:s') 
				    ];
				    $schedule_id = $this->mainmodel->Insertdata_return_id('doc_schedule', $data);
			    }
			    $attributeArr = $this->request->getVar('perioddate',FILTER_SANITIZE_STRING);
				$periodArr     = $this->request->getVar('periodtime',FILTER_SANITIZE_STRING);
				$endtimeArr     = $this->request->getVar('endtime',FILTER_SANITIZE_STRING);
				foreach ($attributeArr as $key => $val) {
					if($val>= date('Y-m-d')){
    				        $args = [
        						'givendate'  => $val,
        						'doctor_id'  => $doctor_id,
        					];
    					$checkappointment = $this->mainmodel->fetch_rec_by_args('doc_schedule_list', $args);
    					if ($checkappointment) {
    						$jsonArr = array('is_error' => 'yes',  'dd'=>'Doctor Schedule Already Assign');
    					}else{
    						$data = [
    				            'givendate'   => $val,
    				            'giventime'   => $periodArr[$key],
    				            'doctor_id'   => $doctor_id,
    				            'endtime'     => $endtimeArr[$key],
    				            'givenperiod' => $period,
    				            'schedule_id' => $schedule_id,
    				            'status'      => 'Active',
    				            'added_date'  => date('y-m-d h:i:s')
    				        ];
    				    $schedlist_id = $this->mainmodel->Insertdata_return_id('doc_schedule_list', $data);

    				    //Appointment New Slot 



    				    //Appointment Date Vise 
    				    	$start = $periodArr[$key];
                        	$end   = $endtimeArr[$key];
                        	$interval = $period .'minutes';
                        	$break = [$breaktime, $breakendtime];

                        	 $time_slots = array();
							  $start_time = strtotime($periodArr[$key]);
							  $end_time = strtotime($endtimeArr[$key]);

							  $add_mins  = $period * 60;

							  while ($start_time <= $end_time)
							  {
							    $time_slots[] = date("H:i", $start_time);
							    $start_time += $add_mins;
							  }

							  $time_slots = array_diff( $time_slots, $break );

  //return $time_slots;


                        
                            // $interval = DateInterval::createFromDateString($interval);
                            // $rounding_interval = $interval->i * 60;
                            // $date = new DateTime(
                            //     date('Y-m-d H:i', round(strtotime($start) / $rounding_interval) * $rounding_interval)
                            // );
                            // $end = new DateTime(
                            //     date('Y-m-d H:i', round(strtotime($end) / $rounding_interval) * $rounding_interval)
                            // );
                        
                            // $opts = array();
                            // while ($date < $end) {
                            //     $data = $date->format('H:i');
                            //     $opts[] = $data;
                            //     $date->add($interval);
                            // }
                            
                            foreach ($time_slots as $op) {
                                $data = [
                                    'doctor_id'  => $doctor_id,
                                    'start_time' => $periodArr[$key],
                                    'break_time' => $breaktime,
                                    'breakendtime' => $breakendtime,
                                    'booking_date' => $val,
                                    'book_strtime' => $periodArr[$key],
                                    'schedule_id' => $schedule_id,
                                    'schedule_list_id' => $schedlist_id,
                                    'schedule_time' => $op,
                                    'status'        => 'Available'
                                ];
                                $this->mainmodel->Insertdata('apmnt_day_vise_sch', $data);
                            }
                            $jsonArr = array('is_error' => 'no',  'dd'=>'Doctor Schedule Added');
    					}
    				    //Appointment Date Vise 
				         
				     }else{
					    $jsonArr = array('is_error' => 'yes',  'dd'=>'You are selected old date Please Select Current date');
					}
			    }
			}else{
				$data['validation'] = $this->validator;
				$jsonArr = array('is_error' => 'yes',  'dd'=>'Doctor name field is required');
			}
		}
		echo json_encode($jsonArr);
	}
	
	public function view_doc_sch_details($doc_id){
	    $args = ['schedule_id' => $doc_id];
	    $data['data'] = $this->mainmodel->fetch_schd_dtl_join('doc_schedule_list', $args);
	    return view('admin/appointment/view_doc_sch_details', $data);
	}
	
	public function changedocschdulests($id, $status){
	    if($status == "Active"){
	        $sch_status = "Available";
	    }else{
	        $sch_status = "UnAvailable";
	    }
	    $args = ['id' => $id];
	    $data = ['status' => $status];
	    $status = $this->mainmodel->update_rec_by_args('doc_schedule_list', $args, $data);
	    
	    $sargs = ['schedule_list_id' => $id];
	    $sdata = ['status' => $sch_status];
	    $status = $this->mainmodel->update_rec_by_args('apmnt_day_vise_sch', $sargs, $sdata);
	    $this->session->setTempdata('success', 'Records Change Successfully!', 3);
		return redirect()->to(base_url().'/Admin/apmntsettings');
	}
	
    public function editschedule($id){
	    $args = ['schedule_id'=> $id];
	    $data['scheduel'] = $this->mainmodel->fetch_rec_by_args('doc_schedule_list', $args);
	    $args = ['staff_status' => 'Active'];
	    $data['doctor'] = $this->mainmodel->fetch_rec_by_args('staff_member', $args);
	    if(!$data['scheduel']){
	        $this->session->setTempdata('error', 'Sorry ! Unable to View  Record Not Found?', 3);
	        return redirect()->to(base_url().'/Admin/apmntsettings');
	    }else{
	        return view('admin/appointment/editschedule', $data);
	    }
	}
	
	public function deleteoldschedule($id){
	    $args = ['id'=> $id];
	    $status = $this->mainmodel->delete_records('doc_schedule_list', $args);
        $args = ['schedule_list_id'=> $id];
	    $status = $this->mainmodel->delete_records('apmnt_day_vise_sch', $args);
		$jsonArr = array();
		$jsonArr = array('is_error' => 'no',  'dd'=> 'Redcord deleted Successfully');
		echo json_encode($jsonArr);
	}
	
	public function updatedoctorschedule($keysched_id){
	    $data = [];
		$data['validation'] = null;
		$jsonArr = array();
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'doctor'       => 'required',
			];
			if ($this->validate($rules)) {
			    $breaktime =  $this->request->getVar('breaktime',FILTER_SANITIZE_STRING);
			    $breakendtime =  $this->request->getVar('breakendtime',FILTER_SANITIZE_STRING);
			    $period = $this->request->getVar('period',FILTER_SANITIZE_STRING);
			    $doctor_id = $this->request->getVar('doctor',FILTER_SANITIZE_STRING);
                $cargs = [
			    	'doctor_id'       => $doctor_id, 
			    	'givenperiod'     => $period 
				];
			    $checkdoc = $this->mainmodel->fetch_rec_by_args('doc_schedule',$cargs);
			    if ($checkdoc) {
			    	$upargs = [
			    		'doctor_id'       => $doctor_id, 
			    		'givenperiod'     => $period 
			    	];
			    	$updata = [
			    		'doctor_id'       => $doctor_id,
				        'givenperiod'     => $period,
				        'break_time'      => $breaktime,
				        'breakendtime'    => $breakendtime,
				        'status'          => 'Active',
				        'added_date'      => date('y-m-d h:i:s') 
			    	];
			    	$this->mainmodel->update_rec_by_args('doc_schedule', $upargs, $updata);
			    	$schedule_id = $checkdoc[0]->id;
			    }else{
			    	$data = [
				        'doctor_id'       => $doctor_id,
					    'givenperiod'     => $period,
					    'break_time'      => $breaktime,
					    'breakendtime'    => $breakendtime,
					    'status'          => 'Active',
					    'added_date'      => date('y-m-d h:i:s') 
				    ];
				    $schedule_id = $this->mainmodel->Insertdata_return_id('doc_schedule', $data);
			    }
			    $attributeArr   = $this->request->getVar('perioddate',FILTER_SANITIZE_STRING);
				$schedule_idArr      = $this->request->getVar('schedule_idARR',FILTER_SANITIZE_STRING);
				$periodArr      = $this->request->getVar('periodtime',FILTER_SANITIZE_STRING);
				$endtimeArr     = $this->request->getVar('endtime',FILTER_SANITIZE_STRING);
				$apmntshcduleIDArr     = $this->request->getVar('appointment_schedule_id',FILTER_SANITIZE_STRING);
				

				for ($i=0; $i < count($schedule_idArr); $i++) { 
					$args = [
						'id'  => $schedule_idArr[$i]
					];

					$data = [
						'givendate'   => $attributeArr[$i],
	    				'giventime'   => $periodArr[$i],
	    				'doctor_id'   => $doctor_id,
	    				'endtime'     => $endtimeArr[$i],
	    				'givenperiod' => $period,
	    				'schedule_id' => $keysched_id,
					];
					$this->mainmodel->update_rec_by_args('doc_schedule_list',$args, $data);


					//Appointment Schedule Update  Logic 
					//Appointment Date Vise 

					$args = [
						'schedule_list_id' => $schedule_idArr[$i]
					];
					$this->mainmodel->delete_records('apmnt_day_vise_sch', $args);

			    	// $start = $periodArr[$i];
        //         	$end   = $endtimeArr[$i];
        //         	$interval = $period .'minutes';
                
        //             $interval = DateInterval::createFromDateString($interval);
        //             $rounding_interval = $interval->i * 60;
        //             $date = new DateTime(
        //                 date('Y-m-d H:i', round(strtotime($start) / $rounding_interval) * $rounding_interval)
        //             );
        //             $end = new DateTime(
        //                 date('Y-m-d H:i', round(strtotime($end) / $rounding_interval) * $rounding_interval)
        //             );
                
        //             $opts = array();
        //             while ($date < $end) {
        //                 $data = $date->format('H:i');
        //                 $opts[] = $data;
        //                 $date->add($interval);
        //             }


					$start = $periodArr[$i];
                	$end   = $endtimeArr[$i];
                	$interval = $period .'minutes';
                	$break = [$breaktime, $breakendtime];

                	 $time_slots = array();
					  $start_time = strtotime($periodArr[$i]);
					  $end_time = strtotime($endtimeArr[$i]);

					  $add_mins  = $period * 60;

					  while ($start_time <= $end_time)
					  {
					    $time_slots[] = date("H:i", $start_time);
					    $start_time += $add_mins;
					  }

					  $time_slots = array_diff( $time_slots, $break );
                    
                    foreach ($time_slots as $op) {
                        $data = [
                            'doctor_id'  => $doctor_id,
                            'start_time' => $periodArr[$i],
                            'break_time' => $breaktime,
                            'breakendtime' => $breakendtime,
                            'booking_date' => $attributeArr[$i],
                            'book_strtime' => $periodArr[$i],
                            'schedule_id' => $schedule_id,
                            'schedule_list_id'=> $schedule_idArr[$i],
                            'schedule_time' => $op,
                            'status'        => 'Available'
                        ];
                        $this->mainmodel->Insertdata('apmnt_day_vise_sch', $data);
                    }
					//Appointment Schedule Update  Logic 
				}
			
			    $jsonArr = array('is_error' => 'no',  'dd'=>'Doctor Schedule Updated');
			}else{
				$data['validation'] = $this->validator;
				$jsonArr = array('is_error' => 'yes',  'dd'=>'Doctor name field is required');
			}
		}
		echo json_encode($jsonArr);
	}
	
	
	
	
	
// 	public function editschduleonelst($id){
// 	    $args = ['id' => $id];
// 	    $data['schdule'] = $this->mainmodel->fetch_rec_by_args('doc_schedule_list', $args);
// 	    return view('admin/appointment/editschduleonelst', $data);
// 	}
	
// 	public function deleteoneschdulelst($id, $doct_id =""){
// 	    $args = ['id'=> $id];
// 	    $status = $this->mainmodel->delete_records('doc_schedule_list', $args);
// 	    if ($status == true) {
// 			$this->session->setTempdata('success', 'Records Deleted Successfully!', 3);
// 		}else{
// 			$this->session->setTempdata('error', 'Sorry ! Unable to Delete  Records?', 3);
// 		}
// 		return redirect()->to(base_url().'/Admin/view_doc_sch_details/'.$doct_id);
// 	}
	
// 	public function updatesinglesch($id, $doc_id){
// 	    $args = ['id' => $id];
// 	    $data = [
// 	            'givendate'  => $this->request->getVar('schduledate',FILTER_SANITIZE_STRING),
// 	            'giventime'  => $this->request->getVar('schduletime',FILTER_SANITIZE_STRING),
// 	            'givenperiod'  => $this->request->getVar('period',FILTER_SANITIZE_STRING),
// 	        ];
//         $status = $this->mainmodel->update_rec_by_args('doc_schedule_list',$args, $data);
//         if ($status == true) {
// 			$this->session->setTempdata('success', 'Records Updated Successfully!', 3);
// 		}else{
// 			$this->session->setTempdata('error', 'Sorry ! Unable to Update  Records?', 3);
// 		}
// 		return redirect()->to(base_url().'/Admin/view_doc_sch_details/'.$doc_id);
// 	}
	
	public function deactiveallschedule($sch_id, $status){
	    if($status == "Active"){
	        $apmnt_sch_Status = "Available";
	    }else{
	        $apmnt_sch_Status = "UnAvailable";
	    }
	    
	    $schargs = [ 'id' => $sch_id ];
	    $data = [ 'status' => $status ];
	    $this->mainmodel->update_rec_by_args('doc_schedule',$schargs, $data);
	    $sechargs = [ 'schedule_id' => $sch_id ];
	    $sesdata = [ 'status' => $status ];
	    $this->mainmodel->update_rec_by_args('doc_schedule_list',$sechargs, $sesdata);
	    
	    $ampnt_srgs = ['schedule_id' => $sch_id];
	    $apmnt_data = ['status'  => $apmnt_sch_Status];
	    $this->mainmodel->update_rec_by_args('apmnt_day_vise_sch',$ampnt_srgs, $apmnt_data);
	    $this->session->setTempdata('success', 'Status Updated Successfully!', 3);
	    return redirect()->to(base_url().'/Admin/apmntsettings');
	}
	
    public function deleteallschdtl($schid){
	    $args = [ 'id'  => $schid ];
	    $this->mainmodel->delete_records('doc_schedule', $args);
	    $args = [ 'schedule_id'  => $schid ];
	    $this->mainmodel->delete_records('doc_schedule_list', $args);
	    $this->session->setTempdata('success', 'Doctor All Schedule Record Deleted Successfully!', 3);
	    return redirect()->to(base_url().'/Admin/apmntsettings');
	}
	
	public function appointment(){
	    $data = [
			'appointment' => $this->apmntmodel->fetch_all_records('appointment'),
			'pager'  => $this->apmntmodel->pager
		];
	    $args = ['staff_status' => 'Active'];
	    $data['doctor'] = $this->mainmodel->fetch_rec_by_args('staff_member', $args);
	    return view('appointment/adminappointment', $data);
	}
	
	public function searchappointment(){
	    $keyword = $this->request->getVar('appointmentid', FILTER_SANITIZE_STRING);
		
		if ($keyword) {
		 	$result = $this->apmntmodel->searchappointment($keyword);
		}else{
		 	$result = $this->apmntmodel;
		}
		$data = [
            'appointment' => $this->apmntmodel->fetch_all_records('appointment'),
            'pager'  => $this->apmntmodel->pager
        ];
	    $args = ['staff_status' => 'Active'];
	    $data['doctor'] = $this->mainmodel->fetch_rec_by_args('staff_member', $args);
	    return view('appointment/adminappointment', $data);
	}
	
	
	
	
	public function addappointment(){
	    $data  = [];
		$data['validation'] = null;
		if ($this->request->getMethod() == 'post') {
		    $avatar = 'NotUploded';
				$img = $this->request->getFile('avatar');
				if ($img !== null) {
					if ($img->isValid() &&  !$img->hasMoved()) {
					 	$newName = $img->getRandomName();
					 	$img->move('./public/uploads/appointment', $newName); 
	                	$avatar  = $img->getName();
					}
				}
			    $doc_id    = $this->request->getVar('doctor',FILTER_SANITIZE_STRING);
			    $doctorname = $this->mainmodel->fetch_rec_by_args('staff_member', ['id' =>$doc_id]);
				$sch_id    = $this->request->getVar('scheduletime',FILTER_SANITIZE_STRING);
				if(!$sch_id){
				    $this->session->setTempdata('error', 'Sorry ! UnAvailable Appointment Already Booked ?', 3);
            	    return redirect()->to(base_url().'/Admin/appointment');
				}else{
				    $args = [
                        'id'        => $sch_id,
                        'doctor_id' => $doc_id,
                        ];
    				$schedulelist = $this->mainmodel->fetch_rec_by_args('apmnt_day_vise_sch', $args);
    				$args = [
                        'doctor_id' => $doc_id,
                        'book_date' => $schedulelist[0]->booking_date,
                        'book_time' => $schedulelist[0]->schedule_time,
                        'status !=' => 'Cancel'
                        ];
                	$checkapmnt = $this->mainmodel->fetch_rec_by_args('appointment', $args);
                	if(!$checkapmnt){
                	    $appoint_uid = rand(222222,888888);
                	    $data = [
                	        'appoint_uid' => $appoint_uid,
        					'doctor_id'   => $doc_id,
        					'username'    => $this->request->getVar('name',FILTER_SANITIZE_STRING),
        					'lastname'    => $this->request->getVar('lname',FILTER_SANITIZE_STRING),
        					'phone'       => $this->request->getVar('mobile',FILTER_SANITIZE_STRING),
        					'email'       => $this->request->getVar('email',FILTER_SANITIZE_STRING),
        					'book_date'   => $schedulelist[0]->booking_date,
        					'book_time'   => $schedulelist[0]->schedule_time,
        					'message'     => $this->request->getVar('message',FILTER_SANITIZE_STRING),
        					'cashamount'     => $this->request->getVar('cashamount',FILTER_SANITIZE_STRING),
        					'reference_link' => $this->request->getVar('referencelink',FILTER_SANITIZE_STRING),
        					'photo'       => $avatar,
        					'status'      => 'Pending',
        					'booking_date'=> date('Y-m-d h:i:s'),
        					'Year'        => date('Y')
        				];
        				$status = $this->mainmodel->Insertdata('appointment',$data);
        				if($status == true){
        				    $args= [ 
        				        'doctor_id'  => $schedulelist[0]->doctor_id,
        				        'booking_date'  => $schedulelist[0]->booking_date,
        				        'schedule_time'  => $schedulelist[0]->schedule_time
        				    ];
        				     $data= [ 'status'  => 'UnAvailable' ];
        				     $this->mainmodel->update_rec_by_args('apmnt_day_vise_sch',$args, $data);
        				    
        				    
        				    //Gmail Configration
        				    $email = $this->request->getVar('email');
        				    $name  = $this->request->getVar('name',FILTER_SANITIZE_STRING);
        				    $appointment_id = $appoint_uid;
        				    $doctorname = $doctorname[0]->name;
        				    $apmnt_status = 'Pending';
        				    $scheduledate = $schedulelist[0]->booking_date;
        				    $scheduletime = $schedulelist[0]->schedule_time;
        				    
        				    $this->sendeadminappointmentbooking($email,$name,$appointment_id,$doctorname,$apmnt_status,$scheduledate,$scheduletime);
        				    
        				    
        				    //Gmail Configration
        				    
        				    
        				    
        				    
        				    $this->session->setTempdata('success', 'Appointment Book  Successfully', 3);
                		}else{
        				   	$this->session->setTempdata('error', 'Sorry ! Unable to Book Appointment ?', 3);
                		}
        			}else{
                	    $this->session->setTempdata('error', 'Sorry ! Unable to Book  Appointment Schedule Alredy Book ?', 3);
                	}
    		 $data = [
    			'appointment' => $this->apmntmodel->fetch_all_records('appointment'),
    			'pager'  => $this->apmntmodel->pager
    		];
    	    $args = ['staff_status' => 'Active'];
    	    $data['doctor'] = $this->mainmodel->fetch_rec_by_args('staff_member', $args);
    	    return view('appointment/adminappointment', $data);
		}
	}
	}
	
	
	

	
	public function deleteappointment($id){
	    $args = ['id' => $id];
	    $this->mainmodel->delete_records('appointment', $args);
	     $this->session->setTempdata('success', 'Appointment Record Deleted Successfully!', 3);
	    return redirect()->to(base_url().'/Admin/appointment');
	}
	
	public function appointmentstatus($id, $status){
	    $args = ['id' => $id];
	    $appointment = $this->mainmodel->fetch_rec_by_args('appointment', $args);
	    if($status == "Cancel"){
	        $apmargs = [
	                'doctor_id'  => $appointment[0]->doctor_id,
	                'booking_date'  => $appointment[0]->book_date,
	                'schedule_time'  => $appointment[0]->book_time,
	            ];
	            
	            $data = [ 'status' => 'Available' ];
	            $this->mainmodel->update_rec_by_args('apmnt_day_vise_sch',$apmargs, $data);
	            $email  = $appointment[0]->email; 
	            $name  = $appointment[0]->username; 
	            $appointment_id  = $appointment[0]->appoint_uid; 
	            $doctorname = "";
	            $apmnt_status = "CANCEL";
	            $scheduledate = $appointment[0]->book_date;
	            $scheduletime = $appointment[0]->book_time;
	            $this->sendeadminappointmentbooking($email,$name,$appointment_id,$doctorname,$apmnt_status,$scheduledate,$scheduletime);
        }
        if($status == "Booked"){
            $email  = $appointment[0]->email; 
	        $name  = $appointment[0]->username; 
	        $appointment_id  = $appointment[0]->appoint_uid; 
	        $doctorname = "";
	        $apmnt_status = "Booked";
	        $scheduledate = $appointment[0]->book_date;
	        $scheduletime = $appointment[0]->book_time;
	        $this->sendeadminappointmentbooking($email,$name,$appointment_id,$doctorname,$apmnt_status,$scheduledate,$scheduletime);
        }
	    $data = ['status' => $status];
	    $this->mainmodel->update_rec_by_args('appointment',$args, $data);
	     $this->session->setTempdata('success', 'Appointment Status Updated  Successfully!', 3);
	    return redirect()->to(base_url().'/Admin/appointment');
	}
	
	public function editappoinement($id){
	    $args = ['id' => $id];
	    $data['appointment'] = $this->mainmodel->fetch_rec_by_args('appointment', $args);
	    $args = ['staff_status' => 'Active'];
	    $data['doctor'] = $this->mainmodel->fetch_rec_by_args('staff_member', $args);
	    return view('appointment/editappoinement', $data);
	}
	
	public function updateappointment($id){
	      $args = ['id' => $id];
	    $oldimg = $this->mainmodel->fetch_rec_by_args('appointment', $args);
	    $data  = [];
		$data['validation'] = null;
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'doctor'       => 'required',
				'name'         => 'required',
				'mobile'       => 'required|numeric|exact_length[8]',
			];
			if($this->validate($rules)){
				$avatar = $oldimg[0]->photo;
				$img = $this->request->getFile('avatar');
				if ($img !== null) {
					if ($img->isValid() &&  !$img->hasMoved()) {
					 	$newName = $img->getRandomName();
					 	$img->move('./public/uploads/appointment', $newName); 
	                	$avatar  = $img->getName();
					}
				}

				$schargs = [
					'id'         => $this->request->getVar('scheduletime',FILTER_SANITIZE_STRING),
					'doctor_id'  => $this->request->getVar('doctor',FILTER_SANITIZE_STRING)
				];
				$schedulelist = $this->mainmodel->fetch_rec_by_args('apmnt_day_vise_sch', $schargs);
				if (isset($schedulelist[0])) {
					$booking_date = $schedulelist[0]->booking_date;
					$book_time    = $schedulelist[0]->schedule_time;
				}else{
					$booking_date = $this->request->getVar('bookdate',FILTER_SANITIZE_STRING);
					$book_time    = $this->request->getVar('scheduletime',FILTER_SANITIZE_STRING);
				}

				$data = [
					'doctor_id'   => $this->request->getVar('doctor',FILTER_SANITIZE_STRING),
					'username'    => $this->request->getVar('name',FILTER_SANITIZE_STRING),
					'phone'       => $this->request->getVar('mobile',FILTER_SANITIZE_STRING),
					'email'       => $this->request->getVar('email',FILTER_SANITIZE_STRING),
					'book_date'   => $booking_date,
        			'book_time'   => $book_time,
					'message'     => $this->request->getVar('message',FILTER_SANITIZE_STRING),
					'photo'       => $avatar,
					'booking_date'=> date('Y-m-d h:i:s'),
					'Year'        => date('Y')
				];
				$status =$this->mainmodel->update_rec_by_args('appointment',$args, $data);
				
				
				if ($status == true) {
					$args= [ 
				        'doctor_id'  => $schedulelist[0]->doctor_id,
				        'booking_date'  => $schedulelist[0]->booking_date,
				        'schedule_time'  => $schedulelist[0]->schedule_time
				    ];
				    $data= [ 'status'  => 'UnAvailable' ];
				    $this->mainmodel->update_rec_by_args('apmnt_day_vise_sch',$args, $data);
				    
				    $dargs = [ 'id' => $this->request->getVar('doctor',FILTER_SANITIZE_STRING)];
				    $doc_name = $this->mainmodel->fetch_rec_by_args('staff_member', $dargs);
				    $email = $this->request->getVar('email',FILTER_SANITIZE_STRING);
				    $name = $this->request->getVar('name',FILTER_SANITIZE_STRING);
				    $appointment_id = $oldimg[0]->appoint_uid;
				    $doctorname   = $doc_name[0]->name;
				    $apmnt_status = "PENDING";
				    $scheduledate = $schedulelist[0]->booking_date;
				    $scheduletime = $schedulelist[0]->schedule_time;
				    
				    $this->sendeadminappointmentbooking($email,$name,$appointment_id,$doctorname,$apmnt_status,$scheduledate,$scheduletime);
        			 
					$this->session->setTempdata('success', ' Records Updated Successfully', 3);
				}else{
					$this->session->setTempdata('error', 'Sorry ! Unable to Update  Records ?', 3);
				}
				return redirect()->to(base_url().'/Admin/appointment');    
			}else{
				$data['validation'] = $this->validator;
			}
			$args = ['id' => $id];
    	    $data['appointment'] = $this->mainmodel->fetch_rec_by_args('appointment', $args);
    	    $args = ['staff_status' => 'Active'];
    	    $data['doctor'] = $this->mainmodel->fetch_rec_by_args('staff_member', $args);
    	    return view('appointment/editappoinement', $data);
		}
	}
	
	public function adduser(){
	    return view('admin/user/adduser');
	}
	
	public function uploaduser(){
	     $data  = [];
		$data['validation'] = null;
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'username'        => 'required',
				'email'           => 'required|valid_email|is_unique[users.email]',
				'phone'           => 'required|numeric|exact_length[8]',
				'password'        => 'required|min_length[6]|max_length[16]',
				'confirmpassword' => 'required|matches[password]',
			];
			if($this->validate($rules)){
				$avatar = 'NotUploded';
				$img = $this->request->getFile('avatar');
				if ($img !== null) {
					if ($img->isValid() &&  !$img->hasMoved()) {
					 	$newName = $img->getRandomName();
					 	$img->move('./public/uploads/users', $newName); 
	                	$avatar  = $img->getName();
					}
				}
				$data = [
					'username'      => $this->request->getVar('username',FILTER_SANITIZE_STRING),
					'email'         => $this->request->getVar('email',FILTER_SANITIZE_STRING),
					'phone'         => $this->request->getVar('phone',FILTER_SANITIZE_STRING),
					'dummypass'     => $this->request->getVar('password',FILTER_SANITIZE_STRING),
					'address'       => $this->request->getVar('address',FILTER_SANITIZE_STRING),
					'photo'         => $avatar,
					'status'        => 'Active',
					'added_date'    => date('Y-m-d h:i:s'),
					'Year'          => date('Y')
				];
				$status = $this->mainmodel->Insertdata('users',$data);
				if ($status == true) {
				    $data = [
				            'username' => $this->request->getVar('username',FILTER_SANITIZE_STRING),
        					'email'    => $this->request->getVar('email',FILTER_SANITIZE_STRING),
        					'password' => md5($this->request->getVar('password',FILTER_SANITIZE_STRING)),
        					'photo'    => $avatar,
        					'role'     => '2',
        					'status'   => 'Active',
        					'date'     => date('Y-m-d h:i:s')
				        ];
				        $status = $this->mainmodel->Insertdata('admin_login',$data);
					$this->session->setTempdata('success', ' Records Added Successfully', 3);
				}else{
					$this->session->setTempdata('error', 'Sorry ! Unable to Add  Records ?', 3);
				}
				return redirect()->to(base_url().'/Admin/adduser');    
			}else{
				$data['validation'] = $this->validator;
			}
			return view('admin/user/adduser', $data);
		}
	}
	
	public function manageuser(){
	    $data['users'] = $this->mainmodel->fetch_all_records('users');
	    return view('admin/user/manageuser', $data);
	}
	
	public function changeuserstatus($id,$status ){
	   $args = [ 'id'  => $id ];
	   $data = [ 'status'  => $status ];
	   $status = $this->mainmodel->update_rec_by_args('users', $args, $data);
	   if ($status == true) {
			$this->session->setTempdata('success', 'Status Change Successfully!', 3);
		}else{
			$this->session->setTempdata('error', 'Sorry ! Unable to Change  Status?', 3);
		}
		return redirect()->to(base_url().'/Admin/manageuser');
	}
	
	public function deleteusers($id){
	    $args = ['id' => $id];
	    $this->mainmodel->delete_records('users', $args);
	    $this->session->setTempdata('success', 'User Record Deleted Successfully!', 3);
	    return redirect()->to(base_url().'/Admin/manageuser');
	}
	
	public function editusers($id){
	    $args = ['id' => $id];
	    $data['users'] = $this->mainmodel->fetch_rec_by_args('users', $args);
	    return view('admin/user/editusers', $data);
	}
	
	public function updateusers($id){
	    $args = ['id' => $id];
	    $users = $this->mainmodel->fetch_rec_by_args('users', $args);
	    echo "Under Construction";
	}
	
	public function leavecalander(){
	    return view('admin/appointment/leavecalander');
	}
	
	
	public function loadevent(){
		$event_data =$this->mainmodel->fetch_event('events');
		foreach($event_data as $row)
		{
			$data[] = array(
				'id'	=>	$row['id'],
				'title'	=>	$row['title'],
				'start'	=>	$row['start_event'],
				'end'	=>	$row['end_event']
			);
		}
		echo json_encode($data);
	}

	public function insertivent(){
		if ($this->request->getVar('title',FILTER_SANITIZE_STRING)) {
			$data = [
				'title'		=>	$this->request->getVar('title'),
				'start_event'=>	$this->request->getVar('start'),
				'end_event'	=>	$this->request->getVar('end')
			];
			$this->mainmodel->Insertdata('events', $data);
		}
	}

	public function updateevenets(){
		if ($this->request->getVar('id',FILTER_SANITIZE_STRING)) {
			$args = [
				'id'  => $this->request->getVar('id',FILTER_SANITIZE_STRING)
			];
			$data = [
				'title'		=>	$this->request->getVar('title'),
				'start_event'=>	$this->request->getVar('start'),
				'end_event'	=>	$this->request->getVar('end')
			];
			$this->mainmodel->update_rec_by_args('events',$args, $data);
		}
	}

	public function deleteevents(){
		if ($this->request->getVar('id',FILTER_SANITIZE_STRING)) {
			$args = [
				'id'  => $this->request->getVar('id',FILTER_SANITIZE_STRING)
			];
			$this->mainmodel->delete_records('events', $args);
		}
	}
	
	public function sendeadminappointmentbooking($email,$name,$appointment_id,$doctorname="",$apmnt_status,$scheduledate,$scheduletime){
	    $to        = $email;
		$subject   = 'Appointment Booking';
		$message   = 'Hi ' .$name.",
	    <br>Your Appointment Id. ".$appointment_id. "<br>
	    <br>You are Booked Appointment to Dr. ".$doctorname. "<br>
	    <br>Appointment Status. ".$apmnt_status. "<br>
	    <br>Your Booking <br>date is :"
		.$scheduledate."<br> Booking Time is:<b>".$scheduletime."</b>";
		$this->email->setTo($to);
		$this->email->setFrom('noreply@topwinnerkw.com', 'Topwinner');
		$this->email->setSubject($subject);
		$this->email->setMessage($message);
		$filepath = 'https://topwinnerkw.com/public/front_assets/images/1.png';
		$this->email->attach($filepath);
		$this->email->send();
	}
	
	public function payment(){
	    $args = ['Payment_status' => 'SUCCESS'];
	    $data = [
			'appointment' => $this->apmntmodel->fetch_rec_by_args('appointment', $args),
			'pager'  => $this->apmntmodel->pager
		];
	    $args = ['staff_status' => 'Active'];
	    $data['doctor'] = $this->mainmodel->fetch_rec_by_args('staff_member', $args);
	    return view('admin/appointment/payment', $data);
	}
	
	public function searchpayment(){
	    $keyword = $this->request->getVar('appointmentid', FILTER_SANITIZE_STRING);
		$args = ['Payment_status' => 'SUCCESS'];
		if ($keyword) {
		 	$result = $this->apmntmodel->searchapayment($keyword, $args);
		}else{
		 	$result = $this->apmntmodel;
		}
		$data = [
            'appointment' => $this->apmntmodel->fetch_rec_by_args('appointment', $args),
            'pager'  => $this->apmntmodel->pager
        ];
	    $args = ['staff_status' => 'Active'];
	    $data['doctor'] = $this->mainmodel->fetch_rec_by_args('staff_member', $args);
	     return view('admin/appointment/payment', $data);
	}
	
	

	



}
