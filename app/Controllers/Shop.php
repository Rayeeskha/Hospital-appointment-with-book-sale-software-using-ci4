<?php

namespace App\Controllers;

class Shop extends BaseController
{
    public function __construct(){
		$this->email = \Config\Services::email();
	}
	public function index(){
	    $args = ['status' => 'Active'];
	    $data['product'] = $this->mainmodel->fetch_rec_by_args('products', $args);
		return view('shop/index', $data);
	}

	public function productdetails($id){
	    $args = [  'id' => $id ];
	    $data['product'] = $this->mainmodel->fetch_rec_by_args('products', $args);
		return view('shop/product_details', $data);
	}
	
	public function add_to_cart($id){
	    session()->remove('CUSTOMER_SESSION_ID');
		session()->remove('ONLINE_ORDER_ID_SESSION');
		session()->remove('TOTAL_PAID_AMOUNT');
	    if ($this->session->get('session_id') == "") {
			$user_session_id  = [
				'session_id'   => rand(9999999,999999)
			];
			$this->session->set($user_session_id);
		}

		$args = [ 'id'     => $id,'status' => 'Active'];
		$pro_details = $this->mainmodel->fetch_rec_by_args('products', $args);
	

		$args = [
			'product_id'  => $id,
			'session_id'       => $this->session->get('session_id')
		];

		$check_product = $this->mainmodel->fetch_rec_by_args('cart', $args);
		if ($check_product) {
			count($check_product);
			$old_qty = $check_product[0]->qty;
			$new_qty = $old_qty + 1;
			$args = [
				'id'  => $check_product[0]->id
			];
			$data = [
				'qty'   => $new_qty
			];
			$result = $this->mainmodel->update_rec_by_args('cart', $args,$data);
			if ($result == true) {
				# code...
				echo "1";
			}else{	
				echo "0";
			}
		}else{
			
			$user_id  = session()->get('LOGIN_USER');
            if($pro_details[0]->price != null && $pro_details[0]->price != 0){
                $proprc = $pro_details[0]->price;
            }else{
                $proprc = $pro_details[0]->mrpprice;
            }
			$data = [
				'product_id'       => $pro_details[0]->id,
				'pro_price'        => $proprc,
				'mrp_price'        => $pro_details[0]->mrpprice,
				'session_id'       => $this->session->get('session_id'),
				'qty'              => '1',
				'user_id'          => $user_id,
				'added_on'         => date('Y-m-d')
			];
			$result = $this->mainmodel->Insertdata('cart',$data);
			if ($result == true) {
				# code...
				echo "1";
			}else{
				echo "0";
			}
		}
	}
	
	public function calculate_carts_products(){
	    $calculate_amount = 0;
    	$args =[ 'session_id' => $this->session->get('session_id') ];
		$products = $this->mainmodel->fetch_rec_by_args('cart', $args);
		if ($products) {
			count($products);
			foreach($products as $product){
				$calculate_amount  += ($product->pro_price * $product->qty);
			}
		}else{
			$calculate_amount = 0;
		}
		$data   = [
			'total_products'   => count($products),
			'total_amount'     => ($calculate_amount > 0) ? number_format($calculate_amount) : '0'
		];
		echo json_encode($data);
	}
	
	public function update_quantity($quantity, $type,$product_id){
		if ($type == "add") {
			$new_qty = $quantity + 1;
			$args = [
				'product_id'   => $product_id
			];
			$data = [
				'qty'  => $new_qty
			];
			$result = $this->mainmodel->update_rec_by_args('cart',$args,$data);
		}else{
			if ($quantity > 1) {
				$new_qty = $quantity - 1;
				$args = [
					'product_id'   => $product_id
				];
				$data = [
					'qty'  => $new_qty
				];
				$result = $this->mainmodel->update_rec_by_args('cart',$args,$data);
			}else{
				$result = false;
			}
			
		}
		if ($result == true) {
			# code...
			echo "1";
		}else{
			echo "0";
		}
	}
	
	public function viewcartdetails(){
	    if (!(session()->has('LOGIN_USER'))) {
			return redirect()->to(base_url()."/Login/userloginregister");
		}
	    $args = [ 'session_id'       => $this->session->get('session_id') ];
	    $data['cartdetails'] = $this->mainmodel->fetch_rec_by_args('cart', $args);
	    if(!$data['cartdetails']){
	        return redirect()->to(base_url()."/Shop/index");
	    }else{
	       return view('shop/viewcartdetails', $data); 
	    }
	}
	
