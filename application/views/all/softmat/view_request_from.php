<style>
	.column {
		float: left;
		width: 50%;
		padding: 5px;
	}

	/* .column2 {
        float: left;
        width: 50%;
        padding: 5px;
    } */

	.setting_img_re_quest {
		/* max-width: 140px; */
		/* max-height: 140px; */
		height: 80px;
		width: 80px;
		object-fit: cover;
		/* height: 8%; */
		/* object-fit: scale-down; */
		display: block;
		border-radius: 50%;
		margin-left: auto;
		margin-right: auto;
	}

	.setting_img_request {
		/* max-height: 100px; */
		height: 100%;
		object-fit: cover;

		display: block;
		margin-left: auto;
		margin-right: auto;
	}

</style>
<div class="container-xxl flex-grow-1 container-p-y">
	<!-- <h1>FORM REQUEST</h1> -->
	<img style=" min-width: 170px; width: 30%; min-height: 16px;  max-height: 30px;"
		src="<?php echo base_url(); ?>./themes/softmat/img/f_re.png" alt="user">

	<div class="row">
		<div class="col-lg-12 mb-12 sm-12 my-1">



			<form action="" id="form_request" class="was-validated">
				<div class="row">
					<div class="col-lg-12 col-mb-12 col-sm-12 my-1">

						<div class="nav-align-top mb-4">
							<ul class="nav nav-pills mb-3 nav-fill" role="tablist">
								<li class="nav-item">
									<button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
										data-bs-target="#navs-pills-justified-data"
										aria-controls="navs-pills-justified-data" aria-selected="true">
										<i class="tf-icons bx bx-data"></i> Data
									</button>
								</li>
								<li class="nav-item">
									<button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
										data-bs-target="#navs-pills-justified-file"
										aria-controls="navs-pills-justified-file" aria-selected="false">
										<i class="tf-icons bx bx-file"></i> Add File
									</button>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane fade show active" id="navs-pills-justified-data" role="tabpanel">

									<div class="row">
										<div class="col-lg-12 col-sm-12">

											<div class="column">
												<div style="text-align: center;">
													<h6>
														<span>
															IS By
														</span>
													</h6>
												</div>
												<img id="img_issue_name" class="setting_img_re_quest"
													src="<?php echo base_url(); ?>./themes/softmat/img/user.png"
													alt="user">
												<div style="text-align: center; margin-top:5px">
													<h6>
														<span id="issue_name">
															xxxxx
														</span>
													</h6>
												</div>
											</div>

											<!-- <div style="text-align: center; " class="column">
                                                <i class='bx bx-right-arrow bx-fade-right'></i>
                                                <i class='bx bx-right-arrow bx-fade-right'></i><br>


                                            </div> -->

											<div class="column">
												<div style="text-align: center;">
													<h6>
														<span>
															SP By
														</span>
													</h6>
												</div>
												<img id="img_support_name" class="setting_img_re_quest"
													src="<?php echo base_url(); ?>./themes/softmat/img/user.png"
													alt="user">
												<div style="text-align: center;margin-top:5px">
													<h6>
														<span id="support_name">
															xxxxx
														</span>
													</h6>
												</div>
											</div>


										</div>
									</div>

									<div class="row">
										<div class="col-lg-6 col-mb-6 col-sm-6 my-1">
											<div class=" input-group-outline input-group-sm">
												<label>Department Issue:</label>
												<select selected onchange="open_issue(value)" id="html_issue_dep"
													name="re_department_issue" class="form-control" required>
													<option value="">--- Department ---</option>
												</select>

											</div>


											<div id="html_issue_by_box">
												<label>Issue By:</label>
												<div class=" input-group-outline input-group input-group-sm">
													<select onchange="issue_by(value)" disabled id="html_issue_by"
														name="re_issue" class="form-control" required>
														<option selected value="">--- Issue ---</option>
													</select>

												</div>
											</div>

										</div>

										<div class="col-lg-6 col-mb-6 col-sm-6 my-1">
											<div class=" input-group-outline input-group-sm">
												<label>Department Sup:</label>
												<select selected onchange="open_support(value)" id="html_support_dep"
													name="re_department" class="form-control" required>
													<option value="">--- Department ---</option>
												</select>

											</div>

											<div class=" input-group-outline input-group-sm">
												<label>Support By:</label>
												<select onchange="support_by(value)" disabled id="html_support_by"
													name="re_support" class="form-control" required>
													<option selected value="">--- Support ---</option>
												</select>

											</div>
										</div>

										<div class="col-lg-6 col-mb-6 col-sm-6 ">
											<div class=" input-group-outline input-group-sm">
												<label>Type:</label>
												<select disabled onchange="check_data_type(value)" id="html_type"
													name="re_type" class="form-control selectpicker"
													data-live-search="true" required>
													<option selected value="">--- Type ---</option>
												</select>

											</div>
										</div>

										<div class="col-lg-6 col-mb-6 col-sm-6 ">
											<div class=" input-group-outline input-group-sm">
												<label>System:</label>
												<select disabled onchange="check_data_system(value)" id="html_system"
													name="re_system" class="form-control selectpicker"
													data-live-search="true" required>
													<option selected value="">--- System ---</option>
												</select>

											</div>
										</div>

										<div id="col_priority_type" class="col-lg-12 col-mb-12 col-sm-12">
											<div class=" input-group-outline input-group-sm">
												<label>Category:</label>
												<select disabled id="html_category" name="re_category"
													class="form-control" required>
													<option selected value="">--- Category ---</option>
												</select>

											</div>
										</div>

										<div id="show_priority" class="col-lg-6 col-mb-6 col-sm-6 ">

										</div>
									</div>
									<div class="row">
										<div id="col_line_system" class="col-lg-12 col-sm-12 ">
											<div class=" input-group-outline input-group-sm">
												<label>Subject:</label>
												<input type="text" class="form-control" placeholder="Enter Subject"
													name="re_subject" required>

											</div>
										</div>

										<div id="show_line" class="col-lg-6 col-mb-6 col-sm-6 ">

										</div>

										<div class="col-lg-12 col-sm-12 ">
											<div class=" input-group-outline input-group-sm">
												<label>Detail:</label>
												<textarea name="re_detail" id="" cols="30" rows="3" class="form-control"
													placeholder="Detail........" required></textarea>

											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="navs-pills-justified-file" role="tabpanel">


									<div class="row">





										<div class="col-lg-12 col-sm-12 my-2">
											<div
												style="  height: 350px;    border-radius: 10px;border-style: dotted; border-color: blue;">
												<span>
													<img id="show_data_img_request1"
														onclick="$('#upload_img_request1').click()"
														class=" setting_img_request "
														src="<?php echo base_url(); ?>./themes/softmat/img/upload_file.png"
														alt="user">
													<img id="show_data_img_request2"
														onclick="$('#upload_img_request2').click()"
														class=" setting_img_request "
														src="<?php echo base_url(); ?>./themes/softmat/img/upload_file.png"
														alt="user" style="display: none;">
													<img id="show_data_img_request3"
														onclick="$('#upload_img_request3').click()"
														class=" setting_img_request "
														src="<?php echo base_url(); ?>./themes/softmat/img/upload_file.png"
														alt="user" style="display: none;">
												</span>
												<!-- <span>
                                                    <img id="show_data_file_request" onclick="$('#upload_file_request').click()" class=" setting_img_request column_img" src="<?php echo base_url(); ?>./themes/softmat/img/upload_file.png" alt="user">
                                                </span>
                                                <span>
                                                    <img id="show_data_file_request" onclick="$('#upload_file_request').click()" class=" setting_img_request column_img" src="<?php echo base_url(); ?>./themes/softmat/img/upload_file.png" alt="user">
                                                </span> -->


												<input id="upload_img_request1" onchange="show_img_request1(this)"
													name="re_img1" type="file"
													accept="image/png, image/gif, image/jpeg, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,application/pdf"
													hidden readonly>
												<input id="upload_img_request2" onchange="show_img_request2(this)"
													name="re_img2" type="file"
													accept="image/png, image/gif, image/jpeg, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,application/pdf"
													hidden readonly>
												<input id="upload_img_request3" onchange="show_img_request3(this)"
													name="re_img3" type="file"
													accept="image/png, image/gif, image/jpeg, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,application/pdf"
													hidden readonly>
												<!-- <input id="upload_file_request" onchange="show_file_request(this)" name="re_file" type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,application/pdf" hidden readonly> -->

											</div>
											<div class=""
												style="  display: flex; justify-content: center; align-items: center;">
												<button onclick="remove_img_request1()"
													class=" btn  btn-sm  btn-warning my-2">Remove</button>
											</div>
											<div class=""
												style="  display: flex; justify-content: center; align-items: center;">
												<button onclick="op_img(1)" type="button"
													class=" btn  btn-sm  btn-warning my-2"
													style="margin-right: 5px;">Image 1</button>
												<button onclick="op_img(2)" type="button"
													class=" btn  btn-sm  btn-warning my-2"
													style="margin-right: 5px;">Image 2</button>
												<button onclick="op_img(3)" type="button"
													class=" btn  btn-sm  btn-warning my-2">Image 3</button>
											</div>
											<!-- <div class="column2" style="  display: flex; justify-content: center; align-items: center;">
                                            <button onclick="remove_file_request()" class=" btn  btn-sm  btn-warning my-2">Remove</button>
                                        </div> -->
										</div>
									</div>
									<input type="hidden" name="action" value="<?php echo base64_encode('request'); ?>">
									<div style=" float:right;" class="margin_top_fig ">
										<button onclick="clear_data_re()" id="clear_form_re" type="reset"
											class="btn  btn-sm  btn-primary">Clear</button>
										<button type="submit" onclick="send_data_request()"
											class="btn  btn-sm  btn-success">Send</button>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</form>


		</div>
	</div>

