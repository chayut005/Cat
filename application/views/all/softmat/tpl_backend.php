<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
	<title><?php echo $page_title; ?></title>
	<meta name="description" content="" />
	<!-- <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" /> -->
	<style>
		.setting_img_hearder {
			height: 158px;
			width: 161px;
			object-fit: cover;

			display: block;
			margin-left: auto;
			margin-right: auto;
		}

		.setting_img_u {
			height: 70px;
			width: 70px;
			object-fit: cover;
			display: block;
			border-radius: 100%;
			margin-left: auto;
			margin-right: auto;
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

		.btn {
			margin-top: 2px;
		}

		.setting_all_request {
			height: 100%;
			object-fit: cover;

			display: block;
			margin-left: auto;
			margin-right: auto;
		}

		/* .background {
      background-color: black;

      background-image: url('<?php echo base_url(); ?>./themes/softmat/img/test.png');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
    } */
	</style>

	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>vendor/fonts/boxicons.css" />
	<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>vendor/css/core.css" class="template-customizer-core-css" />
	<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>vendor/css/theme-default.css" class="template-customizer-theme-css" />
	<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>demo.css" />
	<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
	<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>vendor/libs/apex-charts/apex-charts.css" />
	<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>family=Prompt.css" />

	<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.css">

	<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>uikit.css">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.js"></script>

	<script src="https://getuikit.com/assets/uikit/dist/js/uikit.js?nc=4433"></script>

	<script src="https://getuikit.com/assets/uikit/dist/js/uikit-icons.js?nc=4433"></script>
	<script src="<?php echo base_url() . $js_url; ?>sweetalert.init.js"></script>
	<script src="<?php echo base_url() . $js_url; ?>vendor/js/helpers.js"></script>
	<script src="<?php echo base_url() . $js_url; ?>config.js"></script>
	<script src="<?php echo base_url() . $js_url; ?>jquery-3.6.0.min.js"></script>

</head>

<body class="background">
	<?php echo $page_menu; ?>
	<?php echo $page_header; ?>
	<?php echo $page_content; ?>
	<?php echo $page_footer; ?>
	<script src="<?php echo base_url() . $js_url; ?>vendor/libs/jquery/jquery.js"></script>
	<script src="<?php echo base_url() . $js_url; ?>vendor/libs/popper/popper.js"></script>
	<script src="<?php echo base_url() . $js_url; ?>vendor/js/bootstrap.js"></script>
	<script src="<?php echo base_url() . $js_url; ?>vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
	<script src="<?php echo base_url() . $js_url; ?>vendor/js/menu.js"></script>
	<script src="<?php echo base_url() . $js_url; ?>vendor/libs/apex-charts/apexcharts.js"></script>
	<script src="<?php echo base_url() . $js_url; ?>main.js"></script>
	<script src="<?php echo base_url() . $js_url; ?>dashboards-analytics.js"></script>
	<!-- <script async defer src="https://buttons.github.io/buttons.js"></script> -->



	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>


	<style>
		/* :root {
      font-size: calc(0vw + 2vh);
      scroll-behavior: smooth;
    } */
		.setting_img_request {
			/* max-height: 100px; */
			height: 100%;
			object-fit: cover;

			display: block;
			margin-left: auto;
			margin-right: auto;
		}
	</style>
	<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

	<input type="hidden" name="id_user_id" id="id_user_id" value="<?php echo $this->session->userdata('sessUsrId'); ?>">

	<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

	<div class="modal fade  bd-example-modal-xl" id="modal_data_quest_show" aria-hidden="true" data-bs-backdrop="static" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered  modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title" id="modalCenterTitle">DATA QUEST</h6>

					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">

					<form action="" id="form_quest_manage_quest" class="was-validated">


						<div class="row">

							<div style="text-align: center;" class="col-lg-12 col-sm-12">
								<div class="row">
									<div class="col-lg-6 col-sm-6">
										<span style="font-variant-caps: all-small-caps;"><span id="time_accept"></span></span>
									</div>
									<div class="col-lg-6 col-sm-6">
										<span style="font-variant-caps: all-small-caps;"><span id="time_success"></span></span>
									</div>
								</div>

							</div>


							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="nav-align-top mb-4">
									<ul class="nav nav-pills mb-3" role="tablist">
										<li class="nav-item">
											<button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-data2" aria-controls="navs-pills-justified-data2" aria-selected="true">
												Data
											</button>
										</li>
										<li class="nav-item">
											<button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-file2" aria-controls="navs-pills-justified-file2" aria-selected="false">
												File
											</button>
										</li>
										<li class="nav-item">
											<button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-other" aria-controls="navs-pills-justified-other" aria-selected="false">
												Other
											</button>
										</li>

									</ul>

									<div class="tab-content">
										<div class="tab-pane fade show active" id="navs-pills-justified-data2" role="tabpanel">
											<div class="row">
												<div class="col-lg-12 col-sm-12">
													<div class="column">
														<img id="img_sender_name_u" class="setting_img_u" src="<?php echo base_url(); ?>./themes/softmat/img/user.png" alt="user">
														<div style="text-align: center;margin-top:5px">
															<h6>
																<span id="sender_name_b">
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
														<img id="img_recipient_name_u" class="setting_img_u" src="<?php echo base_url(); ?>./themes/softmat/img/user.png" alt="user">
														<div style="text-align: center; margin-top:5px">
															<h6>
																<span id="recipient_name_b">
																	xxxxx
																</span>
															</h6>
														</div>
													</div>

													<div class="col-lg-12 col-sm-12">
														<div class="row">

															<div class="col-lg-6 col-sm-6">
																<div>
																	<label>Dep Issue:</label>
																	<div class="  input-group-sm ">
																		<input id="dep_issue" type="text" class="form-control" disabled required>
																	</div>
																</div>

																<div class=" input-group-sm">
																	<label>Issue By:</label>
																	<div class="  input-group-sm ">
																		<input id="issue_by" type="text" class="form-control" disabled required>
																	</div>
																</div>
															</div>

															<div class="col-lg-6 col-sm-6">
																<div class=" input-group-sm">

																	<div>
																		<label>Dep Support:</label>
																		<div class="  input-group-sm ">
																			<input id="dep_support" type="text" class="form-control" disabled required>
																		</div>
																	</div>


																	<div class=" input-group-sm">
																		<label>Support By:</label>
																		<select onchange="img_and_name(value)" id="support_by" name="support_by_quest" class="form-control" required>
																			<option selected value="">--- Support ---</option>
																		</select>
																	</div>
																</div>
															</div>

														</div>


														<div class="col-lg-12 col-sm-12">
															<div class="row">

																<div class="col-lg-6 col-sm-6">
																	<label>Type:</label>
																	<div class="  input-group-sm ">
																		<input id="type_q" type="text" class="form-control" disabled required>
																	</div>
																</div>


																<div class="col-lg-6 col-sm-6">
																	<label>Priority:</label>
																	<div class="  input-group-sm ">
																		<input id="pri_q" type="text" class="form-control" disabled required>
																	</div>
																</div>


																<div class="col-lg-6 col-sm-6">
																	<label>System:</label>
																	<div class="  input-group-sm ">
																		<input id="sys_q" type="text" class="form-control" disabled required>
																	</div>
																</div>


																<div class="col-lg-6 col-sm-6">
																	<label>Line:</label>
																	<div class="  input-group-sm ">
																		<input id="line_q" type="text" class="form-control" disabled required>
																	</div>
																</div>

																<div class="col-lg-6 col-sm-6">
																	<div class=" input-group-sm">
																		<label>Category:</label>
																		<select id="data_category" name="category_quest" class="form-control" required>
																			<option selected value="">--- Category ---</option>
																		</select>
																	</div>
																</div>


																<div class="col-lg-6 col-sm-6">
																	<label>Subject:</label>
																	<div class="  input-group-sm ">
																		<input id="subject_q" type="text" class="form-control" disabled required>
																	</div>
																</div>

																<div class="col-lg-12 col-sm-12">
																	<div class="  input-group-sm ">
																		<div class=" input-group-outline input-group-sm">
																			<label>Detail:</label>
																			<textarea disabled id="detail_q" cols="30" rows="2" class="form-control" placeholder="Detail........" required></textarea>
																		</div>
																	</div>
																</div>

															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane fade" id="navs-pills-justified-file2" role="tabpanel">
											<div class="col-lg-12 col-sm-12">
												<div class="row">
													<div class="col-lg-12 col-sm-12 my-2">

														<div class="row">
															<div class="col-lg-12 col-sm-12 my-2">
																<div style="  height: 350px;  border-radius: 10px;border-style: dotted; border-color: blue;display: flex;text-align:center;">
																	<span style="width: 33.33%;">
																		<img id="tplshow_modal_img_request1" class=" setting_img_request " src="<?php echo base_url(); ?>./themes/softmat/img/upload_file.png" alt="user">
																	</span>
																	<span style="width: 33.33%;">
																		<img id="tplshow_modal_img_request2" class=" setting_img_request " src="<?php echo base_url(); ?>./themes/softmat/img/upload_file.png" alt="user">
																	</span>
																	<span style="width: 33.33%;">
																		<img id="tplshow_modal_img_request3" class=" setting_img_request " src="<?php echo base_url(); ?>./themes/softmat/img/upload_file.png" alt="user">
																	</span>
																</div>
															</div>
														</div>

													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane fade" id="navs-pills-justified-other" role="tabpanel">
											<div class="col-lg-12 col-sm-12">
												<div class="row">

													<div class="col-lg-12 col-sm-12" id="update_s">

													</div>

													<div id="detail_time" class="col-lg-12 col-sm-12">

													</div>

													<div id="detail_support" class="col-lg-12 col-sm-12">
														<div class="  input-group-sm ">
															<div class=" input-group-outline input-group-sm">
																<label>Detail Support:</label>
																<textarea cols="30" rows="6" name="detail_support" class="form-control" placeholder="Detail........" required></textarea>
																<div class="col-lg-12 col-sm-12">
																	<div class="row">
																		<div class="col-lg-12 col-sm-12 my-2">
																			<div style="  height: 350px;    border-radius: 10px;border-style: dotted; border-color: blue;">
																				<span>
																					<img id="tplshow_data_img_request1" onclick="$('#tplupload_img_request1').click()" class=" setting_img_request " src="<?php echo base_url(); ?>./themes/softmat/img/upload_file.png" alt="user">
																					<img id="tplshow_data_img_request2" onclick="$('#tplupload_img_request2').click()" class=" setting_img_request " src="<?php echo base_url(); ?>./themes/softmat/img/upload_file.png" alt="user" style="display: none;">
																					<img id="tplshow_data_img_request3" onclick="$('#tplupload_img_request3').click()" class=" setting_img_request " src="<?php echo base_url(); ?>./themes/softmat/img/upload_file.png" alt="user" style="display: none;">
																				</span>

																				<input id="tplupload_img_request1" onchange="tplshow_img_request1(this)" name="tplre_img1" type="file" accept="image/png, image/gif, image/jpeg, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,application/pdf" hidden readonly>
																				<input id="tplupload_img_request2" onchange="tplshow_img_request2(this)" name="tplre_img2" type="file" accept="image/png, image/gif, image/jpeg, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,application/pdf" hidden readonly>
																				<input id="tplupload_img_request3" onchange="tplshow_img_request3(this)" name="tplre_img3" type="file" accept="image/png, image/gif, image/jpeg, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,application/pdf" hidden readonly>
																			</div>
																			<div class="" style="  display: flex; justify-content: center; align-items: center;">
																				<button onclick="remove_img_request1()" class=" btn  btn-sm  btn-warning my-2">Remove</button>
																			</div>
																			<div class="" style="  display: flex; justify-content: center; align-items: center;">
																				<button onclick="tplop_img(1)" type="button" class=" btn  btn-sm  btn-warning my-2" style="margin-right: 5px;">Image 1</button>
																				<button onclick="tplop_img(2)" type="button" class=" btn  btn-sm  btn-warning my-2" style="margin-right: 5px;">Image 2</button>
																				<button onclick="tplop_img(3)" type="button" class=" btn  btn-sm  btn-warning my-2">Image 3</button>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>


						</div>
						<div style="float: right;    margin-top: 1rem ;">
							<div id="button_quest_finish">
								<button type="button" onclick="" class=" btn  btn-sm  btn-secondary ">
									<i class='bx bx-reset  d-block d-sm-none'></i>
									<span class="d-none d-sm-block">Clear</span>
								</button>
								<button type="button" onclick="" class=" btn  btn-sm  btn-warning ">
									<i class='bx bx-time-five  d-block d-sm-none'></i>
									<span class="d-none d-sm-block">Delay</span>
								</button>
								<button type="button" onclick="finish_quest()" class=" btn  btn-sm  btn-success ">
									<i class='bx bx-check  d-block d-sm-none'></i>
									<span class="d-none d-sm-block">Finish</span>
								</button>
							</div>


							<div id="button_quest_e">
								<button type="button" onclick="" class=" btn  btn-sm  btn-secondary ">
									<i class='bx bx-reset  d-block d-sm-none'></i>
									<span class="d-none d-sm-block">Clear</span>
								</button>
								<button type="button" onclick="reply_deny($('#qu_id_quest').val())" class=" btn  btn-sm  btn-danger ">
									<i class='bx bx-reply  d-block d-sm-none'></i>
									<span class="d-none d-sm-block">Reply</span>
								</button>
								<button onclick="accept_quest()" type="button" onclick="" class=" btn  btn-sm  btn-warning ">
									<i class='bx bx-pin  d-block d-sm-none'></i>
									<span class="d-none d-sm-block">Accept</span>
								</button>
							</div>


						</div>
						<input type="hidden" id="qu_id_quest" name="qu_id_quest">
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- -------------------------------------------------------------------------------------------------------------------------------------- -->

	<script>
		function tplop_img(num) {
			if (num == 1) {
				$('#tplshow_data_img_request1').css('display', 'block');
				$('#tplshow_data_img_request2').css('display', 'none');
				$('#tplshow_data_img_request3').css('display', 'none');
			} else if (num == 2) {
				$('#tplshow_data_img_request1').css('display', 'none');
				$('#tplshow_data_img_request2').css('display', 'block');
				$('#tplshow_data_img_request3').css('display', 'none');
			} else if (num == 3) {
				$('#tplshow_data_img_request1').css('display', 'none');
				$('#tplshow_data_img_request2').css('display', 'none');
				$('#tplshow_data_img_request3').css('display', 'block');
			}
		}

		function tplshow_img_request1(input_img) {
			if (input_img.files && input_img.files[0]) {
				var imgType = input_img.files[0]['type'];
				var chk = imgType.split("/");
				var reader = new FileReader();
				reader.onload = function(e) {
					// console.log(e)
					if (chk[0] != "application") {
						$("#tplshow_data_img_request1").attr("src", e.target.result)
					} else {
						$("#tplshow_data_img_request1").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_file_icon.png")
					}
				}
				reader.readAsDataURL(input_img.files[0]);
			} else {
				$("#tplshow_data_img_request1").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_img.png")
			}
		}

		function tplshow_img_request2(input_img) {
			if (input_img.files && input_img.files[0]) {
				var imgType = input_img.files[0]['type'];
				var chk = imgType.split("/");
				var reader = new FileReader();
				reader.onload = function(e) {
					// console.log(e)
					if (chk[0] != "application") {
						$("#tplshow_data_img_request2").attr("src", e.target.result)
					} else {
						$("#tplshow_data_img_request2").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_file_icon.png")
					}
				}
				reader.readAsDataURL(input_img.files[0]);
			} else {
				$("#tplshow_data_img_request2").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_img.png")
			}
		}

		function tplshow_img_request3(input_img) {
			if (input_img.files && input_img.files[0]) {
				var imgType = input_img.files[0]['type'];
				var chk = imgType.split("/");
				var reader = new FileReader();
				reader.onload = function(e) {
					// console.log(e)
					if (chk[0] != "application") {
						$("#tplshow_data_img_request3").attr("src", e.target.result)
					} else {
						$("#tplshow_data_img_request3").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_file_icon.png")
					}
				}
				reader.readAsDataURL(input_img.files[0]);
			} else {
				$("#tplshow_data_img_request3").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/upload_img.png")
			}
		}
		async function reply_deny(qu_id) {
			// alert(qu_id)
			event.preventDefault();

			$('#modal_data_quest_show').modal('hide');
			const {
				value: text
			} = await Swal.fire({
				input: 'textarea',
				inputLabel: 'เหตุผลที่ Reply',
				inputPlaceholder: 'Detail............',
				inputAttributes: {
					'aria-label': 'Detail'
				},
				showCancelButton: true
			})

			if (text) {
				Swal.fire({
					title: "ต้องการ Reply หรือไม่ ?",
					text: "ยืนยัน",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#35D735',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes!'
				}).then((result) => {
					// Swal.fire(text)
					$.ajax({
						url: '<?php echo base_url(); ?>Request/reply_request',
						type: "POST",
						dataType: 'json',
						data: {
							qu_id: qu_id,
							detail_r: text
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
								report_tabCatSta()
							} else if (reply_cancel['reply'] === false) {
								Swal.fire({
									html: "<p>" + reply_cancel['html'] + "</p><p>" + reply_cancel['html_eng'] + "</p>",
									icon: 'warning',

								})
							}
						}
					})
				})
			} else {
				$('#modal_data_quest_show').modal('show');
			}


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

		function accept_quest() {
			event.preventDefault();
			Swal.fire({
				title: "ต้องการ Accept หรือไม่ ?",
				text: "ยืนยัน",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#35D735',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes!'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						url: '<?php echo base_url(); ?>Request/accept_quest',
						type: "POST",
						dataType: 'json',
						data: $('#form_quest_manage_quest').serialize(),
						success: function(data_accept) {
							// alert()
							// console.log(data_accept)
							if (data_accept !== true && data_accept !== false) {
								Swal.fire({
									html: "<p>" + data_accept + "</p>",
									icon: 'warning',
								})

							} else if (data_accept === true) {
								Swal.fire({
									html: "<p>Accept Quest</p><p>Success</p>",
									icon: 'success',
								})
								report_tabCatSta()
								$('#modal_data_quest_show').modal('hide')
							} else if (data_accept === false) {
								Swal.fire({
									html: "<p>Accept Quest</p><p>Error</p>",
									icon: 'Error',
								})
							}
						}
					})

				}
			})
		}

		function finish_quest() {
			event.preventDefault();
			Swal.fire({
				title: "กรุณาตรวจก่อน Finish ?",
				text: "ยืนยัน",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#35D735',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes!'
			}).then((result) => {
				if (result.isConfirmed) {
					// alert($('#form_quest_manage_quest').serialize())
					$.ajax({
						url: '<?php echo base_url(); ?>Request/finish_quest',
						type: "POST",
						dataType: 'json',
						data: $('#form_quest_manage_quest').serialize(),
						success: function(data_finish) {
							// alert()
							// console.log(data_finish)
							if (data_finish !== true && data_finish !== false) {
								Swal.fire({
									html: "<p>" + data_finish + "</p>",
									icon: 'warning',
								})

							} else if (data_finish === true) {
								Swal.fire({
									html: "<p>Finish Quest</p><p>Success</p>",
									icon: 'success',
								})
								report_tabCatSta()
								$('#modal_data_quest_show').modal('hide')
							} else if (data_finish === false) {
								Swal.fire({
									html: "<p>Finish Quest</p><p>Error</p>",
									icon: 'Error',
								})
							}
						}
					})

				}
			})
		}

		function update_s_time(data) {
			var detail_time = '';
			if (data !== '') {
				if (data !== $('#update_s_hid').val()) {
					if (data >= $('#update_s_hid').val()) {
						if (data !== '' && data !== null) {
							// alert($('#update_s_hid').val())
							detail_time = '<div class="  input-group-sm ">'
							detail_time += '<div class=" input-group-outline input-group-sm">'
							detail_time += '<label>Detail Update Time:</label>'
							detail_time +=
								'<textarea name="up_time_quest"  cols="30" rows="8" class="form-control" placeholder="Detail........" required></textarea>'
							detail_time += '</div>'
							detail_time += '</div>'
						}
						$('#detail_time').html(detail_time)
					} else {
						Swal.fire({
							html: "<p>Update Success Time</p><p>ไม่สามารน้อยกว่าเก่าได้</p>",
							icon: 'error',
						})
						$('input[name=update_s]').val($('#update_s_hid').val())
						detail_time = ''
						$('#detail_time').html(detail_time)
					}
				} else {
					detail_time = ''
					$('#detail_time').html(detail_time)

				}
			} else {
				detail_time = ''
				$('#detail_time').html(detail_time)
			}

		}
		setInterval(timer_quest, 1000)

		function timer_quest() {
			var qu_id = $('#qu_id_quest').val()
			if (qu_id !== '' && qu_id !== null && qu_id !== '0') {
				// alert(qu_id)
				$.ajax({
					type: 'POST',
					dataType: 'json',
					url: '<?php echo base_url(); ?>request/timer_quest',
					data: {
						qu_id: qu_id
					},
					success: function(timer_quest) {
						// console.log(timer_quest)
						$.each(timer_quest, function(key_u, val_u) {
							if (val_u.over_accept_flag === '1') {
								$("#time_accept2").css("color", "red");
							} else if (val_u.over_accept_flag === '2') {
								$("#time_accept2").css("color", "green");
							} else if (val_u.over_accept_flag === '0') {
								$("#time_accept2").css("color", "");
							}

							if (val_u.over_success_flag === '1') {
								$("#time_success2").css("color", "red");
							} else if (val_u.over_success_flag === '2') {
								$("#time_success2").css("color", "green");
							} else if (val_u.over_success_flag === '0') {
								$("#time_success2").css("color", "");
							}
						})
					}
				})
			}

		}

		function img_and_name(user_id) {
			if (user_id !== '' && user_id !== null) {
				$.ajax({
					type: 'POST',
					dataType: 'json',
					url: '<?php echo base_url(); ?>Manage_user/get_data_edit_user',
					data: {
						user_id: user_id
					},
					beforeSend: function() {
						$("#img_recipient_name_u").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/loading3.gif")
					},
					complete: function() {
						$("#img_recipient_name_u").attr('style', 'display');
					},
					success: function(data_user) {
						// console.log(data_user)

						$.each(data_user, function(key_u, val_u) {
							if (val_u.path_img_user !== '' && val_u.path_img_user !== null) {
								$("#img_recipient_name_u").attr("src", "<?php echo base_url(); ?>" + val_u.path_img_user + "")
								$('#recipient_name_b').html('<span>' + val_u.employee + '</span>')
							} else {
								$("#img_recipient_name_u").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/user.png")
								$('#recipient_name_b').html('<span>?????</span>')
							}
						})
					}
				})
			} else {
				$("#img_recipient_name_u").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/user.png")
				$('#recipient_name_b').html('<span>?????</span>')
			}

		}



		function show_data_request(qu_id) {
			$('#qu_id_quest').val(qu_id)
			update_s_time('')
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: '<?php echo base_url(); ?>request/get_data_quest',
				data: {
					qu_id: qu_id
				},
				success: function(data_quest) {
					$.each(data_quest, function(key_q, val_q) {

						// alert(val_q.support_by_id +'==='+ <?php echo $this->session->userdata('sessUsrId') ?>)


						// if (val_q.support_by_id == <?php echo $this->session->userdata('sessUsrId') ?>) {



						if (val_q.issue_by !== '' && val_q.issue_by !== null) {
							$('#sender_name_b').html('<span>' + val_q.issue_by + '</span>')
						} else {
							$('#sender_name_b').html('<span>?????</span>')
						}

						if (val_q.support_by !== '' && val_q.support_by !== null) {
							$('#recipient_name_b').html('<span>' + val_q.support_by + '</span>')
						} else {
							$('#recipient_name_b').html('<span>?????</span>')
						}

						if (val_q.dep_issue !== '' && val_q.dep_issue !== null) {
							$('#dep_issue').val(val_q.dep_issue)

						} else {
							$('#dep_issue').val('?????')
						}

						if (val_q.dep_support !== '' && val_q.dep_support !== null) {
							$('#dep_support').val(val_q.dep_support)

						} else {
							$('#dep_support').val('?????')
						}

						if (val_q.type_name !== '' && val_q.type_name !== null) {
							$('#type_q').val(val_q.type_name)
						} else {
							$('#type_q').val('?????')
						}

						if (val_q.pri_name !== '' && val_q.pri_name !== null) {
							$('#pri_q').val(val_q.pri_name)
						} else {
							$('#pri_q').val('?????')
						}

						if (val_q.system_name !== '' && val_q.system_name !== null) {
							$('#sys_q').val(val_q.system_name)
						} else {
							$('#sys_q').val('?????')
						}

						if (val_q.lp_name !== '' && val_q.lp_name !== null) {
							$('#line_q').val(val_q.lp_name)
						} else {
							$('#line_q').val('?????')
						}

						if (val_q.detail !== '' && val_q.detail !== null) {
							$('#detail_q').val(val_q.detail)
						} else {
							$('#detail_q').val('?????')
						}

						if (val_q.subject !== '' && val_q.subject !== null) {
							$('#subject_q').val(val_q.subject)
						} else {
							$('#subject_q').val('?????')
						}
						if (val_q.status_qu === '1') {
							$("#button_quest_e").attr("hidden", false)
							$('#support_by').attr('disabled', false)
							$('#button_quest_finish').attr('hidden', true)
							$('#detail_support').attr('hidden', true)

							var update_time = '';
							update_time = '<div class="  input-group-sm ">'
							update_time += '<div class=" input-group-outline input-group-sm">'
							update_time += '<label>Update Success Time:</label>'
							update_time +=
								'<input onchange="update_s_time(value)" name="update_s" type="datetime-local" value="' + val_q
								.specified_time + '"  class="form-control" required>'
							update_time +=
								'<input type="datetime-local" id="update_s_hid" name="update_suc_hide" class="form-control" hidden required>'
							update_time += '</div>'
							update_time += '</div>'
							$('#update_s').html(update_time)
							// ------------------------------------------------------------category------------------------------------------------------
							var html_category = '';
							$.ajax({
								type: 'POST',
								dataType: 'json',
								url: '<?php echo base_url(); ?>GET_API/get_data_category',
								data: {
									dep_id: val_q.dep_support_id,
								},
								success: function(reply_cat) {
									// console.log(reply_cat)
									if (reply_cat !== null && reply_cat !== '') {
										html_category = '';
										html_category += '<option selected value="">--- Category ---</option>';
										$.each(reply_cat, function(key_cat, val_cat) {
											html_category += '<option  value="' + val_cat.cat_id + '">' + val_cat.cat_name +
												'</option>'
										})
									} else {
										html_category = '';
										html_category += '<option selected value="">--- (No Category) ---</option>';
									}
									$("#data_category").html(html_category)
									$('#data_category').attr('disabled', false)
								}
							})
							// ------------------------------------------------------------end_category--------------------------------------------------
						} else if (val_q.status_qu === '2') {
							$("#button_quest_e").attr("hidden", true)
							$('#support_by').attr('disabled', true)
							$('#button_quest_finish').attr('hidden', false)
							$('#detail_support').attr('hidden', false)



							update_time = '';
							$('#update_s').html(update_time)
							// ------------------------------------------------------------category------------------------------------------------------
							var html_category = '';
							var check_category = '';
							$.ajax({
								type: 'POST',
								dataType: 'json',
								url: '<?php echo base_url(); ?>GET_API/get_data_category',
								data: {
									dep_id: val_q.dep_support_id,
								},
								success: function(reply_cat) {
									// console.log(reply_cat)
									if (reply_cat !== null && reply_cat !== '') {
										html_category = '';
										html_category += '<option selected value="">--- Category ---</option>';
										$.each(reply_cat, function(key_cat, val_cat) {
											// alert(val_cat.cat_id +'==='+ val_q.cat_id)
											if (val_cat.cat_id === val_q.cat_id) {
												check_category = 'selected';
											}
											html_category += '<option ' + check_category + '  value="' + val_cat.cat_id +
												'">' + val_cat.cat_name + '</option>'
											check_category = '';
										})
									} else {
										html_category = '';
										html_category += '<option selected value="">--- (No Category) ---</option>';
									}
									$("#data_category").html(html_category)
									$('#data_category').attr('disabled', true)
								}
							})
							// ------------------------------------------------------------end_category--------------------------------------------------


						}

						$('#update_s_hid').val(val_q.specified_time)
						$('#time_accept').html('<span style="" id="time_accept2">Accept Time: ' + val_q.receive_time +
							'</span>')
						$('#time_success').html('<span style="" id="time_success2">Success Time: ' + val_q.specified_time +
							'</span>')

						// ---------------------------------------------------support_by---------------------------------------------------------------
						$.ajax({
							type: 'POST',
							dataType: 'json',
							url: '<?php echo base_url(); ?>GET_API/get_support_by',
							data: {
								dep_id: val_q.dep_support_id,
							},
							success: function(reply_support) {
								// console.log(reply_support)
								if (reply_support !== null && reply_support !== '') {
									var html_support_by = '';
									var html_check = '';
									html_support_by += '<option selected value="">--- Support ---</option>';
									$.each(reply_support, function(key_support, val_support) {
										if (val_support.user_id === val_q.support_by_id) {
											html_check = 'selected';
										}
										html_support_by += '<option ' + html_check + '  value="' + val_support.user_id +
											'">' + val_support.f_name + ' ' + val_support.l_name + ' (' + val_support
											.employee + ')</option>'
										html_check = '';
									})
								} else {
									$("#support_by").attr("disabled", true)
									html_support_by = '';
									html_support_by += '<option selected value="">--- (No Employee) ---</option>';
								}
								$("#support_by").html(html_support_by)
							}
						})
						// ---------------------------------------------------end_support_by---------------------------------------------------------------

						if (val_q.issue_by_id !== '' && val_q.issue_by_id !== null) {
							$.ajax({
								type: 'POST',
								dataType: 'json',
								url: '<?php echo base_url(); ?>Manage_user/get_data_edit_user',
								data: {
									user_id: val_q.issue_by_id
								},
								beforeSend: function() {
									$("#img_sender_name_u").attr("src",
										"<?php echo base_url(); ?>./themes/softmat/img/loading3.gif")
									// $("#img_recipient_name_u").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/loading3.gif")
								},
								complete: function() {
									$("#img_sender_name_u").attr('style', 'display');
									// $("#img_recipient_name_u").attr('style', 'display');
								},
								success: function(data_user) {
									// console.log(data_user)

									$.each(data_user, function(key_u, val_u) {
										if (val_u.employee !== '' && val_u.employee !== null) {
											$('#issue_by').val(val_u.f_name + ' ' + val_u.l_name + '(' + val_u.employee +
												')')
										} else {
											$('#issue_by').val('?????')
										}
										if (val_u.path_img_user !== '' && val_u.path_img_user !== null) {
											$("#img_sender_name_u").attr("src", "<?php echo base_url(); ?>" + val_u
												.path_img_user + "")
										} else {
											$("#img_sender_name_u").attr("src",
												"<?php echo base_url(); ?>./themes/softmat/img/user.png")
										}
									})
								}
							})
						} else {
							$('#issue_by').val(val_q.issue_text)
							$("#img_sender_name_u").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/user.png")
						}

						$.ajax({
							type: 'POST',
							dataType: 'json',
							url: '<?php echo base_url(); ?>Manage_user/get_data_edit_user',
							data: {
								user_id: val_q.support_by_id
							},
							beforeSend: function() {
								$("#img_recipient_name_u").attr("src",
									"<?php echo base_url(); ?>./themes/softmat/img/loading3.gif")
							},
							complete: function() {
								$("#img_recipient_name_u").attr('style', 'display');
							},
							success: function(data_user) {
								// console.log(data_user)

								$.each(data_user, function(key_u, val_u) {
									if (val_u.path_img_user !== '' && val_u.path_img_user !== null) {
										$("#img_recipient_name_u").attr("src", "<?php echo base_url(); ?>" + val_u
											.path_img_user + "")
									} else {
										$("#img_recipient_name_u").attr("src",
											"<?php echo base_url(); ?>./themes/softmat/img/user.png")
									}
								})
							}
						})
						$('#modal_data_quest_show').modal('show')
						// } else {
						//   Swal.fire({
						//     html: "<p>ไม่ใช่ quest ของคุณ</p><p>กรุณาตรวจสอบ</p>",
						//     icon: 'warning',

						//   })
						// }


					})


				}
			})
			$.ajax({
			url: '<?php echo base_url(); ?>Request/data_quest_img',
			type: "POST",
			dataType: 'json',
			data: {
				qu_id: qu_id,
			},
			success: function (data) {
				// console.log(data)
				$('#tplshow_modal_img_request1').attr("src", '<?php echo base_url(); ?>./themes/softmat/img/upload_file.png');
				$('#tplshow_modal_img_request2').attr("src", '<?php echo base_url(); ?>./themes/softmat/img/upload_file.png');
				$('#tplshow_modal_img_request3').attr("src", '<?php echo base_url(); ?>./themes/softmat/img/upload_file.png');
				if (data['null'] != 'null') {
					var num = 1;
					$.each(data, function (key, val) {
						var eid = "#tplshow_modal_img_request" + num;
						var imgpath = '<?php echo base_url(); ?>./' + val.path_img;
						var surname = val.path_img;
						var myArray = surname.split(".");
						if(myArray[1]=='xls'||myArray[1]=='pdf'){
							imgpath = '<?php echo base_url(); ?>./themes/softmat/img/upload_file_icon.png';
						}
						$(eid).attr("src", imgpath);
						num++;
					})
				}
			}
		})

		}

		$(document).ready(function() {
			show_img_user()
		})

		function show_img_user() {
			// alert($('#id_user_id').val())
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: '<?php echo base_url(); ?>Manage_user/get_data_edit_user',
				data: {
					user_id: $('#id_user_id').val()
				},
				beforeSend: function() {
					$("#img_hearder").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/loading3.gif")
					$("#img_hearder2").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/loading3.gif")
					$("#img_edit_user_name").attr("src", "<?php echo base_url(); ?>./themes/softmat/img/loading3.gif")

				},
				complete: function() {
					$("#img_hearder").attr('style', 'display');
					$("#img_hearder2").attr('style', 'display');
					$("#img_edit_user_name").attr('style', 'display');
				},
				success: function(data_user) {
					$('#upload_imgprofile').val('')
					$.each(data_user, function(key_user, val_user) {
						// console.log(val_user.path_img_user)
						if (val_user.path_img_user !== null && val_user.path_img_user !== '') {
							$('#img_hearder').attr('src', '<?php echo base_url(); ?>' + val_user.path_img_user)
							$('#img_hearder2').attr('src', '<?php echo base_url(); ?>' + val_user.path_img_user)
							$('#img_edit_user_name').attr('src', '<?php echo base_url(); ?>' + val_user.path_img_user)

						} else {
							$('#img_hearder').attr('src', '<?php echo base_url(); ?>./themes/softmat/img/user.png')
							$('#img_hearder2').attr('src', '<?php echo base_url(); ?>./themes/softmat/img/user.png')
							$('#img_edit_user_name').attr('src', '<?php echo base_url(); ?>./themes/softmat/img/user.png')

						}
					})

				}
			})
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
								report_tabCatSta()
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
	</script>
