<?= view('admin/include/header'); ?>
<?php $validation =  \Config\Services::validation(); ?> 


<body class="bg-login">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="mb-4 text-center">
							<img src="<?= base_url('public/assets/images/topwinner-logo.png'); ?>" width="180" alt="" />
						</div>
						<div class="card">
							<div class="card-body">
								<?php if(isset($error)): ?>
								<div style="color: red"><?= $error; ?></div>
							<?php endif; ?>

								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class="">Sign in</h3>
										<p>Don't have an account yet? 
										</p>
									</div>
									
									<div class="login-separater text-center mb-4"> <span>OR SIGN IN WITH EMAIL</span>
										<hr/>
									</div>
									<?php 
									    if(isset($_COOKIE['login_email']) && isset($_COOKIE['login_pwd'])){
                                            $login_email = $_COOKIE['login_email'];
                                            $login_pwd = $_COOKIE['login_pwd'];
                                            $is_remember = "checked='checked'";
                                        }else{
                                            $login_email = "";
                                            $login_pwd   = "";
                                            $is_remember = "";
                                        }
									?>
									
									<div class="form-body">
										<?= form_open('Login/login'); ?>
											 <input type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email Address</label>
												<input type="email" class="form-control" name="email" id="inputEmailAddress" placeholder="Email Address" value="<?= $login_email; ?>">
												<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'email'); ?></span>
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Enter Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0" id="inputChoosePassword" value="<?= $login_pwd; ?>" name="password" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
												<span style="color: red;font-weight: 500;font-size: 14px;"><?= display_error($validation,'password'); ?></span>
											</div>
											<br>
											<div class="row">
											    <div class="col-md-6">
											    <div>
    												<label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme" name="rememberme" <?= $is_remember; ?>> Remember me </label>
    											</div>
											</div>
											<div class="col-md-6 text-end">	
											    <div>
											        <a href="#!">Forgot Password ?</a>
											    </div>
											</div>
											</div>
											<br>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Sign in</button>
												</div>
											</div>
										<?= form_close(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->




<?= view('admin/include/js_file'); ?>

<script>
	$(document).ready(function () {
		$("#show_hide_password a").on('click', function (event) {
			event.preventDefault();
			if ($('#show_hide_password input').attr("type") == "text") {
				$('#show_hide_password input').attr('type', 'password');
				$('#show_hide_password i').addClass("bx-hide");
				$('#show_hide_password i').removeClass("bx-show");
			} else if ($('#show_hide_password input').attr("type") == "password") {
				$('#show_hide_password input').attr('type', 'text');
				$('#show_hide_password i').removeClass("bx-hide");
				$('#show_hide_password i').addClass("bx-show");
			}
		});
	});
</script>