	public function checkout(){
	    if (!(session()->has('LOGIN_USER'))) {
			return redirect()->to(base_url()."/Login/userloginregister");
		}
	    $args = [ 'session_id' => $this->session->get('session_id') ];
	    $data['cartdetails'] = $this->mainmodel->fetch_rec_by_args('cart', $args);
	    return view('shop/checkout', $data);
	}
	
	public function placeorder(){
	   $args = [ 'id' => $this->request->getVar('address',FILTER_SANITIZE_STRING) ];
	   $address =  $this->mainmodel->fetch_rec_by_args('shipping_address', $args);
	  
	    $args = [ 'session_id' => $this->session->get('session_id') ];
	    $products = $this->mainmodel->fetch_rec_by_args('cart', $args);

	    $payment_type = $this->request->getVar('payment_type',FILTER_SANITIZE_STRING);
	    $total_quantity = 0;
		$total_amount = 0;
		if ($products) {
			count($products);
			foreach ($products as $pro) {
				$total_quantity   += $pro->qty;
				$total_amount     += ($pro->qty * $pro->pro_price);
			}
		}else{
			$total_quantity  = 0;
		}
	    
	    $order_id = rand(2222222,9999999);
		$data = [
		        'order_id'      => $order_id,
		        'firstname'     => $address[0]->username,
		        'email'         => $address[0]->email,
		        'address'       => $address[0]->address,
		        'city'          => $address[0]->city,
		        'mobile'        => $address[0]->mobile,
		        'alternative_mobile'  => $address[0]->alternative_mobile,
		        'order_status'  => 'Pending',
		        'payment_type'  => 'COD',
		        'Payment_status'=> 'Pending',
		        'total_quantity'=> $total_quantity,
		        'total_amount'  => $total_amount,
		        'user_id'       => session()->get('LOGIN_USER_ID'),
		        'created_at' => date('y-m-d h:i:s')
		    ];
		    $status = $this->mainmodel->Insertdata('orders',$data);
		    $payment_type = 'COD';
		    $Payment_status = 'Pending';
			$this->sendorderemail($address[0]->email, $address[0]->username, $order_id, $total_quantity, $total_amount, $payment_type, $Payment_status);
			$this->order_item_details($order_id);
			return redirect()->to(base_url()."/Shop/index");
	}
	
	public function order_item_details($order_id){
	   $args = [ 'session_id' => $this->session->get('session_id') ];
	   $products = $this->mainmodel->fetch_rec_by_args('cart', $args);
	   
	   if($products){
	       $totalpro = count($products);
	   }
	   foreach($products as $pro){
	       $data = [
				'product_id'       => $pro->product_id,
				'pro_price'        => $pro->pro_price,
				'session_id'       => $this->session->get('session_id'),
				'qty'              => $pro->qty,
				'user_id'          => session()->get('LOGIN_USER_ID'),
				'order_id'         => $order_id,
				'total_order'      => $totalpro,
				'order_on'         => date('Y-m-d h:i:s')
			];
			$this->mainmodel->Insertdata('order_details',$data);
		}
		$status= $this->mainmodel->delete_records('cart', $args);
		session()->remove('session_id');
		//session()->destroy();
		return $status;
	}
	
	public function vieworder(){
	   $args = [ 'orders.user_id' => session()->get('LOGIN_USER_ID') ];
	   $data['order_details'] = $this->mainmodel->fetch_orders('orders', $args);
	    return view('shop/vieworder', $data);
	}
	
	public function cancelorder($id, $order_id = "", $status){
	    $ordargs  = ['order_id' => $order_id];
	    $countord =  $this->mainmodel->fetch_rec_by_args('order_details', $ordargs);
	    $total_ord = $countord[0]->total_order;
	    if($total_ord == 1){
	        $args = [ 'id'  => $id ];
	        $data = [  'ord_status'  => $status ];
	        $status = $this->mainmodel->update_rec_by_args('order_details', $args, $data);
	        
	        $todata = [  'total_order'  => $total_ord - 1 ];
	        $status = $this->mainmodel->update_rec_by_args('order_details', $ordargs, $todata);
	        
	        $rdata = [  'order_status'  => 'Cancel' ];
	        $status = $this->mainmodel->update_rec_by_args('orders', $ordargs, $rdata);
	    }else{
	        $args = [ 'id'  => $id ];
	        $data = [  'ord_status'  => $status ];
	        $status = $this->mainmodel->update_rec_by_args('order_details', $args, $data);
	        
	        $todata = [  'total_order'  => $total_ord - 1 ];
	        $status = $this->mainmodel->update_rec_by_args('order_details', $ordargs, $todata);
	    }
	    return redirect()->to(base_url().'/Shop/vieworder');
	}
	
