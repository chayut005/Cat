<style>
	.border_img {
		border-radius: 50% !important;
	}

	.setting_img {
		max-width: 25%;
		min-width: 70px;

		/* height: 8%; */
		object-fit: scale-down;
		display: block;
		border-radius: 10%;
		margin-left: auto;
		margin-right: auto;
	}

	.setting_img_user {
		height: 130px;
		width: 130px;
		object-fit: cover;

		display: block;
		margin-left: auto;
		margin-right: auto;
	}

	.margin_top_fig {
		margin-top: 6.5px;
	}

	.setting_img_request {
		height: 100%;
		object-fit: cover;

		display: block;
		margin-left: auto;
		margin-right: auto;
	}

	.columnxx {
		float: left;
		width: 100%;
		padding: 5px;
	}

	.setting_img_u_alert {
		height: 125px;
		width: 125px;
		object-fit: cover;
		display: block;
		border-radius: 100%;
		margin-left: auto;
		margin-right: auto;
	}

	.column {
		float: left;
		width: 50%;
		padding: 5px;
	}

	.colstra {
		float: left;
		width: 70px;
		padding: 5px;
	}
</style>
<div class="container-xxl flex-grow-1 container-p-y">
	<img style=" min-width: 170px; width: 25%; min-height: 16px;  max-height: 30px;" src="<?php echo base_url(); ?>./themes/softmat/img/rw.png" alt="user">

	<div class="row">
		<div style="    display: grid;" class="col-lg-3 col-mb-3 col-sm-3 order-0 my-1">
			<div class="card mb-4">
				<div class="card-body">

					<img id="img_user_way" class="setting_img_user border_img" src="<?php echo base_url(); ?>./themes/softmat/img/user.png" alt="user">
					<div style="text-align: center; margin-top:10px;">
						<h6>
							<div>
								<h5><?php echo $this->session->userdata('sessUsr'); ?></h5>
							</div>
						</h6>
					</div>
					<div class="button-wrapper">
						<a href="<?php echo base_url() . 'Manage/Home/'; ?>" style="float: left;" type="button" class="btn  btn-sm btn-primary ">
							<span class="d-none d-sm-block">Home</span>
							<i class="bx bx-home-alt d-block d-sm-none"></i>
						</a>
						<a href="<?php echo site_url('manage/logout'); ?>" style="float: right;" type="button" onclick="" class="btn btn-sm btn-danger ">
							<i class="bx  bx-log-in d-block d-sm-none"></i>
							<span class="d-none d-sm-block">Logout</span>
						</a>
					</div>

				</div>
			</div>
		</div>

		<div class="col-lg-9 col-mb-9 col-sm-9 order-0 my-1">
			<div class="card mb-4">
				<div class="card-body">
					<form id="form_quest_way" class="was-validated">
						<div class="row">
							<div class="col-lg-4 col-mb-4 col-sm-4">

								<div class=" input-group-outline input-group-sm my-1">
									<label>Department:</label>
									<select selected onchange="open_support(value)" id="html_sup_dep_way" name="way_department" class="form-control" required>
										<option value="">--- Department ---</option>
									</select>
								</div>

								<div class=" input-group-outline input-group-sm my-2">
									<label>Support By:</label>
									<select disabled selected onchange="" id="html_support_by_way" name="support_way" class="form-control" required>
										<option value="">--- Support ---</option>
									</select>
								</div>

								<div class=" input-group-outline input-group-sm my-2">
									<label>Type:</label>
									<select disabled selected onchange="check_data_type(value)" id="html_type_way" name="type_way" class="form-control" required>
										<option value="">--- Type ---</option>
									</select>
								</div>

								<div class=" input-group-outline input-group-sm my-2">
									<label>System:</label>
									<select selected onchange="check_data_system(value)" id="html_system_way" name="system_way" class="form-control" required>
										<option value="">--- System ---</option>
									</select>
								</div>

							</div>

							<div class="col-lg-4 col-mb-4 col-sm-4  ">

								<div id="show_priority_way">

								</div>

								<div id="show_line_way">

								</div>

								<div class=" input-group-outline input-group-sm my-1">
									<label>Subject:</label>
									<input type="text" class="form-control" placeholder="Enter Subject" name="subject_way" required>
								</div>

								<div class=" input-group-outline input-group-sm my-2">
									<label>Detail:</label>
									<textarea name="detail_way" id="" cols="30" rows="2" class="form-control" placeholder="Detail........" required></textarea>

								</div>
							</div>

							<div class="col-lg-4 col-mb-4 col-sm-4  ">

								<div style="  height: 170px;    border-radius: 10px;border-style: dotted; border-color: blue;">
									<span>
										<img id="show_data_way1" onclick="$('#upload_img_way1').click()" class=" setting_img_request columnxx" src="<?php echo base_url(); ?>./themes/softmat/img/upload_file.png" alt="user">
										<img id="show_data_way2" onclick="$('#upload_img_way2').click()" class=" setting_img_request columnxx" src="<?php echo base_url(); ?>./themes/softmat/img/upload_file.png" alt="user" style="display: none;">
										<img id="show_data_way3" onclick="$('#upload_img_way3').click()" class=" setting_img_request columnxx" src="<?php echo base_url(); ?>./themes/softmat/img/upload_file.png" alt="user" style="display: none;">
									</span>
									<input id="upload_img_way1" onchange="show_img_way1(this)" name="file_way1" type="file" accept="image/png, image/gif, image/jpeg, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,application/pdf" hidden readonly>
									<input id="upload_img_way2" onchange="show_img_way2(this)" name="file_way2" type="file" accept="image/png, image/gif, image/jpeg, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,application/pdf" hidden readonly>
									<input id="upload_img_way3" onchange="show_img_way3(this)" name="file_way3" type="file" accept="image/png, image/gif, image/jpeg, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,application/pdf" hidden readonly>
								</div>
								<div class="" style="  display: flex; justify-content: center; align-items: center;">
									<button type="button" onclick="remove_img_way()" class=" btn  btn-sm  btn-warning my-2">
										<i class='bx bx-refresh  d-block d-sm-none'></i>
										<span class="d-none d-sm-block">Remove</span>
									</button>
								</div>
								<div class="" style="  display: flex; justify-content: center; align-items: center;">
									<button onclick="op_img_way(1)" type="button" class=" btn  btn-sm  btn-warning my-2" style="margin-right: 5px;">Image 1</button>
									<button onclick="op_img_way(2)" type="button" class=" btn  btn-sm  btn-warning my-2" style="margin-right: 5px;">Image 2</button>
									<button onclick="op_img_way(3)" type="button" class=" btn  btn-sm  btn-warning my-2">Image 3</button>
								</div>
							</div>

						</div>
						<input type="hidden" name="action" value="<?php echo base64_encode('request_way'); ?>">

						<div style="float: right;" class="my-1">
							<button onclick="clear_data_re()" type="reset" class="btn  btn-sm btn-primary ">
								<span class="d-none d-sm-block">Clear</span>
								<i class="bx  bx-reset  d-block d-sm-none"></i>
							</button>
							<button onclick="send_data_quest_way()" type="button" onclick="" class="btn btn-sm btn-primary ">
								<i class="bx  bx-send d-block d-sm-none"></i>
								<span class="d-none d-sm-block">Sending</span>
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="col-lg-12 col-mb-12 col-sm-12 order-0 my-1">
			<div class="card mb-4">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-3 col-sm-3">
							<div class=" input-group-outline  input-group-sm my-3">
								<label>Start Date:</label>
								<input type="date" name="start_date_u" id="start_date_u" class="form-control" value="<?php echo date('Y-m-01') ?>">
							</div>
						</div>
						<div class="col-lg-3 col-sm-3">
							<div class=" input-group-outline  input-group-sm my-3">
								<label>End Date:</label>
								<input type="date" name="end_date_u" id="end_date_u" class="form-control" value="<?php echo date('Y-m-t') ?>">
							</div>
						</div>
						<div class="col-lg-6 col-sm-6">
							<div style=" float: right;  text-align: center;">
								<div class="colstra"> <span class="spinner-grow text-success" style="height:13px; width:13px;     animation: 1.45s linear infinite spinner-grow;" role="status"><span class="visually-hidden">Loading...</span></span>
									<div>Normal</div>
								</div>
								<div class="colstra"> <span class="spinner-grow text-warning" style="height:13px; width:13px;     animation: 1.45s linear infinite spinner-grow;" role="status"><span class="visually-hidden">Loading...</span></span>
									<div>Over A</div>
								</div>
								<div class="colstra"> <span class="spinner-grow text-danger" style="height:13px; width:13px;     animation: 1.45s linear infinite spinner-grow;" role="status"><span class="visually-hidden">Loading...</span></span>
									<div>Over S</div>
								</div>
								<div class="colstra"> <span class="spinner-grow text-dark" style="height:13px; width:13px;     animation: 1.45s linear infinite spinner-grow;" role="status"><span class="visually-hidden">Loading...</span></span>
									<div>discount</div>
								</div>
							</div>

						</div>
					</div>
					<table id="datatable_request_user" class="table table-striped display nowrap" style="width:100%; text-align:center; font-size:12px;">
						<thead>
							<tr>
								<th style="text-align:center;">No</th>
								<th style="text-align:center;">Dep Issue</th>
								<th style="text-align:center;">System</th>
								<th style="text-align:center;">Type</th>
								<th style="text-align:center;">Priority</th>
								<th style="text-align:center;">Sup By</th>
								<th style="text-align:center;">Time Receive</th>
								<th style="text-align:center;">s</th>
								<th style="text-align:center;">Status</th>
								<th style="text-align:center;">Action</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>

				</div>
			</div>
		</div>

	</div>
