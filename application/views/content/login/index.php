  <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" id="sign_in" method="POST" action="login/verify">
                    <span class="login100-form-title p-b-34">
                        <div class="logo logo-cust">
                            <br>
                            <a href="javascript:void(0);"><label class="text-logo">INVOICE</label></a>
                            <br>
                            <small>A CodeIgniter Invoicing For A Simple Store</small>
                        </div>
                    </span>
                    <span class="login100-form-title p-b-34">
                        Account Login						
						<span id = "loginloader">
						<br>
							<img src='assets/loginv3src/images/loginloader.gif' class='loginloader'/>
						</span>
                    </span>
					
                    <span>
                        <?php if ($this->session->flashdata('failed') != ''):  ?>
                        <div>
                            <div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                                   <?php echo $this->session->flashdata('failed');  ?>
                            </div>
                        </div>
                        <?php elseif ($this->session->flashdata('success') != '') : ?>
                            <div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                                    <?php echo $this->session->flashdata('success') ?>
                            </div>
                        <?php endif; ?>
                    </span>
					<br>
                    <div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
                        <input id="first-name" class="input100" type="text" name="username" placeholder="Username"  required autofocus>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password"  required >
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                    </div>
					
					<div class="container-fluid" id="slidercaptcha">
						<div class="form-row">
							<div class="col-12">
								<div class="slidercaptcha card sldrcapcustom">
									<div class="card-header">
										<span>Complete the security check</span>
									</div>
									<div class="card-body">
										<div id="captcha"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
                    
                    <div class="container-login100-form-btn" id="loginbtn">
                        <button class="login100-form-btn">
                            Sign in
                        </button>
                    </div>

					<div class="w-full text-center">
                        <label class="copyrightcust">
                            Copyright ©2021 Erex S. Cabalquinto. All rights reserved.
                        </label>
                    </div>
                </form>

            </div>
        </div>
    </div>
    