	public function viewaddress(){
	   $args = [ 'user_id' => $this->session->get('LOGIN_USER_ID') ];
	   $data['address'] = $this->mainmodel->fetch_rec_by_args('shipping_address', $args);
	   return view('shop/viewaddress', $data);
	}
	
	public function onlinecheckout($address_id){
	   if (!(session()->has('LOGIN_USER'))) {
			return redirect()->to(base_url()."/Login/userloginregister");
		}
	    $args = [ 'session_id' => $this->session->get('session_id') ];
	    $cartdetails = $this->mainmodel->fetch_rec_by_args('cart', $args);
	    $customeraddsession = [ 'CUSTOMER_SESSION_ID'  => $address_id ];
		$this->session->set($customeraddsession);
		$apiURL = 'https://apitest.myfatoorah.com';
        $apiKey = 'rLtt6JWvbUHDDhsZnfpAhpYk4dxYDQkbcPTyGaKp2TYqQgG7FGZ5Th_WD53Oq8Ebz6A53njUoo1w3pjU1D4vs_ZMqFiz_j0urb_BH9Oq9VZoKFoJEDAbRZepGcQanImyYrry7Kt6MnMdgfG5jn4HngWoRdKduNNyP4kzcp3mRv7x00ahkm9LAK7ZRieg7k1PDAnBIOG3EyVSJ5kK4WLMvYr7sCwHbHcu4A5WwelxYK0GMJy37bNAarSJDFQsJ2ZvJjvMDmfWwDVFEVe_5tOomfVNt6bOg9mexbGjMrnHBnKnZR1vQbBtQieDlQepzTZMuQrSuKn-t5XZM7V6fCW7oP-uXGX-sMOajeX65JOf6XVpk29DP6ro8WTAflCDANC193yof8-f5_EYY-3hXhJj7RBXmizDpneEQDSaSz5sFk0sV5qPcARJ9zGG73vuGFyenjPPmtDtXtpx35A-BVcOSBYVIWe9kndG3nclfefjKEuZ3m4jL9Gg1h2JBvmXSMYiZtp9MR5I6pvbvylU_PP5xJFSjVTIz7IQSjcVGO41npnwIxRXNRxFOdIUHn0tjQ-7LwvEcTXyPsHXcMD8WtgBh-wxR8aKX7WPSsT1O8d8reb2aR7K3rkV3K82K_0OgawImEpwSvp9MNKynEAJQS6ZHe_J_l77652xwPNxMRTMASk1ZsJL';
        if($cartdetails){
           $total_quantity = 0;
           $total_amount=0;
            foreach($cartdetails as $pro){
                $total_quantity   += $pro->qty;
                $total_amount     += ($pro->qty * $pro->pro_price);
            }
          }

      foreach($cartdetails as $cart){
        $product = fetch_cate_rec('products', $cart->product_id);
        $invoiceItems[] = [
          'ItemName'  => $product[0]->productname, //ISBAN, or SKU
          'Quantity'  =>$cart->qty, //Item's quantity
          'UnitPrice' => $cart->pro_price, //Price per item
        ]; 

      }

      $order_id = rand(2222222,9999999);
      //Fill POST fields array
      $postFields = [
          //Fill required data
          'NotificationOption' => 'Lnk', //'SMS', 'EML', or 'ALL'
          'InvoiceValue'       => $total_amount,
          'CustomerName'       => session()->get('USER_NAME'),
              //Fill optional data
            'DisplayCurrencyIso' => 'KWD',
            'MobileCountryCode'  => '+965',
            'CustomerMobile'     => session()->get('USER_MOBILE'),
            'CustomerEmail'      => session()->get('USER_EMAIL'),
            'CallBackUrl'        => 'https://topwinnerkw.com/Shop/callback',
            'ErrorUrl'           => 'https://topwinnerkw.com/Shop/failedpayment', //or 'https://example.com/error.php'
            'Language'           => 'en', //or 'ar'
            'CustomerReference'  => $order_id,
            'CustomerCivilId'    => 'CivilId',
            'UserDefinedField'   => 'This could be string, number, or array',
            //'ExpiryDate'         => '', //The Invoice expires after 3 days by default. Use 'Y-m-d\TH:i:s' format in the 'Asia/Kuwait' time zone.
            //'SourceInfo'         => 'Pure PHP', //For example: (Laravel/Yii API Ver2.0 integration)
            //'CustomerAddress'    => $customerAddress,
            'InvoiceItems'       => $invoiceItems,
      ];

      //Call endpoint
      $data = sendPayment($apiURL, $apiKey, $postFields);

      //You can save payment data in database as per your needs
      $invoiceId   = $data->InvoiceId;
      $paymentLink = $data->InvoiceURL;

      //echo '<a href="'.$paymentLink.'"  class="btn btn-default" target="_blank">Place Order</a>';

      $add_id  = session()->get('CUSTOMER_SESSION_ID');

       $address =  $this->mainmodel->fetch_rec_by_args('shipping_address',['id' => $add_id]);
  		$data = [
		        'order_id'      => $order_id,
		        'firstname'     => $address[0]->username,
		        'email'         => $address[0]->email,
		        'address'       => $address[0]->address,
		        'city'          => $address[0]->city,
		        'mobile'        => $address[0]->mobile,
		        'alternative_mobile'  => $address[0]->alternative_mobile,
		        'Payment_type'  => 'Gatway',
		        'Payment_status'  => 'Pending',
		        'order_status'  => 'Pending',
		        'total_quantity'=> $total_quantity,
		        'total_amount'  => $total_amount,
		        'user_id'       => session()->get('LOGIN_USER_ID'),
		        'created_at' => date('y-m-d h:i:s')
		    ];
		$status = $this->mainmodel->Insertdata('orders',$data);
		
		$ORDER_ID_SESS = [ 'ONLINE_ORDER_ID_SESSION'  => $order_id ];
		$this->session->set($ORDER_ID_SESS);
		
		$totalpaidamount = [ 'TOTAL_PAID_AMOUNT'  => $total_amount ];
        $this->session->set($totalpaidamount);
      return redirect()->to($paymentLink);
    }
	