</div>

<!-- -------------------------------------------------------------------------------------------------------------------------------------- -->

<div class="modal fade" id="modal_edit_request" aria-hidden="true" data-bs-backdrop="static" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title" id="modalCenterTitle">UPDATE QUEST</h6>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="" id="" class="was-validated">
					<div class="row">
						<div class="nav-align-top mb-4">
							<ul class="nav nav-pills mb-3" role="tablist">
								<li class="nav-item">
									<button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-data" aria-controls="navs-pills-justified-data" aria-selected="true">
										Data
									</button>
								</li>
								<li class="nav-item">
									<button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-file" aria-controls="navs-pills-justified-file" aria-selected="false">
										File
									</button>
								</li>


							</ul>

							<div class="tab-content">
								<div class="tab-pane fade show active" id="navs-pills-justified-data" role="tabpanel">
									<div class="row">

										<div class="col-lg-12 col-sm-12">
											<div class="column">
												<img id="img_sender_name" class="setting_img" src="<?php echo base_url(); ?>./themes/softmat/img/user.png" alt="user">
												<div style="text-align: center;margin-top:5px">
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
											<i class='bx bx-right-arrow bx-fade-right'></i>
											<i class='bx bx-right-arrow bx-fade-right'></i><br>
											<i class='bx bx-right-arrow bx-fade-right'></i>
											<i class='bx bx-right-arrow bx-fade-right'></i>

										</div> -->
											<div class="column">
												<img id="img_recipient_name" class="setting_img" src="<?php echo base_url(); ?>./themes/softmat/img/user.png" alt="user">
												<div style="text-align: center; margin-top:5px">
													<h6>
														<span id="support_name">
															xxxxx
														</span>
													</h6>
												</div>
											</div>
										</div>

										<div class="col-lg-12 col-sm-12">
											<div class="row">

												<div class="col-lg-6 col-sm-6">
													<div class=" input-group-sm">
														<label>Department Issue:</label>
														<select disabled id="edit_dep_issue_way" name="" class="form-control" required>
															<option selected value="">--- Department ---</option>
														</select>
													</div>

													<div class=" input-group-sm">
														<label>Issue By:</label>
														<select disabled id="edit_issue_by_way" name="" class="form-control" required>
															<option selected value="">--- Issue ---</option>
														</select>
													</div>
												</div>

												<div class="col-lg-6 col-sm-6">
													<div class=" input-group-sm">
														<label>Department Support:</label>
														<select onchange="data_support_way(value),data_type_way(value)" id="html_support_dep_way" name="html_support_dep_way" class="form-control" required>
															<option selected value="">--- Department ---</option>
														</select>

														<div class=" input-group-sm">
															<label>Support By:</label>
															<select id="edit_html_support_by_way" name="edit_html_support_by_way" class="form-control" required>
																<option selected value="">--- Support ---</option>
															</select>
														</div>
													</div>

												</div>

											</div>


											<div class="col-lg-12 col-sm-12">
												<div class="row">

													<div class="col-lg-4 col-sm-6">
														<div class="input-group-sm">
															<label>Type:</label>
															<select id="data_html_type_way" name="data_html_type_way" class="form-control" required>
																<option selected value="">--- Type ---</option>
															</select>
														</div>
													</div>

													<div class="col-lg-4 col-sm-6">
														<div class=" input-group-sm">
															<label>System:</label>
															<select id="data_html_system_way" name="data_html_system_way" class="form-control" required>
																<option selected value="">--- System ---</option>
															</select>
														</div>
													</div>

													<!-- <div class="col-lg-6 col-sm-6">
												<div class=" input-group-sm">
												<label>Priority:</label>
												<select id="" name="" class="form-control" required>
													<option selected value="">--- Priority ---</option>
												</select>
												</div>
											</div> -->

													<div class="col-lg-4 col-sm-6">
														<div class=" input-group-sm">
															<label>Subject:</label>
															<input type="text" class="form-control" id="edit_subject_way" name="edit_subject_way" placeholder="Subject....." required>
														</div>
													</div>

													<div class="col-lg-12 col-sm-6">
														<div class="  input-group-sm ">
															<div class=" input-group-outline input-group-sm">
																<label>Detail:</label>
																<textarea name="edit_detail_way" id="edit_detail_way" cols="30" rows="3" class="form-control" placeholder="Detail........" required></textarea>
															</div>
														</div>
													</div>

												</div>

											</div>

										</div>

										<input type="hidden" name="action" value="<?php echo base64_encode('request'); ?>">
									</div>

								</div>
								<div class="tab-pane fade" id="navs-pills-justified-file" role="tabpanel">
									<div class="col-lg-12 col-sm-12 my-2">
										<div style="  height: 350px;    border-radius: 10px;border-style: dotted; border-color: blue;">
											<span>
												<img id="modal_img_way1" onclick="$('#modal_upload_img_way1').click()" class=" setting_img_request " src="<?php echo base_url(); ?>./themes/softmat/img/upload_file.png" alt="user">
												<img id="modal_img_way2" onclick="$('#modal_upload_img_way2').click()" class=" setting_img_request " src="<?php echo base_url(); ?>./themes/softmat/img/upload_file.png" alt="user" style="display: none;">
												<img id="modal_img_way3" onclick="$('#modal_upload_img_way3').click()" class=" setting_img_request " src="<?php echo base_url(); ?>./themes/softmat/img/upload_file.png" alt="user" style="display: none;">
											</span>

											<input id="modal_upload_img_way1" onchange="modal_show_img_way1(this)" name="modal_img_way1" type="file" accept="image/png, image/gif, image/jpeg, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,application/pdf" hidden readonly>
											<input id="modal_upload_img_way2" onchange="modal_show_img_way2(this)" name="modal_img_way2" type="file" accept="image/png, image/gif, image/jpeg, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,application/pdf" hidden readonly>
											<input id="modal_upload_img_way3" onchange="modal_show_img_way3(this)" name="modal_img_way3" type="file" accept="image/png, image/gif, image/jpeg, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,application/pdf" hidden readonly>
										</div>
										<div class="" style="  display: flex; justify-content: center; align-items: center;">
											<button onclick="remove_modal_img_way()" class=" btn  btn-sm  btn-warning my-2">Remove</button>
										</div>
										<div class="" style="  display: flex; justify-content: center; align-items: center;">
											<button onclick="modal_op_img(1)" type="button" class=" btn  btn-sm  btn-warning my-2" style="margin-right: 5px;">Image 1</button>
											<button onclick="modal_op_img(2)" type="button" class=" btn  btn-sm  btn-warning my-2" style="margin-right: 5px;">Image 2</button>
											<button onclick="modal_op_img(3)" type="button" class=" btn  btn-sm  btn-warning my-2">Image 3</button>
										</div>
									</div>
								</div>
							</div>
						</div>



					</div>
					<div style="float: right;    margin-top: 1rem ;">
						<button type="reset" class="btn  btn-sm  btn-primary">Clear</button>
						<button type="button" onclick="" class="btn  btn-sm  btn-primary">Update</button>
					</div>
					<input type="hidden" name="action" value="<?php echo base64_encode('edit_permission'); ?>">
				</form>
			</div>
		</div>
	</div>
