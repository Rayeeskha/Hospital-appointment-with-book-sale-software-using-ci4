<?php 
namespace App\Filters;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;


	class AdminLoginFilterCheck implements FilterInterface{
		public function before(RequestInterface $request, $arguments = null){
			if (!(session()->has('ADMIN_LOGGEID_IN'))) {
				return redirect()->to(base_url()."/Login/index");
			}
		}
		public function after(RequestInterface $request, ResponseInterface $response,  $arguments = null){
		 //echo "testing";	
		}

	}

?>