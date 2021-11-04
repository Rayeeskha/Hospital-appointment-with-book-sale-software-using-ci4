<?php 
    function fetch_cate_rec($tablename, $args){
        $db = \Config\Database::connect();
		$result = $db->table($tablename)
		           ->select('*')
		           ->where('id', $args)
                   ->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return false;
		}
    }
    
     function getdoctordetails($tablename, $args){
        $db = \Config\Database::connect();
		$result = $db->table($tablename)
		           ->select('*')
		           ->where('doctor_id', $args)
                   ->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return false;
		}
    }

     function getdoctschedule($tablename, $args){
        $db = \Config\Database::connect();
		$result = $db->table($tablename)
		           ->select('*')
		           ->where('schedule_id', $args)
                   ->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return false;
		}
    }


     function getscheduledetails($tablename, $args){
        $db = \Config\Database::connect();
		$result = $db->table($tablename)
		           ->select('*')
		           ->where('schedule_list_id', $args)
                   ->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return false;
		}
    }
    
    function checkappointmentbooking($tablename, $doc_id, $bookdate, $booktime){
        $args = [
            'doctor_id' => $doc_id,
            'book_date' => $bookdate,
            'book_time' => $booktime,
            ];
        $db = \Config\Database::connect();
		$result = $db->table($tablename)
		           ->select('*')
		           ->where($args)
                   ->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return false;
		}    
    }



    
    function get_order_details($tablename, $args){
		$db = \Config\Database::connect();
		$result = $db->table($tablename)
		          ->select("products.productname,products.photo,products.stock,products.mrpprice,products.price, $tablename.*")
		          ->where('order_id', $args)
		          ->join('products', "$tablename.product_id=products.id")
		          ->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return false;
		}
	}

	
	
	

    
    function check_cart_product($tablename, $id){
        $args = [
                'product_id'  => $id,
                'session_id'  => session()->get('session_id')
            ];
        $db = \Config\Database::connect();
		$result = $db->table($tablename)
		           ->select('*')
		           ->where($args)
                   ->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return false;
		}
    }
    
    
     function fetchuser_address($tablename, $id){
        $db = \Config\Database::connect();
		$result = $db->table($tablename)
		           ->select('*')
		           ->where('user_id', $id)
		           ->orderBy('id','desc')
		           ->limit(2)
                   ->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return false;
		}
    }
    
    
    function verify_period_to_current_time_stamp($db_time){
		// $current_time  = time();
		$diff      = abs(time() - $db_time);
	    //Count Year
	    $years = floor($diff / (365*60*60*24));  
		//Count Months
        $months = floor(($diff - $years * 365*60*60*24) 
                                       / (30*60*60*24));  
         //Count days 
        $days = floor(($diff - $years * 365*60*60*24 -  
                     $months*30*60*60*24)/ (60*60*24)); 
          //Count year 
        $hours = floor(($diff - $years * 365*60*60*24  
               - $months*30*60*60*24 - $days*60*60*24) 
                                           / (60*60));  
         //Count Months  
        $minutes = floor(($diff - $years * 365*60*60*24  
                 - $months*30*60*60*24 - $days*60*60*24  
                                  - $hours*60*60)/ 60); 
        return $minutes;
	}
	
	function fetch_latest_order($tablename){
	    $db = \Config\Database::connect();
	    $result = $db->table($tablename)
		          ->select("products.productname,products.photo,products.stock,products.mrpprice,products.price,order_details.qty,order_details.pro_price,order_details.product_id, $tablename.*")
		          ->where('order_status', 'Pending')
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
	
	function getscheduledata($tablename, $args){
        $db = \Config\Database::connect();
		$result = $db->table($tablename)
		           ->select('*')
		           ->where('schedule_id', $args)
                   ->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return false;
		}
    }

    
    function feetch_break_end_time($tablename, $doc_id, $period){
        $db = \Config\Database::connect();
        $args =[
        	'doctor_id'    => $doc_id,
        	'givenperiod'  => $period
        ];
		$result = $db->table($tablename)
		           ->select('*')
		           ->where($args)
                   ->get();
		if (count($result->getResultArray())> 0) {
			return $result->getResult();
		}else{
			return false;
		}
    }
	

	function generate_payment_link(){
		$apiURL = 'https://api.myfatoorah.com';
		$apiKey = 'z9YowH3oc2sMVYssAwllHHPMEK2F7kNOGc_m1n8d_wYlR5ZK56hGzw10GvAQUK9nG8OBvGk0ADYzVTM_5MQPSCpseMbR-Ua_CfrDKynVM7GKnJxKLJPE5kfLZ98TWVS6oyNm-2i8OgdzzRuVLwwd378JlR22q1B3qgvzZU78F55IP1q-6pmLzkXRxo61ePTw0Xy9VgTQaDBDEYMacgLLo2ne6X1Zzh3Zk7n9VhWZtqvGl0FbltntDN08_v1gisX3T6dBGFEkoXxwic2hrxrkD_cXLCQ3jSrBy5ARiJ_oqmutJy192NZc_JfOiPYDyjKBVIX60mjanaqVN-kIE-9HASEQq8sQ7eW7GaqDkhYa6-gird4kBfc1eMlIfLLh63a_8ygZAQnPIbnd7l1uzmH7uf0nsRoJAakC6bIimJfxeSoTFw9C65nDJh_D_LxtvbzCaFyEcqIqrDtI0pNB5gT3pIJxPKDL6MwuWNZU9rArYaUSV9dwnWwb43MXjj3zmki9nFVzhAFbB5cYR1789wIdcHBDlXpmf4-yUU13dtgJbLynw2r6EG9Ug53rKHtUMw5Huh1S_LJ3Q0TFCZqajJKWCBpDW9jzfreaNI_235aZynzBdnJP2wuEnmtoQFyP4FpsBmwN0AVOFlVqWYP05u__kaQ1JoiWPdRLBW2k_CNkK3B_nIzSOIrtEznysADCdJZClquXTlTFh5_4zZ7IygPwOnzW7r4obIQkZ6IQhcMQRYhpluNE';

		//Live

		//key => z9YowH3oc2sMVYssAwllHHPMEK2F7kNOGc_m1n8d_wYlR5ZK56hGzw10GvAQUK9nG8OBvGk0ADYzVTM_5MQPSCpseMbR-Ua_CfrDKynVM7GKnJxKLJPE5kfLZ98TWVS6oyNm-2i8OgdzzRuVLwwd378JlR22q1B3qgvzZU78F55IP1q-6pmLzkXRxo61ePTw0Xy9VgTQaDBDEYMacgLLo2ne6X1Zzh3Zk7n9VhWZtqvGl0FbltntDN08_v1gisX3T6dBGFEkoXxwic2hrxrkD_cXLCQ3jSrBy5ARiJ_oqmutJy192NZc_JfOiPYDyjKBVIX60mjanaqVN-kIE-9HASEQq8sQ7eW7GaqDkhYa6-gird4kBfc1eMlIfLLh63a_8ygZAQnPIbnd7l1uzmH7uf0nsRoJAakC6bIimJfxeSoTFw9C65nDJh_D_LxtvbzCaFyEcqIqrDtI0pNB5gT3pIJxPKDL6MwuWNZU9rArYaUSV9dwnWwb43MXjj3zmki9nFVzhAFbB5cYR1789wIdcHBDlXpmf4-yUU13dtgJbLynw2r6EG9Ug53rKHtUMw5Huh1S_LJ3Q0TFCZqajJKWCBpDW9jzfreaNI_235aZynzBdnJP2wuEnmtoQFyP4FpsBmwN0AVOFlVqWYP05u__kaQ1JoiWPdRLBW2k_CNkK3B_nIzSOIrtEznysADCdJZClquXTlTFh5_4zZ7IygPwOnzW7r4obIQkZ6IQhcMQRYhpluNE

		//$apiURL = 'https://api.myfatoorah.com';
		//$apiKey = ''; //Live token value to be placed here: https://myfatoorah.readme.io/docs/live-token


		/* ------------------------ Call SendPayment Endpoint ----------------------- */
		//Fill customer address array
		 // $customerAddress = array(
		 //  'Block'               => 'Blk #', //optional
		 //  'Street'              => 'Str', //optional
		 //  'HouseBuildingNo'     => 'Bldng #', //optional
		 //  'Address'             => 'Addr', //optional
		 //  'AddressInstructions' => 'More Address Instructions', //optional
		 //  ); 

		//Fill invoice item array
		$args = [ 'session_id' => session()->get('session_id') ];
		 $db = \Config\Database::connect();
		$cartdetails = $db->table('cart')
		           ->select('*')
		           ->where($args)
                   ->get();
        return $cartdetails->getResult();


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
		      'CallBackUrl'        => 'https://example.com/callback.php',
		      'ErrorUrl'           => 'https://example.com/callback.php', //or 'https://example.com/error.php'
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

		return $paymentLink;
	}


	function sendPayment($apiURL, $apiKey, $postFields) {
		$json = callAPI("$apiURL/v2/SendPayment", $apiKey, $postFields);
	    return $json->Data;
	}

	function callAPI($endpointURL, $apiKey, $postFields) {
		$curl = curl_init($endpointURL);
	    curl_setopt_array($curl, array(
	        CURLOPT_CUSTOMREQUEST  => "POST",
	        CURLOPT_POSTFIELDS     => json_encode($postFields),
	        CURLOPT_HTTPHEADER     => array("Authorization: Bearer $apiKey", 'Content-Type: application/json'),
	        CURLOPT_RETURNTRANSFER => true,
	    ));

	    $response = curl_exec($curl);
	    $curlErr  = curl_error($curl);

	    curl_close($curl);

	    if ($curlErr) {
	        //Curl is not working in your server
	        die("Curl Error: $curlErr");
	    }

	    $error = handleError($response);
	    if ($error) {
	        die("Error: $error");
	    }

	    return json_decode($response);
	}

	function handleError($response) {
		$json = json_decode($response);
		if (isset($json->IsSuccess) && $json->IsSuccess == true) {
		    return null;
		}

		//Check for the errors
		if (isset($json->ValidationErrors) || isset($json->FieldsErrors)) {
		    $errorsObj = isset($json->ValidationErrors) ? $json->ValidationErrors : $json->FieldsErrors;
		    $blogDatas = array_column($errorsObj, 'Error', 'Name');

		    $error = implode(', ', array_map(function ($k, $v) {
		                return "$k: $v";
		            }, array_keys($blogDatas), array_values($blogDatas)));
		} else if (isset($json->Data->ErrorMessage)) {
		    $error = $json->Data->ErrorMessage;
		}

		if (empty($error)) {
		    $error = (isset($json->Message)) ? $json->Message : (!empty($response) ? $response : 'API key or API URL is not correct');
		}

		return $error;
		}



	

?>