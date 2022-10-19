<style>
	/* . {
		background-color: #ffffffdb !important;
	} */
</style>
	<!-- style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1950&amp;q=80');" -->
	<div class="">
	<span class="mask bg-gradient-dark opacity-6"></span>
		<div class=" " style="    margin-top: 14% !important;">
			<div class="row">
				<div style="    padding-right: 3.625rem; padding-left: 3.625rem;" class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mx-auto">
					<div class=" card z-index-0 fadeIn3 fadeInBottom">
						<div style="    background-color: #d3d3d3;    border-radius: 20px;" class=" p-0 position-relative mt-n4 mx-3 z-index-2">
							<div class=" border-radius-lg py-3 pe-1">
								<img style="    width: 65%;     display: block;  margin-left: auto; margin-right: auto;" src="<?php echo base_url(); ?>./themes/softmat/img/cat.png" alt="user">
							</div>
						</div>
						<div class="card-body">
							<form role="form" class="text-start">
					

								<div class="">
									<label class=" ">Username: <span style="color:red">*</span></label>
									<div class="input-group">
										<input  oninput="username()" type="text" class="form-control" id="userr" name="userr" placeholder="Username" aria-label="username" aria-describedby="button-addon2" autofocus>
									</div>
								</div>

								<div class="form-password-toggle my-4">
									<label for="a_pass">Password:</label>
									<div class="input-group ">
										<input type="password" class="form-control" id="password" name="pass" placeholder="Password........" required />
										<span id="basic-default-password2" class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
									</div>
								</div>

								<div class="text-center">
									<button style="font-size: 18px; margin-top: 1.5rem !important; background-color: #d3d3d3; " type="button" onclick="check_login()" class="btn  w-100 ">Login</button>
									<!-- href="Manage/den"  -->
								</div>
								<!-- onclick="check_login()"  -->
								<input type="hidden" name="action" value="<?php echo base64_encode('login'); ?>" hidden />
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- <footer class="footer position-absolute bottom-2 py-2 w-100">
			<div class="container">
				<div class="row align-items-center justify-content-lg-between">
					<div class="col-12 col-md-6 my-auto">
						<div class="copyright text-center text-sm text-white text-lg-start">
							© <script>
								document.write(new Date().getFullYear())
							</script>,
							made with <i class="fa fa-heart" aria-hidden="true"></i> by
							<a href="https://www.creative-tim.com" class="font-weight-bold text-white" target="_blank">Creative Tim</a>
							for a better web.
						</div>
					</div>
					<div class="col-12 col-md-6">
						<ul class="nav nav-footer justify-content-center justify-content-lg-end">
							<li class="nav-item">
								<a href="https://www.creative-tim.com" class="nav-link text-white" target="_blank">Creative Tim</a>
							</li>
							<li class="nav-item">
								<a href="https://www.creative-tim.com/presentation" class="nav-link text-white" target="_blank">About Us</a>
							</li>
							<li class="nav-item">
								<a href="https://www.creative-tim.com/blog" class="nav-link text-white" target="_blank">Blog</a>
							</li>
							<li class="nav-item">
								<a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-white" target="_blank">License</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</footer> -->
	</div>
	<div class="ps__rail-x" style="left: 0px; bottom: 0px;">
		<div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
	</div>
	<div class="ps__rail-y" style="top: 0px; right: 0px;">
		<div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
	</div>