</div>


<!-- ------------------------------------------------------------------------------------------------------------------------ -->

<script>
	function op_img(num) {
		if (num == 1) {
			$('#show_data_img_request1').css('display', 'block');
			$('#show_data_img_request2').css('display', 'none');
			$('#show_data_img_request3').css('display', 'none');
		} else if (num == 2) {
			$('#show_data_img_request1').css('display', 'none');
			$('#show_data_img_request2').css('display', 'block');
			$('#show_data_img_request3').css('display', 'none');
		} else if (num == 3) {
			$('#show_data_img_request1').css('display', 'none');
			$('#show_data_img_request2').css('display', 'none');
			$('#show_data_img_request3').css('display', 'block');
		}
	}

	function clear_data_re() {
		$('#support_name').html('<span>xxxxx</span>')
		$('#img_support_name').attr('src', '<?php echo base_url(); ?>./themes/softmat/img/user.png')
		$('#issue_name').html('<span>xxxxx</span>')
		$('#img_issue_name').attr('src', '<?php echo base_url(); ?>./themes/softmat/img/user.png')

		$("#show_data_img_request1").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_file.png")
		$('#upload_img_request1').val('')
		open_support('')
		var html_issue_by = '';
		html_issue_by += '<div class=" input-group-outline input-group-sm">'
		html_issue_by += '<label>Issue By:</label>'
		html_issue_by +=
			'<select onchange="issue_by(value)" disabled id="html_issue_by" name="re_issue" class="form-control" required>'
		html_issue_by += '<option selected value="">--- Issue ---</option>'
		html_issue_by += '</select>'
		html_issue_by += '</div>'
		$("#html_issue_by_box").html(html_issue_by)
	}

	function remove_img_request1() {
		event.preventDefault()
		$("#show_data_img_request1").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_file.png")
		$("#show_data_img_request2").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_file.png")
		$("#show_data_img_request3").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_file.png")
		$('#upload_img_request1').val('')
		$('#upload_img_request2').val('')
		$('#upload_img_request3').val('')
	}

	function check_data_system(system_id) {
		var html_line = '';
		var dep_issue_id = $('select[name=re_department_issue]').val()
		if (dep_issue_id !== '') {
			// alert(dep_issue_id + '==>' + system_id)
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: '<?php echo base_url(); ?>GET_API/check_data_system',
				data: {
					dep_issue_id: dep_issue_id,
					system_id: system_id
				},
				success: function (reply_check) {
					// console.log(reply_check)
					if (reply_check !== null && reply_check !== '') {
						$("#col_line_system").removeClass("col-lg-12").addClass("col-lg-6");
						html_line = '';
						html_line += '<div class=" input-group-outline input-group-sm">';
						html_line += '<label>Line:</label>';
						html_line += '<select id="html_line" name="re_line" class="form-control" required>';
						html_line += '<option selected value="">--- line ---</option>';
						$.each(reply_check, function (key_lp, val_lp) {
							html_line += '<option  value="' + val_lp.lp_id + '">' + val_lp.lp_name +
								'</option>'
						})
						html_line += '</select>';
						html_line += '</div>';
					} else {
						$("#col_line_system").removeClass("col-lg-6").addClass("col-lg-12");
						html_line = '';
						// Swal.fire({
						//     html: "<p>No Data</p><p>Warning</p>",
						//     icon: 'warning',
						// })
					}
					// console.log(html_line)
					$("#show_line").html(html_line)
				}
			})
		}


	}

	function check_data_type(type_id) {
		var html_priority = '';
		var dep_sup_id = $('select[name=re_department]').val()
		if (dep_sup_id !== '') {
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: '<?php echo base_url(); ?>GET_API/check_data_type',
				data: {
					dep_sup_id: dep_sup_id,
					type_id: type_id
				},
				success: function (reply_check) {
					// console.log(reply_check)
					if (reply_check !== null && reply_check !== '') {
						$("#col_priority_type").removeClass("col-lg-12 col-mb-12 col-sm-12").addClass(
							"col-lg-6 col-mb-6 col-sm-6");
						html_priority = '';
						html_priority += '<div class=" input-group-outline input-group-sm">';
						html_priority += '<label>Priority:</label>';
						html_priority +=
							'<select id="html_priority" name="re_priority" class="form-control" required>';
						html_priority += '<option selected value="">--- Priority ---</option>';
						$.each(reply_check, function (key_pri, val_pri) {
							html_priority += '<option  value="' + val_pri.pri_id + ' ' + val_pri
								.time_priority + '">' + val_pri.pri_name + '</option>'
						})
						html_priority += '</select>';
						html_priority += '</div>';
					} else {
						$("#col_priority_type").removeClass("col-lg-6 col-mb-6 col-sm-6").addClass(
							"col-lg-12 col-mb-12 col-sm-12");
						html_priority = '';
						// Swal.fire({
						//     html: "<p>No Data</p><p>Warning</p>",
						//     icon: 'warning',
						// })
					}
					// console.log(html_priority)
					$("#show_priority").html(html_priority)
				}
			})
		}


	}

	function support_by(user_id) {
		// alert(user_id)
		if (user_id === $('select[name=re_issue]').val()) {
			open_issue($('select[name=re_department_issue]').val())
		}
		if (user_id !== '') {
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: '<?php echo base_url(); ?>Manage_user/get_data_edit_user',
				data: {
					user_id: user_id
				},
				beforeSend: function () {
					$("#img_support_name").attr("src",
						"<?php echo base_url(); ?>./themes/softmat/img/loading3.gif")

				},
				complete: function () {
					$("#img_support_name").attr('style', 'display');
				},
				success: function (data_user) {
					$.each(data_user, function (key_user, val_user) {
						$('#img_support_name').attr('src', '<?php echo base_url(); ?>' + val_user
							.path_img_user)
						$('#support_name').html('<span>' + val_user.employee + '</span>')
					})

				}
			})
		} else {
			$('#support_name').html('<span>xxxxx</span>')
			$('#img_support_name').attr('src', '<?php echo base_url(); ?>./themes/softmat/img/user.png')
		}

	}

	function issue_by(user_id) {
		if (user_id === $('select[name=re_support]').val()) {
			open_support($('select[name=re_department]').val())
		}
		if (user_id !== '') {
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: '<?php echo base_url(); ?>Manage_user/get_data_edit_user',
				data: {
					user_id: user_id
				},
				beforeSend: function () {
					$("#img_issue_name").attr("src",
						"<?php echo base_url(); ?>./themes/softmat/img/loading3.gif")

				},
				complete: function () {
					$("#img_issue_name").attr('style', 'display');
				},
				success: function (data_user) {
					$.each(data_user, function (key_user, val_user) {
						$('#img_issue_name').attr('src', '<?php echo base_url(); ?>' + val_user
							.path_img_user)
						$('#issue_name').html('<span>' + val_user.employee + '</span>')
					})

				}
			})
		} else {
			$('#issue_name').html('<span>xxxxx</span>')
			$('#img_issue_name').attr('src', '<?php echo base_url(); ?>./themes/softmat/img/user.png')
		}

	}

	function open_support(dep_id) {
		open_type(dep_id)
		open_category(dep_id)

		var html_priority = ''
		$("#show_priority").html(html_priority)
		$("#col_priority_type").removeClass("col-lg-6 col-mb-6 col-sm-6").addClass("col-lg-12 col-mb-12 col-sm-12");
		var html_support_by = '';
		// alert(support_by)
		$('#support_name').html('<span>xxxxx</span>')
		$('#img_support_name').attr('src', '<?php echo base_url(); ?>./themes/softmat/img/user.png')
		// alert(dep_id)
		if (dep_id !== '') {
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: '<?php echo base_url(); ?>GET_API/get_support_by',
				data: {
					dep_id: dep_id,
				},
				success: function (reply_support) {
					// console.log(reply_support)
					if (reply_support !== null && reply_support !== '') {
						$("#html_support_by").removeAttr("disabled")
						html_support_by = '';
						html_support_by += '<option selected value="">--- Support ---</option>';
						$.each(reply_support, function (key_support, val_support) {
							html_support_by += '<option  value="' + val_support.user_id + '">' +
								val_support.f_name + ' ' + val_support.l_name + ' (' + val_support
								.employee + ')</option>'
						})
					} else {
						$("#html_support_by").attr("disabled", true)
						html_support_by = '';
						html_support_by += '<option selected value="">--- (No Employee) ---</option>';
					}
					$("#html_support_by").html(html_support_by)
				}
			})
		} else {
			$("#html_support_by").attr("disabled", true)
			$('select[name=re_support]').val('')
			$('#support_name').html('<span>xxxxx</span>')
			$('#img_support_name').attr('src', '<?php echo base_url(); ?>./themes/softmat/img/user.png')
		}


	}

	function open_type(dep_id) {
		var html_type = '';
		if (dep_id !== '') {
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: '<?php echo base_url(); ?>GET_API/get_data_type',
				data: {
					dep_id: dep_id,
				},
				success: function (reply_type) {
					// console.log(reply_type)
					if (reply_type !== null && reply_type !== '') {
						$("#html_type").removeAttr("disabled")
						html_type = '';
						html_type += '<option selected value="">--- Type ---</option>';
						$.each(reply_type, function (key_type, val_type) {
							html_type += '<option  value="' + val_type.type_id + '">' + val_type
								.type_name + '</option>'
						})
					} else {
						$("#html_type").attr("disabled", true)
						html_type = '';
						html_type += '<option selected value="">--- (No Type) ---</option>';
					}
					$("#html_type").html(html_type)
				}
			})
		} else {
			$("#html_type").attr("disabled", true)
			$('select[name=re_type]').val('')
		}


	}

	function open_category(dep_id) {
		var html_category = '';
		// var issue_by = $('select[name=re_issue]').val()
		// alert(support_by)
		if (dep_id !== '') {
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: '<?php echo base_url(); ?>GET_API/get_data_category',
				data: {
					dep_id: dep_id,
				},
				success: function (reply_cat) {
					// console.log(reply_cat)
					if (reply_cat !== null && reply_cat !== '') {
						$("#html_category").removeAttr("disabled")
						html_category = '';
						html_category += '<option selected value="">--- Category ---</option>';
						$.each(reply_cat, function (key_cat, val_cat) {
							html_category += '<option  value="' + val_cat.cat_id + '">' + val_cat
								.cat_name + '</option>'
						})
					} else {
						$("#html_category").attr("disabled", true)
						html_category = '';
						html_category += '<option selected value="">--- (No Category) ---</option>';
					}
					$("#html_category").html(html_category)
				}
			})
		} else {
			$("#html_category").attr("disabled", true)
			$('select[name=re_category]').val('')
		}


	}

	function open_system(dep_id) {
		var html_system = '';
		// var issue_by = $('select[name=re_issue]').val()
		// alert(support_by)
		if (dep_id !== '') {
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: '<?php echo base_url(); ?>GET_API/get_data_system',
				data: {
					dep_id: dep_id,
				},
				success: function (reply_sys) {
					// console.log(reply_sys)
					if (reply_sys !== null && reply_sys !== '') {
						$("#html_system").removeAttr("disabled")
						html_system = '';
						html_system += '<option selected value="">--- System ---</option>';
						$.each(reply_sys, function (key_sys, val_sys) {
							// alert(val_sys.system_id)
							html_system += '<option  value="' + val_sys.system_id + '">' + val_sys
								.system_name + '</option>'
						})
					} else {
						$("#html_system").attr("disabled", true)
						html_system = '';
						html_system += '<option selected value="">--- (No System) ---</option>';
					}
					$("#html_system").html(html_system)
				}
			})
		} else {
			$("#html_system").attr("disabled", true)
			$('select[name=re_system]').val('')
		}


	}

	function text_box() {
		// alert('fjnfgjn')
		html_issue_by = '';
		html_issue_by += '<label >Issue By:</label>'
		html_issue_by += '<div class=" input-group-outline input-group input-group-sm">'
		html_issue_by +=
			'<input type="text" class="form-control" placeholder="Enter Issue name" name="issue_box" required>'
		html_issue_by += '<button class="btn  btn-sm btn-secondary" onclick="open_issue(' + $(
			'select[name=re_department_issue]').val() + ')" type="button"><i class="bx bx-carousel"></i></button>'
		html_issue_by += '</div>'
		$("#html_issue_by_box").html(html_issue_by)
		$('#issue_name').html('<span>xxxxx</span>')
		$('#img_issue_name').attr('src', '<?php echo base_url(); ?>./themes/softmat/img/user.png')

	}

	function show_img_request1(input_img) {
		if (input_img.files && input_img.files[0]) {
			var imgType = input_img.files[0]['type'];
			var chk = imgType.split("/");
			var reader = new FileReader();
			reader.onload = function (e) {
				// console.log(e)
				if(chk[0]!="application"){
					$("#show_data_img_request1").attr("src", e.target.result)
				}else{$("#show_data_img_request1").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_file_icon.png")}
			}
			reader.readAsDataURL(input_img.files[0]);
		} else {
			$("#show_data_img_request1").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_img.png")
		}
	}

	function show_img_request2(input_img) {
		if (input_img.files && input_img.files[0]) {
			var imgType = input_img.files[0]['type'];
			var chk = imgType.split("/");
			var reader = new FileReader();
			reader.onload = function (e) {
				// console.log(e)
				if(chk[0]!="application"){
					$("#show_data_img_request2").attr("src", e.target.result)
				}else{$("#show_data_img_request2").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_file_icon.png")}
			}
			reader.readAsDataURL(input_img.files[0]);
		} else {
			$("#show_data_img_request2").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_img.png")
		}
	}

	function show_img_request3(input_img) {
		if (input_img.files && input_img.files[0]) {
			var imgType = input_img.files[0]['type'];
			var chk = imgType.split("/");
			var reader = new FileReader();
			reader.onload = function (e) {
				// console.log(e)
				if(chk[0]!="application"){
					$("#show_data_img_request3").attr("src", e.target.result)
				}else{$("#show_data_img_request3").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_file_icon.png")}
			}
			reader.readAsDataURL(input_img.files[0]);
		} else {
			$("#show_data_img_request3").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_img.png")
		}
	}

	function open_issue(dep_id) {
		// alert(dep_id)
		open_system(dep_id)
		$('#issue_name').html('<span>xxxxx</span>')
		$('#img_issue_name').attr('src', '<?php echo base_url(); ?>./themes/softmat/img/user.png')
		var html_issue_by = '';
		// alert(support_by)
		if (dep_id !== '') {
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: '<?php echo base_url(); ?>GET_API/get_issue_by',
				data: {
					dep_id: dep_id,
				},
				success: function (reply_issue) {
					// console.log(reply_issue)
					if (reply_issue !== null && reply_issue !== '') {
						$("#html_issue_by").removeAttr("disabled")
						html_issue_by = '';
						html_issue_by += '<label>Issue By:</label>'
						html_issue_by += '<div class=" input-group-outline input-group  input-group-sm">'
						html_issue_by +=
							'<select onchange="issue_by(value)" id="html_issue_by" name="re_issue" class="form-control" required>'
						html_issue_by += '<option selected value="">--- Issue ---</option>'

						// html_issue_by += '<option selected value="">--- Issue ---</option>';
						$.each(reply_issue, function (key_issue, val_issue) {
							html_issue_by += '<option  value="' + val_issue.user_id + '">' + val_issue
								.f_name + ' ' + val_issue.l_name + ' (' + val_issue.employee +
								')</option>'
						})
						html_issue_by += '</select>'
						html_issue_by +=
							'<button class="btn  btn-sm btn-secondary" onclick="text_box()" type="button"><i class="bx bx-text"></i></button>'
						html_issue_by += '</div>'
					} else {
						$("#html_issue_by").attr("disabled", true)
						html_issue_by = '';
						html_issue_by += '<label >Issue By:</label>'
						html_issue_by += '<div class=" input-group-outline input-group input-group-sm">'
						html_issue_by +=
							'<input type="text" class="form-control" placeholder="Enter Issue name" name="issue_box" required>'
						html_issue_by += '<button class="btn  btn-sm btn-secondary" onclick="open_issue(' + $(
								'select[name=re_department_issue]').val() +
							')" type="button"><i class="bx bx-carousel"></i></button>'
						html_issue_by += '</div>'
					}
					$("#html_issue_by_box").html(html_issue_by)
					// $("#html_issue_by").html(html_issue_by)
				}
			})
		} else {
			$("#html_issue_by").attr("disabled", true)
			var html_issue_by = '';
			html_issue_by += '<div class=" input-group-outline input-group-sm">'
			html_issue_by += '<label>Issue By:</label>'
			html_issue_by +=
				'<select onchange="issue_by(value)" disabled id="html_issue_by" name="re_issue" class="form-control" required>'
			html_issue_by += '<option selected value="">--- Issue ---</option>'
			html_issue_by += '</select>'
			html_issue_by += '</div>'
			$("#html_issue_by_box").html(html_issue_by)
			$('#img_issue_name').attr('src', '<?php echo base_url(); ?>./themes/softmat/img/user.png')
			$('#issue_name').html('<span>xxxxx</span>')
		}


	}

	function send_data_request() {
		event.preventDefault()
		Swal.fire({
			title: "ต้องการ Create Quest?",
			text: "หรือไม่",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#35D735',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Send!'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					type: 'POST',
					dataType: 'json',
					url: '<?php echo base_url(); ?>request/send_data_request',
					data: form_data,
					cache: false,
					processData: false,
					contentType: false,
					success: function (reply_request) {
						console.log(reply_request)
						if (reply_request !== true && reply_request !== false) {
							Swal.fire({
								html: "<p>" + reply_request + "</p>",
								icon: 'warning',
							})

						} else if (reply_request === true) {
							Swal.fire({
								html: "<p>Create Requset</p><p>Success</p>",
								icon: 'success',
							})
							$('#clear_form_re').click()
						} else if (reply_request === false) {
							Swal.fire({
								html: "<p>Create Requset</p><p>Error</p>",
								icon: 'error',
							})
						}
					}
				})
			}
		})
		const form = document.getElementById('form_request');
		var form_data = new FormData(form);
		// alert(form_data)

	}

	$(document).ready(function () {
		department_issue()
		department_support()
	})

	function department_issue() {
		var dep_support = $('select[name=re_department]').val()
		var html_issue_dep = '';
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: '<?php echo base_url(); ?>GET_API/department_data',
			data: {
				dep_id: dep_support
			},
			success: function (department_data) {
				html_issue_dep = '';
				html_issue_dep += '<option selected value="">--- Department ---</option>';
				$.each(department_data, function (key_dep, val_dep) {
					html_issue_dep += '<option  value="' + val_dep.dep_id + '">' + val_dep.dep_name +
						'</option>'
				})
				$("#html_issue_dep").html(html_issue_dep)

			}
		})
	}

	function department_support() {
		var dep_issue = $('select[name=re_department_issue]').val()
		var html_support_dep = '';
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: '<?php echo base_url(); ?>GET_API/department_data',
			data: {
				dep_id: dep_issue
			},
			success: function (department_data) {
				html_support_dep = '';
				html_support_dep += '<option selected value="">--- Department ---</option>';
				$.each(department_data, function (key_dep, val_dep) {
					html_support_dep += '<option  value="' + val_dep.dep_id + '">' + val_dep.dep_name +
						'</option>'
				})
				$("#html_support_dep").html(html_support_dep)

			}
		})
	}

</script>
