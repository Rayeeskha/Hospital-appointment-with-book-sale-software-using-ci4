<?= $this->extend('front/layout'); ?>
<?= $this->section('content'); ?>
<?php $validation =  \Config\Services::validation(); ?> 

<section>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#login-tab" data-toggle="tab"><?= lang("home.login"); ?></a></li>
              <li><a href="#register-tab" data-toggle="tab"><?= lang("home.register"); ?></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade in active p-15" id="login-tab">
                <h4 class="text-gray mt-0 pt-5"> <?= lang("home.login"); ?></h4>
                <hr>
                
                	<?php 
					    if(isset($_COOKIE['login_user_email']) && isset($_COOKIE['login_user_pwd'])){
                            $login_user_email = $_COOKIE['login_user_email'];
                            $login_user_pwd = $_COOKIE['login_user_pwd'];
                            $is_remember = "checked='checked'";
                        }else{
                            $login_user_email = "";
                            $login_user_pwd   = "";
                            $is_remember = "";
                        }
					?>
                
                <!--<p>Login / Register</p>--->
                <form name="login-form" class="clearfix " method="post" action="<?= base_url('Login/logincustomer'); ?>">
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="form_username_email"><?= lang("home.eemail"); ?></label>
                      <input id="email" name="customeremail" class="form-control" value="<?= $login_user_email; ?>" type="text">
                      <span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'customeremail'); ?></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="form_password"><?= lang("home.password"); ?></label>
                      <input id="form_password" name="password" class="form-control" value="<?= $login_user_pwd; ?>"  type="password">
                      <span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'password'); ?></span>
                    </div>
                  </div>
                  <div class="checkbox pull-left mt-15">
                    <label for="form_checkbox">
                      <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme" name="rememberme" <?= $is_remember; ?>> <?= lang("home.remme"); ?> </label>
    										
                  </div>
                  <div class="form-group pull-right mt-10">
                    <button type="submit" class="btn btn-dark btn-lg"><?= lang("home.login"); ?></button>
                  </div>
                 
                  
                </form>
              </div>
              <div class="tab-pane fade in p-15" id="register-tab">
                <div class="icon-box mb-0 p-0">
                    <a href="#" class="icon icon-bordered icon-rounded icon-sm pull-left mb-0 mr-10">
                      <i class="pe-7s-users"></i>
                    </a>
                    <h4 class="text-gray pt-10 mt-0 mb-30"><?= lang("home.dttacc"); ?></h4>
                  </div>
                  <hr>
                  
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label><?= lang("home.fname"); ?></label>
                      <input name="name" id="name" value="<?= set_value('name'); ?>" class="form-control" type="text">
                    </div>
                    <div class="form-group col-md-6">
                      <label><?= lang("home.lname"); ?></label>
                      <input name="lastname" id="lastname" value="<?= set_value('lastname'); ?>" class="form-control" type="text">
                    </div>
                    <div class="form-group col-md-12">
                      <label><?= lang("home.email"); ?></label>
                      <input name="email" value="<?= set_value('email'); ?>" id="registeremail" class="form-control" type="email">
                     </div>
                    <div class="form-group col-md-6">
                      <label><?= lang("home.phone"); ?></label>
                      <input name="mobile" value="<?= set_value('mobile'); ?>" id="registermobile" class="form-control" type="number">
                    </div>
                    
                    <div class="form-group col-md-6">
                      <label><?= lang("home.country"); ?></label>
                        <select name="country" id="country" class="form-control" required>
                            <option selected disabled><?= lang("home.country_title"); ?></option> 
                            <option value="kuwait">kuwait</option>
                        </select>
                     </div>
                  
                  <div class="form-group col-md-12">
                      <label for="form_choose_password"><?= lang("home.Address"); ?></label>
                      <textarea name="address" id="address" class="form-control"></textarea>
                     </div>
                  
                  
                    <div class="form-group col-md-6">
                      <label for="form_choose_password"> <?= lang("home.Password"); ?></label>
                      <input id="signinpassword" name="regpassword" value="<?= set_value('regpassword'); ?>"  class="form-control" type="password" onkeyup="check_password()">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="form_choose_password"><?= lang("home.cpass"); ?></label>
                      <input id="confirmpassword" name="confirmpassword" value="<?= set_value('confirmpassword'); ?>"  class="form-control" type="password" onkeyup="check_password()">
                        <span id="error_msg" style="color:red;font-size:13px;display:none"><?= lang("home.ccnf"); ?></span>
                    </div>
                   <div class="form-group">
                    <button class="btn btn-dark btn-lg btn-block mt-15" id="registeration_btn" type="button"><?= lang("home.Registernow"); ?></button>
                  </div>
               </div>
            </div>
          </div>
        </div>
      </div>
    </section>


<script>

