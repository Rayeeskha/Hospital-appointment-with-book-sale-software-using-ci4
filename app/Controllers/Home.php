<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function __construct(){
		$this->email = \Config\Services::email();
	}
	public function index()
	{
	    $args = ['status' => 'Active'];
	    $data['product'] = $this->mainmodel->fetch_rec_by_args('products', $args);
	    $args = ['staff_status' => 'Active'];
	    $data['doctors'] = $this->mainmodel->fetch_doctors('staff_member', $args);
		return view('front/index', $data);
	}
	
	public function appointment(){
	    $data['appointment']=$this->mainmodel->fetch_all_records('staff_member');
	    return view('front/appointment', $data);
	}
	
	public function bookappointment(){
	    session()->remove('CUSTOMER_NAME_SESSION');
	    session()->remove('CUSTOMER_EMAIL_SESSION');
	    session()->remove('CUSTOMER_MOBILE_SESSION');
	    session()->remove('APPOINTMENT_ID_SESSION');
	    session()->remove('DOCTOR_ID_SESSION');
	    session()->remove('BOOKING_SCHEDULE_DATE_SESSION');
	    session()->remove('BOOKING_SCHEDULE_TIME_SESSION');
	    
	    $data  = [];
	    $paymentLink =  "";
		$data['validation'] = null;
		$jsonArr = array();
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
				    $jsonArr = array('is_error' => 'yes',  'dd'=>'Sorry ! UnAvailable Appointment Already Booked ?');
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
        					'lastname'    => $this->request->getVar('lastname',FILTER_SANITIZE_STRING),
        					'phone'       => $this->request->getVar('mobile',FILTER_SANITIZE_STRING),
        					'email'       => $this->request->getVar('email',FILTER_SANITIZE_STRING),
        					'book_date'   => $schedulelist[0]->booking_date,
        					'book_time'   => $schedulelist[0]->schedule_time,
        					'message'     => $this->request->getVar('message',FILTER_SANITIZE_STRING),
        					'photo'       => $avatar,
        					'status'      => 'Pending',
        					'Payment_status' => 'Pending',
        					'booking_date'=> date('Y-m-d h:i:s'),
        					'Year'        => date('Y')
        				];
        				$status = $this->mainmodel->Insertdata('appointment',$data);
        				if($status == true){
        				    $customer_detail_session = [ 
        				        'CUSTOMER_NAME_SESSION'  => $this->request->getVar('name',FILTER_SANITIZE_STRING), 
        				        'CUSTOMER_EMAIL_SESSION'  => $this->request->getVar('email',FILTER_SANITIZE_STRING), 
        				        'CUSTOMER_MOBILE_SESSION'  => $this->request->getVar('mobile',FILTER_SANITIZE_STRING) 
        				        ];
					        $this->session->set($customer_detail_session);
        				    
        				    $appintment_id_sess = [ 'APPOINTMENT_ID_SESSION'  => $appoint_uid ];
					        $this->session->set($appintment_id_sess);
					        
					        
        				     $apiURL = 'https://apitest.myfatoorah.com';
			                  $apiKey = 'rLtt6JWvbUHDDhsZnfpAhpYk4dxYDQkbcPTyGaKp2TYqQgG7FGZ5Th_WD53Oq8Ebz6A53njUoo1w3pjU1D4vs_ZMqFiz_j0urb_BH9Oq9VZoKFoJEDAbRZepGcQanImyYrry7Kt6MnMdgfG5jn4HngWoRdKduNNyP4kzcp3mRv7x00ahkm9LAK7ZRieg7k1PDAnBIOG3EyVSJ5kK4WLMvYr7sCwHbHcu4A5WwelxYK0GMJy37bNAarSJDFQsJ2ZvJjvMDmfWwDVFEVe_5tOomfVNt6bOg9mexbGjMrnHBnKnZR1vQbBtQieDlQepzTZMuQrSuKn-t5XZM7V6fCW7oP-uXGX-sMOajeX65JOf6XVpk29DP6ro8WTAflCDANC193yof8-f5_EYY-3hXhJj7RBXmizDpneEQDSaSz5sFk0sV5qPcARJ9zGG73vuGFyenjPPmtDtXtpx35A-BVcOSBYVIWe9kndG3nclfefjKEuZ3m4jL9Gg1h2JBvmXSMYiZtp9MR5I6pvbvylU_PP5xJFSjVTIz7IQSjcVGO41npnwIxRXNRxFOdIUHn0tjQ-7LwvEcTXyPsHXcMD8WtgBh-wxR8aKX7WPSsT1O8d8reb2aR7K3rkV3K82K_0OgawImEpwSvp9MNKynEAJQS6ZHe_J_l77652xwPNxMRTMASk1ZsJL';
								//Fill POST fields array
			                  $postFields = [
			                      //Fill required data
			                      'NotificationOption' => 'Lnk', //'SMS', 'EML', or 'ALL'
			                      'InvoiceValue'       => $doctorname[0]->fee,
			                      'CustomerName'       => $this->request->getVar('name',FILTER_SANITIZE_STRING),
			                          //Fill optional data
			                        'DisplayCurrencyIso' => 'KWD',
			                        'MobileCountryCode'  => '+965',
			                        'CustomerMobile'     => $this->request->getVar('mobile',FILTER_SANITIZE_STRING),
			                        'CustomerEmail'      => $this->request->getVar('email',FILTER_SANITIZE_STRING),
			                        'CallBackUrl'        => 'https://topwinnerkw.com/Home/bookingsuccess',
			                        'ErrorUrl'           => 'https://topwinnerkw.com/Home/bookingerror', //or 'https://example.com/error.php'
			                        'Language'           => 'en', //or 'ar'
			                        'CustomerReference'  => $appoint_uid,
			                        'CustomerCivilId'    => 'CivilId',
			                        'UserDefinedField'   => 'This could be string, number, or array',
			                   ];

			                  //Call endpoint
			                  $data = sendPayment($apiURL, $apiKey, $postFields);

			                  //You can save payment data in database as per your needs
			                  $invoiceId   = $data->InvoiceId;
			                  $paymentLink = $data->InvoiceURL;
        				    
        				     $bookingschedule_session = [ 
        				         'DOCTOR_ID_SESSION'  => $schedulelist[0]->doctor_id, 
        				         'BOOKING_SCHEDULE_DATE_SESSION'  => $schedulelist[0]->booking_date, 
        				         'BOOKING_SCHEDULE_TIME_SESSION'  => $schedulelist[0]->schedule_time 
        				     ];
					        $this->session->set($bookingschedule_session);
        				    
        				    //Email Cofigration 
        				     $jsonArr = array('is_error' => 'no',  'dd'=>'Appointment Book  Successfully', 'apmnt_id' => $appoint_uid, 'paymentLink' => $paymentLink);
                		}else{
        				  $jsonArr = array('is_error' => 'yes',  'dd'=>'Sorry ! Unable to Book Appointment ?');
				        }
        			}else{
                	    $jsonArr = array('is_error' => 'yes',  'dd'=>'Sorry ! Unable to Book  Appointment Schedule Alredy Book ?');
				    }
    				
				}
			}
			echo json_encode($jsonArr);
	}
	
	public function doctorschedule($id){
	    $args = ['doctor_id' => $id];
	    $data['schedule'] = $this->mainmodel->fetch_rec_by_args('doc_schedule_list', $args);
	    return view('appointment/doctorschedule', $data);
	}
	
	public function schedulelist($id){
	    $args = ['doctor_id' => $id];
	    $data['schedule'] = $this->mainmodel->fetch_rec_by_args('doc_schedule_list', $args);
	    $args = ['staff_status' => 'Active'];
	    $data['doctors'] = $this->mainmodel->fetch_rec_by_args('staff_member', $args);
	    return view('appointment/schedulelist', $data);
	}
	
	public function appointmentbooking(){
	    $id = $this->request->getVar('id',FILTER_SANITIZE_STRING);
	    if(!$id){
            $this->session->setTempdata('error', 'Sorry ! Unable to Book  Appointment Schedule Alredy Book ?', 3);
        	return redirect()->to(base_url().'/Home/index'); 
	    }
	    $args = ['id' => $id];
	    $apmntrq = $this->mainmodel->fetch_rec_by_args('doc_schedule_list', $args);
	    $doc_id   = $apmntrq[0]->doctor_id;
		$bookdate = $apmntrq[0]->givendate;
		$booktime = $apmntrq[0]->giventime;
		$args = [
            'doctor_id' => $doc_id,
            'book_date' => $bookdate,
            'book_time' => $booktime,
            ];
    	$checkapmnt = $this->mainmodel->fetch_rec_by_args('appointment', $args);
    	if(!$checkapmnt){
    	    $data = [
				'doctor_id'   => $doc_id,
				'username'    => $this->request->getVar('name',FILTER_SANITIZE_STRING),
				'phone'       => $this->request->getVar('phone',FILTER_SANITIZE_STRING),
				'email'       => $this->request->getVar('email',FILTER_SANITIZE_STRING),
				'book_date'   => $bookdate,
				'book_time'   => $booktime,
				'message'     => $this->request->getVar('message',FILTER_SANITIZE_STRING),
				'status'      => 'Pending',
				'booking_date'=> date('Y-m-d h:i:s'),
				'Year'        => date('Y')
			];
			$status = $this->mainmodel->Insertdata('appointment',$data);
		    $this->session->setTempdata('success', 'Appointment Book  Successfully', 3);
    	}else{
    	    $this->session->setTempdata('error', 'Sorry ! Unable to Book  Appointment Schedule Alredy Book ?', 3);
    	}
		return redirect()->to(base_url().'/Home/schedulelist/'.$apmntrq[0]->doctor_id); 
	}
	
	public function getschedulelist($doc_id){
	    $args = ['doctor_id' => $doc_id, 'status' => 'Active'];
	    $data = $this->mainmodel->fetch_rec_by_args('doc_schedule_list', $args);
	   // echo "<pre>";
	   // var_dump($data);
	    echo json_encode($data);
	}
	
	public function getschedulelistdatevise($doc_id,$date){
	    $args = ['doctor_id' => $doc_id, 'apmt_status' => 'Active',
	        'booking_date' => $date ];
	    $data = $this->mainmodel->fetch_getschedulelistdatevise('apmnt_day_vise_sch', $args);
	    echo json_encode($data);
	}
	
	public function getdoctorfee($doc_id){
	    $args = ['id' => $doc_id, 'staff_status' => 'Active'];
	    $data = $this->mainmodel->fetch_getschedulelistdatevise('staff_member', $args);
	    $fee = $data[0]->fee;
	    echo json_encode($fee);
	}
	
	
	
	
	public function aboutus(){
	   return view('front/aboutus');
	}
	public function termandcondition(){
	   return view('front/termandcondition');
	}
	public function privacypolicy(){
	   return view('front/privacypolicy');
	}
	
	public function depression(){
	    return view('front/depression');
	}
	
	public function familyissue(){
	    return view('front/familyissue');
	}
	
	public function anxiety(){
	    return view('front/anxietyissue');
	}
	
	public function Behaviour(){
	    return view('front/Behaviour');
	}
	
	
	
	public function contactus(){
	    return view('front/contactus');
	}
	
	public function bookingsuccess(){
	    $transction_id = $_GET['paymentId'];
	    $doctorname = $this->mainmodel->fetch_rec_by_args('staff_member', ['id' =>session()->get('DOCTOR_ID_SESSION')]);
    	$doctor = $doctorname[0]->name;
	    if (isset($transction_id)) {
	        $apargs = [ 'appoint_uid'  => session()->get('APPOINTMENT_ID_SESSION') ];
	        $data = [
	                'Payment_status'  => 'SUCCESS',
	                'transiction_id'  => $transction_id
	            ];
	        $result = $this->mainmodel->update_rec_by_args('appointment', $apargs,$data);
	        if($result == true){
	           $args= [ 
    		        'doctor_id'    => session()->get('DOCTOR_ID_SESSION'),
    		        'booking_date' => session()->get('BOOKING_SCHEDULE_DATE_SESSION'),
    		        'schedule_time'=> session()->get('BOOKING_SCHEDULE_TIME_SESSION')
    		    ];
    		     $data= [ 'status'  => 'UnAvailable' ];
    		     $this->mainmodel->update_rec_by_args('apmnt_day_vise_sch',$args, $data);
    		    //Email Cofigration 
    		    
    		    $status = 'SUCCESS';
    		    $apmnt_status = 'Pending';
		        $this->sendappointmentbookingemail($doctor,$doctorname[0]->fee, $transction_id, $status,$apmnt_status);
	        
	             
	        }
	       $data['transction_id'] = $transction_id;
	       $data['doctor_fee'] = $doctorname[0]->fee;
		    return view('front/bookingsuccess', $data);
	    }
	    
	}
	
	public function bookingerror(){
	    $transction_id = $_GET['paymentId'];
	    $doctorname = $this->mainmodel->fetch_rec_by_args('staff_member', ['id' =>session()->get('DOCTOR_ID_SESSION')]);
	     if (isset($transction_id)) {
	        $apargs = [ 'appoint_uid'  => session()->get('APPOINTMENT_ID_SESSION') ];
	        $data = [
	                'Payment_status'  => 'FAILED',
	                'book_date'       => "",
	                'book_time'       => "",
	                'transiction_id'  => $transction_id
	            ];
	        $result = $this->mainmodel->update_rec_by_args('appointment', $apargs,$data);
	        $data['transction_id'] = $transction_id;
	        $data['doctor_fee'] = $doctorname[0]->fee;
		    return view('front/bookingerror', $data);
	     }
	}
	
	
	public function sendappointmentbookingemail($doctorname,$fee, $transction_id, $status,$apmnt_status){
	    $to        = session()->get('CUSTOMER_EMAIL_SESSION');
		$subject   = 'Appointment Booking';
		$message   = 'Hi ' .session()->get('CUSTOMER_NAME_SESSION').",
	    <br>Your Appointment Id. ".session()->get('APPOINTMENT_ID_SESSION'). "<br>
	    <br>You are Booked Appointment to Dr. ".$doctorname. "<br>
	    <br>Paid Amount. ".$fee. "<br>
	    <br>Transiction Id. ".$transction_id. "<br>
	    <br>Payment Status. ".$status. "<br>
	    <br>Appointment Status. ".$apmnt_status. "<br>
	    <br>Your Booking <br>date is :"
		.session()->get('BOOKING_SCHEDULE_DATE_SESSION')."<br> Booking Time is:<b>".session()->get('BOOKING_SCHEDULE_TIME_SESSION')."</b>";
		$this->email->setTo($to);
		$this->email->setFrom('noreply@topwinnerkw.com', 'Topwinner');
		$this->email->setSubject($subject);
		$this->email->setMessage($message);
		$filepath = 'https://topwinnerkw.com/public/front_assets/images/1.png';
		$this->email->attach($filepath);
		$this->email->send();
	}
	
	public function getevents(){
		$data = $this->mainmodel->fetch_all_records('events');
		foreach ($data as $holiday) {
			$getdate = $holiday->start_event;
			echo json_encode($getdate);
		}
		
	}
	
	
}