<script>
	$('#userr').on("blur", function() {
		// alert('55555555555555');
		event.preventDefault();
		var username = $('input[name=userr]').val();

		if (username !== "") {
			// $.notify("ไม่มีข้อมูล โปรดตรวจสอบ!!", "info");
			$.ajax({
				type: 'POST',
				// dataType:'JSON'
				url: '<?php echo base_url(); ?>Login/check_user',
				data: {
					username: username
				},
				success: function(data) {
					// alert(data)
					if (data === 'account_no_data') {
						Swal.fire({
							html: "<p>ไม่มี " + username + " ในระบบ !</p><p>Error username not found.!</p>",
							icon: 'warning',
							showClass: {
								popup: 'animate__animated animate__fadeInDown'
							},
							hideClass: {
								popup: 'animate__animated animate__fadeOutUp'
							}
						})
						// $.notify("Not have data in database.!!", "info");
					} else if (data === 'delete_account') {
						Swal.fire({
							html: "<p>" + username + " นี้ถูกลบไปแล้ว !</p><p>Error Firstname not found.!</p>",
							icon: 'warning',
							showClass: {
								popup: 'animate__animated animate__fadeInDown'
							},
							hideClass: {
								popup: 'animate__animated animate__fadeOutUp'
							}
						})
						// $.notify("This account has been delete.!!", "warn");
					} else if (data === 'ban_account') {
						Swal.fire({
							html: "<p>" + username + " นี้ถูกระงับการใช้งานแล้ว !</p><p>Error Firstname not found.!</p>",
							icon: 'warning',
							showClass: {
								popup: 'animate__animated animate__fadeInDown'
							},
							hideClass: {
								popup: 'animate__animated animate__fadeOutUp'
							}
						})
						// $.notify("This account has been disabled.!!", "info");
					}
				}
			})
		}

		// console.log("ttttttttt" + username);
		// $.ajax({
		// 	type: "POST",
		// 	// dataType: "json",
		// 	url: '<?php echo base_url(); ?>login/user',
		// 	data:{ 
		// 		user:username
		// 	},
		// 	success: function (data) {}
		// })
	})

	function check_login() {
		// window.location = 'Login/den'
		event.preventDefault();
		// alert('55555555555555');
		var username = $('input[name=userr]').val();
		var pass = $('input[name=pass]').val();
		var action = $('input[name=action]').val();
		if (username !== "") {
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url(); ?>Login/check_user',
				data: {
					username: username
				},
				success: function(data) {
					// alert(data)
					if (data === 'account_no_data') {
						Swal.fire({
							html: "<p>ไม่มี " + username + " ในระบบ !</p><p>Error Firstname not found.!</p>",
							icon: 'warning',
							showClass: {
								popup: 'animate__animated animate__fadeInDown'
							},
							hideClass: {
								popup: 'animate__animated animate__fadeOutUp'
							}
						})
						// $.notify("ไม่มีข้อมูลในระบบ!!", "info");
					} else if (data === 'delete_account') {
						Swal.fire({
							html: "<p>" + username + " นี้ถูกลบไปแล้ว !</p><p>Error Firstname not found.!</p>",
							icon: 'warning',
							showClass: {
								popup: 'animate__animated animate__fadeInDown'
							},
							hideClass: {
								popup: 'animate__animated animate__fadeOutUp'
							}
						})
						// $.notify("ผู้ใช้นี้ถูกลบไปแล้ว!!", "warn");
					} else if (data === 'ban_account') {
						Swal.fire({
							html: "<p>" + username + " นี้ถูกระงับการใช้งานแล้ว !</p><p>Error Firstname not found.!</p>",
							icon: 'warning',
							showClass: {
								popup: 'animate__animated animate__fadeInDown'
							},
							hideClass: {
								popup: 'animate__animated animate__fadeOutUp'
							}
						})
						// $.notify("ผู้ใช้นี้ถูกระงับการใช้งานแล้ว!!", "info");
					} else if (data === 'suc_account') {
						if (pass !== "") {
							// alert($("#frm_login").serialize())
							$.ajax({
								type: 'POST',
								url: '<?php echo base_url(); ?>Login/check_pass',
								data: {
									username: username,
									pass: pass,
									action: action
								},
								success: function(data_pass) {
									// alert(data_pass)
									if (data_pass === 'error_pass') {
										Swal.fire({
											html: "<p>Password ไม่ถูกต้อง !</p><p>Error Firstname not found.!</p>",
											icon: 'warning',
											showClass: {
												popup: 'animate__animated animate__fadeInDown'
											},
											hideClass: {
												popup: 'animate__animated animate__fadeOutUp'
											}
										})
										// $.notify("ผู้ใช้นี้ถูกระงับการใช้งานแล้ว!!", "info");
									} else if (data_pass === 'suc_pass') {
										// exit('stop');
										// location.replace("Login/Manage")
										window.location = 'Manage'
									} else if (data_pass === 'suc_pass_menu') {
										// exit('stop');
										window.location = 'Manage_menu'
										// location.replace("Login/Manage_menu")
									}
								}
							})
							// $.ajax({
							// 	type: 'POST',
							// 	url: '<?php echo base_url(); ?>Login/user',
							// 	data: $("#frm_login").serialize(),
							// 	success: function(data) {
							// 		alert(data)
							// 	}
							// })
						} else {
							Swal.fire({
								html: "<p>กรุณากรอก Password !</p><p>Error Password not found.!</p>",
								icon: 'warning',
								showClass: {
									popup: 'animate__animated animate__fadeInDown'
								},
								hideClass: {
									popup: 'animate__animated animate__fadeOutUp'
								}
							})
							// $.notify("กรุณากรอก Password!!", "info");
						}
					}
				}
			})
		} else {
			Swal.fire({
				html: "<p>กรุณากรอก User !</p><p>Error User not found.!</p>",
				icon: 'warning',
				showClass: {
					popup: 'animate__animated animate__fadeInDown'
				},
				hideClass: {
					popup: 'animate__animated animate__fadeOutUp'
				}
			})
			// $.notify("กรุณากรอก User!!", "info");
		}
	}

	function username() {
		if ($('input[name=userr]').val() !== '') {
			$('#star_U').html('<span><span>')
		} else {
			$('#star_U').html('<span style="color:red;">*<span>')
		}
	}

	function passwordU() {
		if ($('input[name=pass]').val() !== '') {
			$('#star_P').html('<span><span>')
		} else {
			$('#star_P').html('<span style="color:red;">*<span>')
		}
	}
</script>