$('#registeration_btn').click(function(){
	let name  = $('input[name="name"]').val();
	let email  = $('input[name="email"]').val();

	let lastname  = $('input[name="lastname"]').val();
	let country  = $('#country').val();
	let regpassword  = $('input[name="regpassword"]').val();
	let password_length  = $('input[name="regpassword"]').val().length;
	let address  = $('#address').val();
	
	let confirmpassword  = $('input[name="confirmpassword"]').val();
		
	let mobile  = $('input[name="mobile"]').val();
	let mobile_length  = $('input[name="mobile"]').val().length;
	
	if (name == "") {
		alert('Name Field is required');
		$('input[name="name"]').css({'border':'1px solid red'});
    }
    else if (email == "") {
		alert('Email Field is required');
		$('input[name="email"]').css({'border':'1px solid red'});
    }
    
	else if (!ValidateEmail(email)) {
		alert('Please Enter Valid Email');
		$('input[name="email"]').css({'border':'1px solid red'});
	}
	else if (mobile == "") {
	    alert('Mobile Field is required')
	    $('input[name="mobile"]').css({'border':'1px solid red'});
	}
	
	else if (mobile_length !== 8) {
	    alert('Please Enter 8 Digit Mobile Number')
	    $('input[name="mobile"]').css({'border':'1px solid red'});
	}
	else if (country == "") {
		alert('Please Select Country');
		$('input[name="country"]').css({'border':'1px solid red'});
    }
	else if (regpassword == "") {
    	alert('Password Field is required');
    	$('input[name="regpassword"]').css({'border':'1px solid red'});
    }
    	
    else if (password_length < 4) {
    	alert('Please Enter Minimum Four digit Password');
    	$('input[name="password"]').css({'border':'1px solid red'});
    }
    
    else if (confirmpassword == "") {
    	alert('Confirm Password Field is required');
    	$('input[name="confirmpassword"]').css({'border':'1px solid red'});
    }else{
		$.ajax({
			type:'ajax',
			method:'post',
			url:'<?= site_url('Login/customerregister'); ?>',
			data:{name:name,lastname:lastname,email:email,country:country,regpassword:regpassword,mobile:mobile,address:address},
			
			success:function(result){
				let data = $.parseJSON(result);
			    if (data.is_error == 'yes') {
                    /*$('#errormodal').modal('show');
                    $('#error_heading').text(data.dd);*/
                    alert(data.dd);
                }
                if (data.is_error== 'no') {
                    /*$('#successmodal').modal('show');
                    $('#success_heading').text(data.dd);*/
                    alert(data.dd);
                    location.reload();
                }
			},
			error:function(){
				$('#preloader').modal('close');
				alert('Error! Admin Login Account');
			}
		});
	}
});

function check_password(){
	let password          = $('#signinpassword');
	let retype_password   = $('#confirmpassword');
	
	if (password.val() == retype_password.val() || retype_password.val()  == password.val()) {
		$('#registeration_btn').prop('disabled',false);
		$('#error_msg').hide();
	}else{
	    $('#error_msg').show();
		$('#registeration_btn').prop('disabled',true);
	}
}

// $('#loginregisterform').on('submit', function(e){
// 	e.preventDefault();
// 	let name = $('#name').val();
// 	let mobile_number = $('#registermobile').val();
//     let mobile_number_len = $('#registermobile').val().length;
//     let password          = $('#signinpassword').val();
//     let password_len          = $('#signinpassword').val().length;
   
// 	if (name == "") {
// 		$('#name').css({'border':'1px solid red'});
// 	}
//     if (mobile_number_len !== 8) {
// 	    alert('Please Enter 8 Digit Mobile Number')
// 	}
// 	if (password_len > 4) {
//     	alert('Please Enter Minimum Four digit Password');
//     }
//     if (!ValidateEmail($("#registeremail").val())) {
// 		alert('Please Enter Valid Email');
// 	}
// 	else{
// 		$.ajax({
// 			url:'<?= site_url('Login/customerregister'); ?>',
// 			method:'POST',
// 			data:new FormData(this),
// 			contentType:false,
// 			cache:false,
// 			processData:false,
//     		success:function(result){
// 			  let data = $.parseJSON(result);
// 			    if (data.is_error == 'yes') {
//                     $('#errormodal').modal('show');
//                     $('#error_heading').text(data.dd);
//                 }
//                 if (data.is_error== 'no') {
//                     $('#successmodal').modal('show');
//                     $('#success_heading').text(data.dd);
//                     location.reload();
//                 }
// 			},
// 			error:function(){
// 				alert('Error!Appointment Booking');
// 			}
// 		});
// 	}
// });

function ValidateEmail(email){
	var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	return expr.test(email);
}


//Mobile Number Validation
</script>

<?= $this->endSection(); ?> 