	public function savecustaddress($update =""){
	   if (!(session()->has('LOGIN_USER'))) {
			return redirect()->to(base_url()."/Login/userloginregister");
		}
	    $data = [];
	    $jsonArr = array();
		if ($this->request->getMethod() == 'post') {
		    $rules = [
				'email'     => 'required|valid_email',
			];
		if ($this->validate($rules)) {
		    $data = [
			        'username'  => $this->request->getVar('username',FILTER_SANITIZE_STRING),
			        'email'  => $this->request->getVar('email',FILTER_SANITIZE_STRING),
			        'mobile'  => $this->request->getVar('mobile',FILTER_SANITIZE_STRING),
			        'alternative_mobile'  => $this->request->getVar('alternative_mobile',FILTER_SANITIZE_STRING),
			        'city'  => $this->request->getVar('city',FILTER_SANITIZE_STRING),
			        'address'  => $this->request->getVar('address',FILTER_SANITIZE_STRING),
			        'user_id'       => session()->get('LOGIN_USER_ID'),
			        'ctratedAt' => date('y-m-d h:i:s')
			    ];
			   
			   $status = $this->mainmodel->Insertdata('shipping_address',$data);
			    if($status){
    			    $jsonArr = array('is_error' => 'no',  'dd'=>'Address Save Successfully');
				}else{
    			   $jsonArr = array('is_error' => 'yes',  'dd'=>'Sorry ! Unable to Save Address ?');
				}
    			//return redirect()->to(base_url()."/Shop/checkout");
    			
		}else{
			$jsonArr = array('is_error' => 'yes',  'dd'=>'Enter Valid Email');
				
		}
	}
	    echo json_encode($jsonArr); 
	}
	
	public function ediaddress($id){
	    $args = ['id' => $id];
	    $data['edit'] =  $this->mainmodel->fetch_rec_by_args('shipping_address', $args);
	    return view('shop/editaddredd', $data);
	}
	