</div>
<!-- -------------------------------------------------------------------------------------------------------------------------------------- -->
<script>
	function op_img_way(num) {
		if (num == 1) {
			$('#show_data_way1').css('display', 'block');
			$('#show_data_way2').css('display', 'none');
			$('#show_data_way3').css('display', 'none');
		} else if (num == 2) {
			$('#show_data_way1').css('display', 'none');
			$('#show_data_way2').css('display', 'block');
			$('#show_data_way3').css('display', 'none');
		} else if (num == 3) {
			$('#show_data_way1').css('display', 'none');
			$('#show_data_way2').css('display', 'none');
			$('#show_data_way3').css('display', 'block');
		}
	}
	function modal_op_img(num) {
		if (num == 1) {
			$('#modal_img_way1').css('display', 'block');
			$('#modal_img_way2').css('display', 'none');
			$('#modal_img_way3').css('display', 'none');
		} else if (num == 2) {
			$('#modal_img_way1').css('display', 'none');
			$('#modal_img_way2').css('display', 'block');
			$('#modal_img_way3').css('display', 'none');
		} else if (num == 3) {
			$('#modal_img_way1').css('display', 'none');
			$('#modal_img_way2').css('display', 'none');
			$('#modal_img_way3').css('display', 'block');
		}
	}

	function edit_data_request(qu_id) {
		event.preventDefault()
		var edit_dep_issue_way = '';
		var edit_issue_by_way = '';
		var html_support_dep_way = '';
		var html_support_dep_way_check = '';
		// --------------------------------------------------------------------------------------------------------------------------
		$.ajax({
			url: '<?php echo base_url(); ?>Request/data_quest_user',
			type: "POST",
			dataType: 'json',
			data: {
				qu_id: qu_id,
			},
			success: function(data) {
				// console.log(data)
				$.each(data, function(key, val) {
					edit_dep_issue_way = ''
					edit_dep_issue_way = '<option selected value="' + val.dep_issue_id + '">' + val.dep_issue +
						'</option>'
					$('#edit_dep_issue_way').html(edit_dep_issue_way)
					edit_issue_by_way = ''
					edit_issue_by_way = '<option selected value="' + val.issue_by_id + '">' + val.issue_by + '</option>'
					$('#edit_issue_by_way').html(edit_issue_by_way)
					$('#issue_name').html('<span>' + val.issue_by + '</span>')
					$('#edit_subject_way').val(val.subject)
					$('#edit_detail_way').val(val.detail)
					$('#support_name').html('<span>' + val.support_by + '</span>')
					$.ajax({
						type: 'POST',
						dataType: 'json',
						url: '<?php echo base_url(); ?>GET_API/department_data',
						success: function(department_data) {
							html_support_dep_way = '';
							html_support_dep_way += '<option selected value="">--- Department ---</option>';
							$.each(department_data, function(key_dep, val_dep) {
								if (val_dep.dep_id === val.dep_support_id) {
									html_support_dep_way_check = 'selected'
								}
								html_support_dep_way += '<option  ' + html_support_dep_way_check + '  value="' +
									val_dep.dep_id + '">' + val_dep.dep_name + '</option>'
								html_support_dep_way_check = ''
							})
							$("#html_support_dep_way").html(html_support_dep_way)


						}
					})
					// --------------------------------------------------------------------------------------------------------------------------
					$.ajax({
						type: 'POST',
						dataType: 'json',
						url: '<?php echo base_url(); ?>GET_API/get_support_by',
						data: {
							dep_id: val.dep_support_id,
						},
						success: function(reply_support) {
							// console.log(reply_support)
							if (reply_support !== null && reply_support !== '') {
								$("#edit_html_support_by_way").removeAttr("disabled")

								var html_support_by_way = '';
								var html_check_way = '';
								html_support_by_way += '<option selected value="">--- Support ---</option>';
								$.each(reply_support, function(key_support, val_support) {

									if (val_support.user_id === val.support_by_id) {
										html_check_way = 'selected';
									}
									html_support_by_way += '<option ' + html_check_way + '  value="' + val_support
										.user_id + '">' + val_support.f_name + ' ' + val_support.l_name + ' (' +
										val_support.employee + ')</option>'
									html_check_way = '';
								})
							} else {
								$("#edit_html_support_by_way").attr("disabled", true)
								html_support_by_way = '';
								html_support_by_way += '<option selected value="">--- (No Employee) ---</option>';
							}
							// console.log(html_support_by_way)
							$("#edit_html_support_by_way").html(html_support_by_way)

						}
					})
					// --------------------------------------------------------------------------------------------------------------------------

					var html_type_way = '';
					var html_type_way_check = '';

					$.ajax({
						type: 'POST',
						dataType: 'json',
						url: '<?php echo base_url(); ?>GET_API/get_data_type',
						data: {
							dep_id: val.dep_support_id,
						},
						success: function(reply_type) {
							// console.log(reply_type)
							if (reply_type !== null && reply_type !== '') {
								$("#data_html_type_way").removeAttr("disabled")
								html_type_way = '';
								html_type_way += '<option selected value="">--- Type ---</option>';
								$.each(reply_type, function(key_type, val_type) {
									if (val_type.type_id === val.type_id) {
										html_type_way_check = 'selected'
									}
									html_type_way += '<option  ' + html_type_way_check + '  value="' + val_type
										.type_id + '">' + val_type.type_name + '</option>'
									html_type_way_check = ''
								})
							} else {
								$("#data_html_type_way").attr("disabled", true)
								html_type_way = '';
								html_type_way += '<option selected value="">--- (No Type) ---</option>';
							}
							$("#data_html_type_way").html(html_type_way)
						}
					})
					// ----------------------------------------------------------------------------------------------------------------------------------

					$.ajax({
						type: 'POST',
						dataType: 'json',
						url: '<?php echo base_url(); ?>GET_API/get_data_system',
						data: {
							dep_id: val.dep_issue_id,
						},
						success: function(reply_sys) {
							// console.log(reply_sys)
							if (reply_sys !== null && reply_sys !== '') {
								$("#html_system_way").removeAttr("disabled")
								html_system_way = '';
								html_system_way += '<option selected value="">--- System ---</option>';
								$.each(reply_sys, function(key_sys, val_sys) {
									// alert(val_sys.system_id)
									if (val_sys.system_id === val.system_id) {
										html_type_way_check = 'selected'
									}
									html_system_way += '<option  ' + html_type_way_check + '  value="' + val_sys
										.system_id + '">' + val_sys.system_name + '</option>'
								})
							} else {
								$("#html_system_way").attr("disabled", true)
								html_system_way = '';
								html_system_way += '<option selected value="">--- (No System) ---</option>';
							}
							$("#data_html_system_way").html(html_system_way)
						}
					})

				})
			}
		})
		// alert(qu_id)
		$('#modal_edit_request').modal('show')
	}

	function data_type_way(dep_id) {
		var html_type_way = '';
		if (dep_id !== '') {
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: '<?php echo base_url(); ?>GET_API/get_data_type',
				data: {
					dep_id: dep_id,
				},
				success: function(reply_type) {
					console.log(reply_type)
					if (reply_type !== null && reply_type !== '') {
						$("#data_html_type_way").removeAttr("disabled")
						html_type_way = '';
						html_type_way += '<option selected value="">--- Type ---</option>';
						$.each(reply_type, function(key_type, val_type) {
							html_type_way += '<option  value="' + val_type.type_id + '">' + val_type.type_name + '</option>'
						})
					} else {
						$("#data_html_type_way").attr("disabled", true)
						html_type_way = '';
						html_type_way += '<option selected value="">--- (No Type) ---</option>';
					}
					$("#data_html_type_way").html(html_type_way)
				}
			})
		} else {
			$("#data_html_type_way").attr("disabled", true)
			$('#data_html_type_way').val('')
		}
	}

	function data_support_way(dep_support_id) {
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: '<?php echo base_url(); ?>GET_API/get_support_by',
			data: {
				dep_id: dep_support_id,
			},
			success: function(reply_support) {
				// console.log(reply_support)
				if (reply_support !== null && reply_support !== '') {
					$("#edit_html_support_by_way").removeAttr("disabled")
					var html_support_by_way = '';
					html_support_by_way += '<option selected value="">--- Support ---</option>';
					$.each(reply_support, function(key_support, val_support) {
						html_support_by_way += '<option   value="' + val_support.user_id + '">' + val_support.f_name +
							' ' + val_support.l_name + ' (' + val_support.employee + ')</option>'
					})
				} else {
					$("#edit_html_support_by_way").attr("disabled", true)
					html_support_by_way = '';
					html_support_by_way += '<option selected value="">--- (No Employee) ---</option>';
				}
				$("#edit_html_support_by_way").html(html_support_by_way)
			}
		})
	}

	function text_box_detail_reply(qu_id) {
		// alert(qu_id)
		event.preventDefault();
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: '<?php echo base_url(); ?>request/get_data_quest',
			data: {
				qu_id: qu_id
			},
			success: function(data_quest) {
				$.each(data_quest, function(key_q, val_q) {
					// alert(val_q.support_by_id )
					if (val_q.support_by_id !== '' || val_q.support_by_id !== null) {
						$.ajax({
							type: 'POST',
							dataType: 'json',
							url: '<?php echo base_url(); ?>Manage_user/get_data_edit_user',
							data: {
								user_id: val_q.support_by_id
							},
							beforeSend: function() {
								$("#img_name_u_alert").attr("src",
									"<?php echo base_url(); ?>./themes/softmat/img/loading3.gif")
							},
							complete: function() {
								$("#img_name_u_alert").attr('style', 'display');
							},
							success: function(data_user) {
								$.each(data_user, function(key_user, val_user) {
									if (val_user.path_img_user !== null && val_user.path_img_user !== '') {
										Swal.fire({
											html: '<p><div><img id="img_name_u_alert" class="setting_img_u_alert" src="<?php echo base_url(); ?>' +
												val_user.path_img_user + '" alt="user"></div></p><p>' + val_q
												.support_by +
												'</p><p  style="border-bottom: 1px solid;">เหตุผลที่ Reply</p><p>' +
												val_q.detail_deny + '</p>',
										})
									} else {
										Swal.fire({
											html: '<p><div><img id="img_name_u_alert" class="setting_img_u_alert" src="<?php echo base_url(); ?>./themes/softmat/img/user.png" alt="user"></div><p>' +
												val_q.support_by +
												'</p><p  style="border-bottom: 1px solid;">เหตุผลที่ Reply</p><p>' +
												val_q.detail_deny + '</p>',
										})
									}
								})
							}
						})
					} else {
						Swal.fire({
							html: '<p><div><img id="img_name_u_alert" class="setting_img_u_alert" src="<?php echo base_url(); ?>./themes/softmat/img/user.png" alt="user"></div></p><p>?????</p><p  style="border-bottom: 1px solid;">เหตุผลที่ Reply</p><p>' +
								val_q.detail_deny + '</p>',
						})
					}
				})
			}
		})
	}

	function text_box_detail_cancel(qu_id) {
		// alert(qu_id)
		event.preventDefault();
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: '<?php echo base_url(); ?>request/get_data_quest',
			data: {
				qu_id: qu_id
			},
			success: function(data_quest) {
				$.each(data_quest, function(key_q, val_q) {
					if (val_q.issue_text === '' || val_q.issue_text === null) {
						$.ajax({
							type: 'POST',
							dataType: 'json',
							url: '<?php echo base_url(); ?>Manage_user/get_data_edit_user',
							data: {
								user_id: val_q.issue_by_id
							},
							beforeSend: function() {
								$("#img_name_u_alert").attr("src",
									"<?php echo base_url(); ?>./themes/softmat/img/loading3.gif")
							},
							complete: function() {
								$("#img_name_u_alert").attr('style', 'display');
							},
							success: function(data_user) {
								$.each(data_user, function(key_user, val_user) {
									if (val_user.path_img_user !== null && val_user.path_img_user !== '') {
										Swal.fire({
											html: '<p><div><img id="img_name_u_alert" class="setting_img_u_alert" src="<?php echo base_url(); ?>' +
												val_user.path_img_user + '" alt="user"></div></p><p>' + val_q.issue_by +
												'</p><p  style="border-bottom: 1px solid;">เหตุผลที่ Cancel</p><p>' +
												val_q.detail_cancel + '</p>',
										})
									} else {
										Swal.fire({
											html: '<p><div><img id="img_name_u_alert" class="setting_img_u_alert" src="<?php echo base_url(); ?>./themes/softmat/img/user.png" alt="user"></div><p>' +
												val_q.issue_by +
												'</p><p  style="border-bottom: 1px solid;">เหตุผลที่ Cancel</p><p>' +
												val_q.detail_cancel + '</p>',
										})
									}
								})
							}
						})
					} else {
						Swal.fire({
							html: '<p><div><img id="img_name_u_alert" class="setting_img_u_alert" src="<?php echo base_url(); ?>./themes/softmat/img/user.png" alt="user"></div></p><p>' +
								val_q.issue_text + '</p><p  style="border-bottom: 1px solid;">เหตุผลที่ Cancel</p><p>' +
								val_q.detail_cancel + '</p>',
						})
					}
				})
			}
		})
	}

	function send_data_quest_way() {
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
				const form = document.getElementById('form_quest_way');
				var form_data = new FormData(form);
				$.ajax({
					type: 'POST',
					dataType: 'json',
					url: '<?php echo base_url(); ?>request/send_data_quest_way',
					data: form_data,
					cache: false,
					processData: false,
					contentType: false,
					success: function(reply_request) {
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
								icon: 'Error',
							})
						}
					}
				})
			}
		})

		// alert(form_data)

	}

	function clear_data_re() {
		event.preventDefault()
		// $('#support_name').html('<span>xxxxx</span>')
		// $('#img_support_name').attr('src', '<?php echo base_url(); ?>./themes/softmat/img/user.png')
		// $('#issue_name').html('<span>xxxxx</span>')
		// $('#img_issue_name').attr('src', '<?php echo base_url(); ?>./themes/softmat/img/user.png')

		// $("#show_data_img_request1").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_file.png")
		// $('#upload_img_way1').val('')
		$('select[name=system_way]').val('')
		$('select[name=way_department]').val('')
		$('input[name=subject_way]').val('')
		$('textarea[name=detail_way]').val('')



		remove_img_way()
		open_support('')
	}

	function remove_img_way() {
		event.preventDefault()
		$("#show_data_way1").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_file.png")
		$("#show_data_way2").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_file.png")
		$("#show_data_way3").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_file.png")
		$('#upload_img_way1').val('')
		$('#upload_img_way2').val('')
		$('#upload_img_way3').val('')
	}
	function remove_modal_img_way() {
		event.preventDefault()
		$("#modal_img_way1").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_file.png")
		$("#modal_img_way2").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_file.png")
		$("#modal_img_way3").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_file.png")
		$('#modal_upload_img_way1').val('')
		$('#modal_upload_img_way2').val('')
		$('#modal_upload_img_way3').val('')
	}

	async function cancel_quest(qu_id) {
		event.preventDefault();
		const {
			value: text
		} = await Swal.fire({
			input: 'textarea',
			inputLabel: 'เหตุผลที่ Cancel',
			inputPlaceholder: 'Detail.......',
			inputAttributes: {
				'aria-label': 'Detail'
			},
			showCancelButton: true
		})

		if (text) {
			Swal.fire({
				title: "ต้องการ Cancel หรือไม่ ?",
				text: "ยืนยัน",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#35D735',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes!'
			}).then((result) => {
				// Swal.fire(text)
				$.ajax({
					url: '<?php echo base_url(); ?>Request/cancel_request',
					type: "POST",
					dataType: 'json',
					data: {
						qu_id: qu_id,
						detail_c: text
					},
					success: function(reply_cancel) {
						// console.log(reply_cancel)
						if (reply_cancel['reply'] !== true && reply_cancel['reply'] !== false) {
							Swal.fire({
								html: "<p>" + reply_cancel + "</p>",
								icon: 'warning',
							})
						} else if (reply_cancel['reply'] === true) {
							Swal.fire({
								html: "<p>" + reply_cancel['html'] + "</p><p>" + reply_cancel['html_eng'] + "</p>",
								icon: 'success',

							})
						} else if (reply_cancel['reply'] === false) {
							Swal.fire({
								html: "<p>" + reply_cancel['html'] + "</p><p>" + reply_cancel['html_eng'] + "</p>",
								icon: 'warning',

							})
						}
					}
				})
			})
		}


	}

	function show_img_way1(input_img) {
		if (input_img.files && input_img.files[0]) {
			var imgType = input_img.files[0]['type'];
			var chk = imgType.split("/");
			var reader = new FileReader();
			reader.onload = function(e) {
				// console.log(e)
				if (chk[0] != "application") {
					$("#show_data_way1").attr("src", e.target.result)
				} else {
					$("#show_data_way1").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_file_icon.png")
				}
			}
			reader.readAsDataURL(input_img.files[0]);
		} else {
			$("#show_data_way1").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_img.png")
		}
	}
	function show_img_way2(input_img) {
		if (input_img.files && input_img.files[0]) {
			// console.log(input_img.files[0]['type']);
			var imgType = input_img.files[0]['type'];
			var chk = imgType.split("/");
			// if(input_img.files[0]){}
			var reader = new FileReader();
			reader.onload = function(e) {
				// console.log(e)
				if (chk[0] != "application") {
					$("#show_data_way2").attr("src", e.target.result)
				} else {
					$("#show_data_way2").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_file_icon.png")
				}
			}
			reader.readAsDataURL(input_img.files[0]);
		} else {
			$("#show_data_way2").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_img.png")
		}
	}
	function show_img_way3(input_img) {
		if (input_img.files && input_img.files[0]) {
			var imgType = input_img.files[0]['type'];
			var chk = imgType.split("/");
			var reader = new FileReader();
			reader.onload = function(e) {
				// console.log(e)
				if (chk[0] != "application") {
					$("#show_data_way3").attr("src", e.target.result)
				} else {
					$("#show_data_way3").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_file_icon.png")
				}
			}
			reader.readAsDataURL(input_img.files[0]);
		} else {
			$("#show_data_way3").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_img.png")
		}
	}
	function modal_show_img_way1(input_img) {
		if (input_img.files && input_img.files[0]) {
			var imgType = input_img.files[0]['type'];
			var chk = imgType.split("/");
			var reader = new FileReader();
			reader.onload = function(e) {
				// console.log(e)
				if (chk[0] != "application") {
					$("#modal_img_way1").attr("src", e.target.result)
				} else {
					$("#modal_img_way1").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_file_icon.png")
				}
			}
			reader.readAsDataURL(input_img.files[0]);
		} else {
			$("#modal_img_way1").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_img.png")
		}
	}
	function modal_show_img_way2(input_img) {
		if (input_img.files && input_img.files[0]) {
			// console.log(input_img.files[0]['type']);
			var imgType = input_img.files[0]['type'];
			var chk = imgType.split("/");
			// if(input_img.files[0]){}
			var reader = new FileReader();
			reader.onload = function(e) {
				// console.log(e)
				if (chk[0] != "application") {
					$("#modal_img_way2").attr("src", e.target.result)
				} else {
					$("#modal_img_way2").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_file_icon.png")
				}
			}
			reader.readAsDataURL(input_img.files[0]);
		} else {
			$("#modal_img_way2").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_img.png")
		}
	}
	function modal_show_img_way3(input_img) {
		if (input_img.files && input_img.files[0]) {
			var imgType = input_img.files[0]['type'];
			var chk = imgType.split("/");
			var reader = new FileReader();
			reader.onload = function(e) {
				// console.log(e)
				if (chk[0] != "application") {
					$("#modal_img_way3").attr("src", e.target.result)
				} else {
					$("#modal_img_way3").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_file_icon.png")
				}
			}
			reader.readAsDataURL(input_img.files[0]);
		} else {
			$("#modal_img_way3").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_img.png")
		}
	}

	function check_data_system(system_id) {
		var html_line = '';
		var dep_issue_id = <?php echo $this->session->userdata('sessDep') ?>;
		if (dep_issue_id !== '') {
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: '<?php echo base_url(); ?>GET_API/check_data_system',
				data: {
					dep_issue_id: dep_issue_id,
					system_id: system_id
				},
				success: function(reply_check) {
					// console.log(reply_check)
					if (reply_check !== null && reply_check !== '') {
						html_line = '';
						html_line += '<div class=" input-group-outline input-group-sm">';
						html_line += '<label>Line:</label>';
						html_line += '<select name="line_way" class="form-control" required>';
						html_line += '<option selected value="">--- line ---</option>';
						$.each(reply_check, function(key_lp, val_lp) {
							html_line += '<option  value="' + val_lp.lp_id + '">' + val_lp.lp_name + '</option>'
						})
						html_line += '</select>';
						html_line += '</div>';
					} else {
						html_line = '';
					}
					$("#show_line_way").html(html_line)
				}
			})
		}


	}

	function check_data_type(type_id) {
		var html_priority_way = '';
		var dep_sup_id = $('select[name=way_department]').val()
		if (dep_sup_id !== '') {
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: '<?php echo base_url(); ?>GET_API/check_data_type',
				data: {
					dep_sup_id: dep_sup_id,
					type_id: type_id
				},
				success: function(reply_check) {
					if (reply_check !== null && reply_check !== '') {
						html_priority_way = '';
						html_priority_way += '<div class=" input-group-outline input-group-sm">';
						html_priority_way += '<label>Priority:</label>';
						html_priority_way += '<select name="priority_way" class="form-control" required>';
						html_priority_way += '<option selected value="">--- Priority ---</option>';
						$.each(reply_check, function(key_pri, val_pri) {
							html_priority_way += '<option  value="' + val_pri.pri_id + ' ' + val_pri.time_priority + '">' +
								val_pri.pri_name + '</option>'
						})
						html_priority_way += '</select>';
						html_priority_way += '</div>';
					} else {
						html_priority_way = '';
					}
					$("#show_priority_way").html(html_priority_way)
				}
			})
		}
	}

	function open_system() {
		var html_system_way = '';
		var dep_id = <?php echo $this->session->userdata('sessDep') ?>;
		if (dep_id !== '') {
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: '<?php echo base_url(); ?>GET_API/get_data_system',
				data: {
					dep_id: dep_id,
				},
				success: function(reply_sys) {
					// console.log(reply_sys)
					if (reply_sys !== null && reply_sys !== '') {
						$("#html_system_way").removeAttr("disabled")
						html_system_way = '';
						html_system_way += '<option selected value="">--- System ---</option>';
						$.each(reply_sys, function(key_sys, val_sys) {
							// alert(val_sys.system_id)
							html_system_way += '<option  value="' + val_sys.system_id + '">' + val_sys.system_name +
								'</option>'
						})
					} else {
						$("#html_system_way").attr("disabled", true)
						html_system_way = '';
						html_system_way += '<option selected value="">--- (No System) ---</option>';
					}
					$("#html_system_way").html(html_system_way)
				}
			})
		} else {
			$("#html_system_way").attr("disabled", true)
			$('select[name=system_way]').val('')
		}


	}

	function open_type(dep_id) {
		var html_type_way = '';
		if (dep_id !== '') {
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: '<?php echo base_url(); ?>GET_API/get_data_type',
				data: {
					dep_id: dep_id,
				},
				success: function(reply_type) {
					// console.log(reply_type)
					if (reply_type !== null && reply_type !== '') {
						$("#html_type_way").removeAttr("disabled")
						html_type_way = '';
						html_type_way += '<option selected value="">--- Type ---</option>';
						$.each(reply_type, function(key_type, val_type) {
							html_type_way += '<option  value="' + val_type.type_id + '">' + val_type.type_name + '</option>'
						})
					} else {
						$("#html_type_way").attr("disabled", true)
						html_type_way = '';
						html_type_way += '<option selected value="">--- (No Type) ---</option>';
					}
					$("#html_type_way").html(html_type_way)
				}
			})
		} else {
			$("#html_type_way").attr("disabled", true)
			$('select[name=type_way]').val('')
		}
	}

	function open_support(dep_id) {
		open_type(dep_id)

		// var html_priority = ''
		// $("#show_priority").html(html_priority)
		var html_support_by_way = '';
		// alert(support_by)
		// $('#support_name').html('<span>xxxxx</span>')
		// $('#img_support_name').attr('src', '<?php echo base_url(); ?>./themes/softmat/img/user.png')
		// alert(dep_id)
		if (dep_id !== '') {
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: '<?php echo base_url(); ?>GET_API/get_support_by',
				data: {
					dep_id: dep_id,
				},
				success: function(reply_support) {
					// console.log(reply_support)
					if (reply_support !== null && reply_support !== '') {
						$("#html_support_by_way").removeAttr("disabled")
						html_support_by_way = '';
						html_support_by_way += '<option selected value="">--- Support ---</option>';
						$.each(reply_support, function(key_support, val_support) {
							html_support_by_way += '<option  value="' + val_support.user_id + '">' + val_support.f_name +
								' ' + val_support.l_name + ' (' + val_support.employee + ')</option>'
						})
					} else {
						$("#html_support_by_way").attr("disabled", true)
						html_support_by_way = '';
						html_support_by_way += '<option selected value="">--- (No Employee) ---</option>';
						html_priority_way = '';
						$("#show_priority_way").html(html_priority_way)
					}
					$("#html_support_by_way").html(html_support_by_way)
				}
			})
		} else {
			html_priority_way = '';
			$("#html_support_by_way").attr("disabled", true)
			$('select[name=support_way]').val('')
			$("#show_priority_way").html(html_priority_way)

			// $('#support_name').html('<span>xxxxx</span>')
			// $('#img_support_name').attr('src', '<?php echo base_url(); ?>./themes/softmat/img/user.png')
		}
	}

	function department_support() {
		var html_support_dep = '';
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: '<?php echo base_url(); ?>GET_API/department_data',
			success: function(department_data) {
				html_support_dep = '';
				html_support_dep += '<option selected value="">--- Department ---</option>';
				$.each(department_data, function(key_dep, val_dep) {
					html_support_dep += '<option  value="' + val_dep.dep_id + '">' + val_dep.dep_name + '</option>'
				})
				$("#html_sup_dep_way").html(html_support_dep)

			}
		})
	}

	$(document).ready(function() {
		department_support()
		open_system()
		var cnt = 1;
		var table = $('#datatable_request_user').DataTable({
			// lengthChange: false,
			// buttons: ['copy', 'excel', 'pdf', 'colvis'],
			lengthMenu: [
				[5, 10, 25, 100],
				[5, 10, 25, 'All'],
			],
			scrollX: true,
			ajax: {
				url: '<?php echo base_url(); ?>Request/get_datatable_request_user',
				type: 'post',
				dataType: 'json',
				data: function(data) {
					data.start_date = $('#start_date_u').val();
					data.end_date = $('#end_date_u').val()
				}
			},
			columns: [{
					data: "qu_id",
					"render": function(data, type, row) {
						return cnt++;
					}
				},
				{
					data: "dep_issue"
				},
				{
					data: "system_name"
				},
				{
					data: "type_name"
				},
				{
					data: "qu_id",
					"render": function(data, type, row, meta) {
						if (type === 'display') {
							if (row.pri_name === null || row.pri_name === '') {
								html_cat = '-'
							} else {
								html_cat = '' + row.pri_name + ''
							}

						}
						return html_cat;
					}
				},
				{
					data: "support_by"
				},
				{
					data: "receive_time"
				},
				{
					data: "qu_id",
					"render": function(data, type, row, meta) {
						if (type === 'display') {
							if (row.status_qu !== '0') {
								if (row.status_qu !== '4') {
									// if (row.status_qu !== '3') {
									if (row.over_success_flag == '0') {
										if (row.over_accept_flag == '0') {
											html =
												' <span class="spinner-grow text-success" style="height:13px; width:13px;     animation: 1.45s linear infinite spinner-grow;" role="status"><span class="visually-hidden">Loading...</span></span>'
										} else if (row.over_accept_flag == '1') {
											html =
												' <span class="spinner-grow text-warning" style="height:13px; width:13px;     animation: 1.45s linear infinite spinner-grow;" role="status"><span class="visually-hidden">Loading...</span></span>'
										}
									} else if (row.over_success_flag == '1') {
										html =
											' <span class="spinner-grow text-danger" style="height:13px; width:13px;     animation: 1.45s linear infinite spinner-grow;" role="status"><span class="visually-hidden">Loading...</span></span>'
									}
									// } else {
									//     html = ' <span class="spinner-grow text-info" style="height:13px; width:13px;     animation: 1.45s linear infinite spinner-grow;" role="status"><span class="visually-hidden">Loading...</span></span>'
									// }

								} else {
									html =
										' <span class="spinner-grow text-dark" style="height:13px; width:13px;     animation: 1.45s linear infinite spinner-grow;" role="status"><span class="visually-hidden">Loading...</span></span>'
								}

							} else {
								html =
									' <span class="spinner-grow text-dark" style="height:13px; width:13px;     animation: 1.45s linear infinite spinner-grow;" role="status"><span class="visually-hidden">Loading...</span></span>'
							}

						}
						return html;
					}
				},
				{
					data: "qu_id",
					"render": function(data, type, row, meta) {
						if (type === 'display') {
							if (row.status_qu === '1') {
								data =
									'<div style="background-color:#ff6b6b;border-radius:10px; color:#ffffff;  ">Pending</div>'
							} else if (row.status_qu === '2') {
								data =
									'<div style="background-color:#ff8847;border-radius:10px; color:#ffffff;  ">Accepted</div>'
							} else if (row.status_qu === '3') {
								data =
									'<div style="background-color:#78ff73;border-radius:10px; color:#ffffff;  ">Success</div>'
							} else if (row.status_qu === '4') {
								data =
									'<div style="background-color:#7d7c7c;border-radius:10px; color:#ffffff;  ">Deny</div>'
							} else if (row.status_qu === '0') {
								data =
									'<div style="background-color:#6600bf;border-radius:10px; color:#ffffff;  ">Cancel</div>'
							} else {
								data =
									'<div style="color:#FF0000;"<i class="bx bx-error" ></i> Error chack in database table status <i class="bx bx-error" ></i></div>'
							}

						}
						return data;
					}
				},
				{
					data: 'button_show',
				}
			]
		});
		setInterval(function() {
			table.ajax.reload(null, false);
			cnt = 1;
			// table.clear().draw();
		}, 1000);
		// table.buttons().container()
		//     .appendTo('#example_wrapper .col-md-6:eq(0)');
	});
</script>