	public function updateaddress($id){
	    $args = [ 'id'  => $id ];
	    if (!(session()->has('LOGIN_USER'))) {
			return redirect()->to(base_url()."/Login/userloginregister");
		}
	    $data = [];
		if ($this->request->getMethod() == 'post') {
		    $rules = [
				'username' => 'required|min_length[3]|max_length[20]',
				'address'   => 'required|min_length[5]|max_length[100]',
				'city'      => 'required',
				'email'     => 'required',
				'mobile'    => 'required|numeric|exact_length[8]',
				'address'   => 'required',
			];
		if ($this->validate($rules)) {
		    $data = [
			        'username'  => $this->request->getVar('username',FILTER_SANITIZE_STRING),
			        'email'  => $this->request->getVar('email',FILTER_SANITIZE_STRING),
			        'mobile'  => $this->request->getVar('mobile',FILTER_SANITIZE_STRING),
			        'alternative_mobile'  => $this->request->getVar('alternative_mobile',FILTER_SANITIZE_STRING),
			        'city'  => $this->request->getVar('city',FILTER_SANITIZE_STRING),
			        'address'  => $this->request->getVar('address',FILTER_SANITIZE_STRING),
			     ];
			    
			   $status = $this->mainmodel->update_rec_by_args('shipping_address', $args, $data);
			   return redirect()->to(base_url()."/Shop/viewaddress");
    			
    		}else{
    			
    			$data['validation']  = $this->validator;
    		}
		}
		
		$args = ['user_id' => $this->session->get('LOGIN_USER_ID')];
	    $data['edit'] =  $this->mainmodel->fetch_rec_by_args('shipping_address', $args);
	    return view('shop/editaddredd', $data);
	}
	
    public function delete_item_in_carts($id){
		$args = [
			'id'  => $id
		];
		$status = $this->mainmodel->delete_records('cart', $args);
		if ($status) {
			echo "1";
		}else{
			echo "0";
		}
	}
	
	public function callback(){
		$transction_id = $_GET['paymentId'];
		if (isset($transction_id)) {
			$order_id  = session()->get('ONLINE_ORDER_ID_SESSION');
			$order_args = ['order_id' => $order_id];
			$order_details = $this->mainmodel->fetch_rec_by_args('orders', $order_args);
			
			$args = [ 'order_id'      => $order_id];
			$data = [
				'Payment_status'  => 'SUCCESS',
				'Transiction_id'  => $transction_id
			];
			$result = $this->mainmodel->update_rec_by_args('orders', $args,$data);
			if ($result == true) {
				$add_id  = session()->get('CUSTOMER_SESSION_ID');
				$address =  $this->mainmodel->fetch_rec_by_args('shipping_address',['id' => $add_id]);
				$payment_type = 'Online';
				$Payment_status = 'SUCCESS';
				$this->sendorderemail($address[0]->email, $address[0]->username, $order_id, $order_details[0]->total_quantity, $order_details[0]->total_amount, $payment_type, $Payment_status);
				$this->order_item_details($order_id);
			}
			$data['transction_id'] = $transction_id;
			return view('shop/paymentstatus', $data);
		}
	}
	
	public function failedpayment(){
	   	$transction_id = $_GET['paymentId'];
		if (isset($transction_id)) {
			$order_id  = session()->get('ONLINE_ORDER_ID_SESSION');
			$order_args = ['order_id' => $order_id];
			$order_details = $this->mainmodel->fetch_rec_by_args('orders', $order_args);
			
			$args = [ 'order_id'      => $order_id];
			$data = [
				'Payment_status'  => 'FAILED',
				'Transiction_id'  => $transction_id
			];
			$result = $this->mainmodel->update_rec_by_args('orders', $args,$data);
			if ($result == true) {
				$add_id  = session()->get('CUSTOMER_SESSION_ID');
				$address =  $this->mainmodel->fetch_rec_by_args('shipping_address',['id' => $add_id]);
				$payment_type = 'Online';
				$Payment_status = 'FAILED';
				$this->sendorderemail($address[0]->email, $address[0]->username, $order_id, $order_details[0]->total_quantity, $order_details[0]->total_amount, $payment_type, $Payment_status);
				//$this->order_item_details($order_id);
			}
			$data['transction_id'] = $transction_id;
			return view('shop/failedpayment', $data);
		}
	}
	
	
    public function sendorderemail($email, $username, $order_id, $total_quantity, $total_amount, $payment_type = "", $Payment_status){
		$to        = $email;
		$subject   = 'Purchase Order';
		$message   = 'Hi ' .$username.",
	    <br>Your Order Id :. ".$order_id. "<br>
	    <br>Payment Type :. ".$payment_type. "<br>
	    <br>Payment Status :. ".$Payment_status. "<br>
	    <br>Your Total Order Item:. ".$total_quantity. "<br>
	    <br>Your Total Order Amount :. ".$total_amount. "<br>";
	    $this->email->setTo($to);
		$this->email->setFrom('noreply@topwinnerkw.com', 'Topwinner');
		$this->email->setSubject($subject);
		$this->email->setMessage($message);
		$filepath = 'https://topwinnerkw.com/public/front_assets/images/1.png';
		$this->email->attach($filepath);
		$this->email->send();
	}
	
	
	
	


}
