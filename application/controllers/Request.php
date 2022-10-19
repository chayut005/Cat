<?php defined('BASEPATH') or exit('No direct script access allowed');

class Request extends CI_Controller
{

	private $theme;

	public function __construct()
	{
		parent::__construct();

		## asset config
		$theme = $this->config->item('theme');
		$this->theme = $theme;

		$this->asset_url = $this->config->item('asset_url');
		$this->js_url = $this->config->item('js_url');
		$this->css_url = $this->config->item('css_url');
		$this->image_url = $this->config->item('image_url');



		$this->template->write('js_url', $this->js_url);
		$this->template->write('css_url', $this->css_url);
		$this->template->write('asset_url', $this->asset_url);
		$this->template->write('image_url', $this->image_url);
	}
	public function Request_from()
	{
		$checkSess = $this->assist_backend->CheckSession();
		$setTitle = strtoupper(str_replace('_', ' ', $this->router->fetch_method()));
		$this->template->write('page_title', ' CAT | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'all/' . $this->theme . '/view_menu.php');
		$this->template->write_view('page_header', 'all/' . $this->theme . '/view_header.php');
		$this->template->write_view('page_content', 'all/' . $this->theme . '/view_request_from.php');
		$this->template->write_view('page_footer', 'all/' . $this->theme . '/view_footer.php');
		$this->template->render();
	}
	public function send_data_request()
	{
		$action = base64_decode($this->input->post('action'));


		if ($action == 'request') {

			$this->form_validation->set_error_delimiters('<p>', '</p>');

			$this->form_validation->set_rules('re_department_issue', 'Department Issue', 'trim|is_natural_no_zero|required');
			// $this->form_validation->set_rules('re_issue', 'Issue By', 'trim|is_natural_no_zero');
			// $this->form_validation->set_rules('issue_box', 'Issue Box', 'trim|required');

			$this->form_validation->set_rules('re_department', 'Department Support', 'trim|is_natural_no_zero|required');
			$this->form_validation->set_rules('re_support', 'Support By', 'trim|is_natural_no_zero|required');
			$this->form_validation->set_rules('re_type', 'Type', 'trim|is_natural_no_zero|required');
			$this->form_validation->set_rules('re_system', 'System', 'trim|is_natural_no_zero|required');
			$this->form_validation->set_rules('re_category', 'Category', 'trim|is_natural_no_zero|required');
			// $this->form_validation->set_rules('re_priority', 'Priority', 'trim|is_natural_no_zero');
			$this->form_validation->set_rules('re_subject', 'Subject', 'trim|required|min_length[3]|max_length[128]');
			// $this->form_validation->set_rules('re_line', 'Line', 'trim');
			$this->form_validation->set_rules('re_detail', 'Detail', 'trim|required|min_length[3]|max_length[128]');




			$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาตรวจสอบ');
			$this->form_validation->set_message('min_length', '%s ต้องมีมากว่า 3 ตัว');
			$this->form_validation->set_message('max_length', '%s ต้องมีไม่เกิน 128 ตัว');


			$this->form_validation->set_message('is_natural_no_zero', 'กรุณาทำการตรวจสอบ %s ด้วย');

			if ($this->form_validation->run() == FALSE) {
				echo json_encode(validation_errors());
				exit;
			} else {


				$data['re_department_issue'] = $this->input->post('re_department_issue');
				$data['re_issue'] = $this->input->post('re_issue');
				$data['re_department'] = $this->input->post('re_department');
				$data['re_support'] = $this->input->post('re_support');
				$data['re_type'] = $this->input->post('re_type');
				$data['re_system'] = $this->input->post('re_system');
				$data['re_category'] = $this->input->post('re_category');
				$data['re_subject'] = $this->input->post('re_subject');
				$data['re_detail'] = $this->input->post('re_detail');
				$data['issue_box'] = $this->input->post('issue_box');

				$data['re_line'] = '';
				$data['priority_id'] = '';


				if (!empty($_FILES["re_img1"]["name"])) {
					if ($_FILES['re_img1']['size'] <= '4000000') {
						$check_type = $this->assist_backend->check_type($data['re_department'], $data['re_type']);
						if ($check_type !== null && $check_type !== '') {
							$this->form_validation->set_rules('re_priority', 'Priority', 'required');

							$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาตรวจสอบ');

							if ($this->form_validation->run() == FALSE) {
								echo json_encode(validation_errors());
								exit;
							} else {
								$re_priority = $this->input->post('re_priority');
								// --------------------------------------------priority_time-------------------------------------------------

								$myArray = explode(' ', $re_priority);
								$priority_id = $myArray[0];
								$priority_time =  $myArray[1];

								// --------------------------------------------end_priority_time---------------------------------------------

								// --------------------------------------------department_time-----------------------------------------------

								$time_dep = $this->assist_backend->time_department($data['re_department']);

								// --------------------------------------------end_department_time-------------------------------------------

								// --------------------------------------------specified_time------------------------------------------------

								$date = date("Y-m-d H:i:s");
								$data['priority_id'] = $priority_id;
								$data['date_create'] =  $date;
								$time_receive = date('Y-m-d H:i:s', strtotime($date . '' . $time_dep[0]['time_dep'] . ' min'));
								$specified_time = date('Y-m-d H:i:s', strtotime($time_receive . '' . $priority_time . ' min'));
								$data['time_receive'] =  $time_receive;
								$data['specified_time'] =  $specified_time;

								// --------------------------------------------end_specified_time--------------------------------------------

								$check_system = $this->assist_backend->check_system($data['re_department_issue'], $data['re_system']);
								if ($check_system !== null && $check_system !== '') {
									$this->form_validation->set_rules('re_line', 'Line', 'required');

									$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาตรวจสอบ');

									if ($this->form_validation->run() == FALSE) {
										echo json_encode(validation_errors());
										exit;
									} else {
										$data['re_line'] = $this->input->post('re_line');
									}
								}
								$tempFileLogo = $_FILES['re_img1']['tmp_name'];
								$FileLogo = $_FILES['re_img1']['name'];
								$sending_data_request = $this->assist_backend->sending_data_request($FileLogo, $tempFileLogo, $data);
								echo json_encode($sending_data_request);
								exit;
							}
						} else {
							$time_request = $this->assist_backend->time_request($data['re_department'], $data['re_type']);
							if ($time_request !== null && $time_request !== '') {

								// --------------------------------------------request_time--------------------------------------------------

								$time_request_dep =  $time_request[0]['set_timer_request_dep'];


								// $data['all_m_re'] =  $all_m_re;

								// --------------------------------------------end_request_time----------------------------------------------

								// --------------------------------------------department_time-----------------------------------------------

								$time_dep = $this->assist_backend->time_department($data['re_department']);

								// $data['all_m_dep'] =  $all_m_dep;
								// --------------------------------------------end_department_time-------------------------------------------

								// --------------------------------------------specified_time------------------------------------------------
								$date = date("Y-m-d H:i:s");
								$data['date_create'] =  $date;
								$time_receive = date('Y-m-d H:i:s', strtotime($date . '' . $time_dep[0]['time_dep'] . ' min'));
								$specified_time = date('Y-m-d H:i:s', strtotime($time_receive . '' . $time_request_dep . ' min'));
								$data['time_receive'] =  $time_receive;
								$data['specified_time'] =  $specified_time;

								// --------------------------------------------end_specified_time--------------------------------------------

								$check_system = $this->assist_backend->check_system($data['re_department_issue'], $data['re_system']);
								if ($check_system !== null && $check_system !== '') {
									$this->form_validation->set_rules('re_line', 'Line', 'required');

									$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาตรวจสอบ');

									if ($this->form_validation->run() == FALSE) {
										echo json_encode(validation_errors());
										exit;
									} else {
										$data['re_line'] = $this->input->post('re_line');
									}
								}
								$tempFileLogo = $_FILES['re_img1']['tmp_name'];
								$FileLogo = $_FILES['re_img1']['name'];
								$sending_data_request = $this->assist_backend->sending_data_request($FileLogo, $tempFileLogo, $data);
								echo json_encode($sending_data_request);
								exit;
							}
						}
					} else {
						echo json_encode('<p>image ของคุณขนาดเกิน 4000000 </p>');
						exit;
					}
				} else {
					$check_type = $this->assist_backend->check_type($data['re_department'], $data['re_type']);
					if ($check_type !== null && $check_type !== '') {
						$this->form_validation->set_rules('re_priority', 'Priority', 'required');

						$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาตรวจสอบ');

						if ($this->form_validation->run() == FALSE) {
							echo json_encode(validation_errors());
							exit;
						} else {
							$re_priority = $this->input->post('re_priority');
							// --------------------------------------------priority_time-------------------------------------------------

							$myArray = explode(' ', $re_priority);
							$priority_id = $myArray[0];
							$priority_time =  $myArray[1];

							// --------------------------------------------end_priority_time---------------------------------------------

							// --------------------------------------------department_time-----------------------------------------------

							$time_dep = $this->assist_backend->time_department($data['re_department']);

							// --------------------------------------------end_department_time-------------------------------------------

							// --------------------------------------------specified_time------------------------------------------------

							$date = date("Y-m-d H:i:s");
							$data['priority_id'] = $priority_id;
							$data['date_create'] =  $date;
							$time_receive = date('Y-m-d H:i:s', strtotime($date . '' . $time_dep[0]['time_dep'] . ' min'));
							$specified_time = date('Y-m-d H:i:s', strtotime($time_receive . '' . $priority_time . ' min'));
							$data['time_receive'] =  $time_receive;
							$data['specified_time'] =  $specified_time;

							// --------------------------------------------end_specified_time--------------------------------------------

							$check_system = $this->assist_backend->check_system($data['re_department_issue'], $data['re_system']);
							if ($check_system !== null && $check_system !== '') {
								$this->form_validation->set_rules('re_line', 'Line', 'required');

								$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาตรวจสอบ');

								if ($this->form_validation->run() == FALSE) {
									echo json_encode(validation_errors());
									exit;
								} else {
									$data['re_line'] = $this->input->post('re_line');
								}
							}
							$sending_request =  $this->assist_backend->sending_request($data);
							echo json_encode($sending_request);
							exit;
						}
					} else {
						$time_request = $this->assist_backend->time_request($data['re_department'], $data['re_type']);
						if ($time_request !== null && $time_request !== '') {

							// --------------------------------------------request_time--------------------------------------------------

							$time_request_dep =  $time_request[0]['set_timer_request_dep'];


							// $data['all_m_re'] =  $all_m_re;

							// --------------------------------------------end_request_time----------------------------------------------

							// --------------------------------------------department_time-----------------------------------------------

							$time_dep = $this->assist_backend->time_department($data['re_department']);

							// $data['all_m_dep'] =  $all_m_dep;
							// --------------------------------------------end_department_time-------------------------------------------

							// --------------------------------------------specified_time------------------------------------------------
							$date = date("Y-m-d H:i:s");
							$data['date_create'] =  $date;
							$time_receive = date('Y-m-d H:i:s', strtotime($date . '' . $time_dep[0]['time_dep'] . ' min'));
							$specified_time = date('Y-m-d H:i:s', strtotime($time_receive . '' . $time_request_dep . ' min'));
							$data['time_receive'] =  $time_receive;
							$data['specified_time'] =  $specified_time;

							// --------------------------------------------end_specified_time--------------------------------------------

							$check_system = $this->assist_backend->check_system($data['re_department_issue'], $data['re_system']);
							if ($check_system !== null && $check_system !== '') {
								$this->form_validation->set_rules('re_line', 'Line', 'required');

								$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาตรวจสอบ');

								if ($this->form_validation->run() == FALSE) {
									echo json_encode(validation_errors());
									exit;
								} else {
									$data['re_line'] = $this->input->post('re_line');
								}
							}
							$sending_request =  $this->assist_backend->sending_request($data);
							echo json_encode($sending_request);
							exit;
						}
					}
				}
			}
			// 	}
			// }
		}
	}
	public function Manage_request()
	{
		$checkSess = $this->assist_backend->CheckSession();
		$setTitle = strtoupper(str_replace('_', ' ', $this->router->fetch_method()));
		$this->template->write('page_title', ' CAT | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'all/' . $this->theme . '/view_menu.php');
		$this->template->write_view('page_header', 'all/' . $this->theme . '/view_header.php');
		$this->template->write_view('page_content', 'all/' . $this->theme . '/view_manage_request.php');
		$this->template->write_view('page_footer', 'all/' . $this->theme . '/view_footer.php');
		$this->template->render();
	}
	public function get_datatable_request()
	{
		$start_date = $_POST['start_date'];
		$end_date = $_POST['end_date'];
		$user_id = $this->session->userdata('sessUsrId');
		$per = 'quest_all_no_dep';
		$CheckPermissions2 = $this->assist_backend->CheckPermissions2($user_id, $per);
		if ($CheckPermissions2 === true) {
			$this->assist_backend->checksession();
			$datatable = $this->assist_backend->get_datatable_request_all($start_date, $end_date);
		} else if ($CheckPermissions2 === false) {
			$CheckPermission = $this->assist_backend->CheckPermission($this->session->userdata('sessUsrId'));
			if ($CheckPermission === true) {
				$this->assist_backend->checksession();
				$datatable = $this->assist_backend->get_datatable_request_dep($start_date, $end_date);
			} else {
				$this->assist_backend->checksession();
				$datatable = $this->assist_backend->get_datatable_request($start_date, $end_date);
			}
		}
		$i = 0;

		$user_id = $this->session->userdata('sessUsrId');
		$per_u = 'brn_manage_request';
		$CheckPermissions = $this->assist_backend->CheckPermissions($user_id, $per_u);
		if ($CheckPermissions === true) {
			foreach ($datatable as $ta) {

				$data_html = '';
				if ($ta['status_qu'] === '1') {
					$data_html .= '<a onclick="show_data_request(' . $ta['qu_id'] . ')" style="cursor: pointer;padding-right: 0.8em;" ><i class="bx bx-clipboard"></i></a><a onclick="cancel_quest(' . $ta['qu_id'] . ')" style="cursor: pointer;padding-right: 0.8em;" ><i class="bx bx-task-x"></i></a>';
				} else if ($ta['status_qu'] === '2') {
					$data_html .= '<a onclick="show_data_request(' . $ta['qu_id'] . ')" style="cursor: pointer;padding-right: 0.8em;" ><i class="bx bx-hourglass bx-tada" ></i></a>';
				} else if ($ta['status_qu'] === '3') {
					$data_html .= '<a onclick="" style="cursor: pointer;padding-right: 0.8em;" ><i class="bx bx-file-find"></i></a>';
				} else if ($ta['status_qu'] === '4') {
					$data_html .= '<a onclick="text_box_detail_reply(' . $ta['qu_id'] . ')" style="padding-right: 0.8em;" ><i class="bx bx-message-rounded-dots bx-tada"></i></a>';
				} else if ($ta['status_qu'] === '0') {
					$data_html .= '<a onclick="text_box_detail_cancel(' . $ta['qu_id'] . ')" style="padding-right: 0.8em;" ><i class="bx bx-message-rounded-dots bx-tada"></i></a>';
				}
				$datatable[$i]['button_show'] = $data_html;
				$i++;
			}
		} else if ($CheckPermissions === false) {
			foreach ($datatable as $ta) {

				$data_html = '';
				if ($ta['status_qu'] === '1') {
					$data_html .= '<a onclick="cancel_quest(' . $ta['qu_id'] . ')" style="cursor: pointer;padding-right: 0.8em;" ><i class="bx bx-task-x"></i></a>';
				} else if ($ta['status_qu'] === '2') {
					$data_html .= '<a onclick="" style="cursor: pointer;padding-right: 0.8em;" ><i class="bx bx-hourglass bx-tada" ></i></a>';
				} else if ($ta['status_qu'] === '3') {
					$data_html .= '<a onclick="" style="cursor: pointer;padding-right: 0.8em;" ><i class="bx bx-file-find"></i></a>';
				} else if ($ta['status_qu'] === '4') {
					$data_html .= '<a onclick="text_box_detail_reply(' . $ta['qu_id'] . ')" style="padding-right: 0.8em;" ><i class="bx bx-message-rounded-dots bx-tada"></i></a>';
				} else if ($ta['status_qu'] === '0') {
					$data_html .= '<a onclick="text_box_detail_cancel(' . $ta['qu_id'] . ')" style="padding-right: 0.8em;" ><i class="bx bx-message-rounded-dots bx-tada"></i></a>';
				}
				$datatable[$i]['button_show'] = $data_html;
				$i++;
			}
		}
		$table = array("data" => $datatable);
		echo json_encode($table);
	}
	public function cancel_request()
	{
		$this->form_validation->set_rules('detail_c', 'Detail Cancel', 'trim|required|min_length[3]|max_length[128]');

		$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณากรอกข้อมูล  ');
		$this->form_validation->set_message('min_length', '%s ต้องมีมากว่า 3 ตัว');
		$this->form_validation->set_message('max_length', '%s ต้องมีไม่เกิน 128 ตัว');

		if ($this->form_validation->run() == FALSE) {
			echo json_encode(validation_errors());
		} else {
			$detail_c = $_POST['detail_c'];
			$qu_id = $_POST['qu_id'];


			$checkSess = $this->assist_backend->CheckSession();
			$result = $this->assist_backend->cancel_request($qu_id, $detail_c);
			if ($result == true) {
				$reply_cancel = "";
				$reply_cancel = array('reply' => $result, 'html' => 'Cancel สำเร็จ', 'html_eng' => 'Cancel Success');
				echo json_encode($reply_cancel);
				exit;
			} else if ($result == false) {
				$reply_cancel = "";
				$reply_cancel = array('reply' => $result, 'html' => 'ไม่สามารถ Cancel ได้', 'html_eng' => 'Can"t Cancel');
				echo json_encode($reply_cancel);
				exit;
			}
		}
	}
	public function reply_request()
	{
		$this->form_validation->set_rules('detail_r', 'Detail Reply', 'trim|required|min_length[3]|max_length[128]');

		$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณากรอกข้อมูล  ');
		$this->form_validation->set_message('min_length', '%s ต้องมีมากว่า 3 ตัว');
		$this->form_validation->set_message('max_length', '%s ต้องมีไม่เกิน 128 ตัว');

		if ($this->form_validation->run() == FALSE) {
			echo json_encode(validation_errors());
		} else {
			$detail_r = $_POST['detail_r'];
			$qu_id = $_POST['qu_id'];


			$checkSess = $this->assist_backend->CheckSession();
			$result = $this->assist_backend->reply_request($qu_id, $detail_r);
			if ($result == true) {
				$reply_cancel = "";
				$reply_cancel = array('reply' => $result, 'html' => 'Cancel สำเร็จ', 'html_eng' => 'Cancel Success');
				echo json_encode($reply_cancel);
				exit;
			} else if ($result == false) {
				$reply_cancel = "";
				$reply_cancel = array('reply' => $result, 'html' => 'ไม่สามารถ Cancel ได้', 'html_eng' => 'Can"t Cancel');
				echo json_encode($reply_cancel);
				exit;
			}
		}
	}
	public function get_datatable_request_user()
	{
		$start_date = $_POST['start_date'];
		$end_date = $_POST['end_date'];
		$user_id = $this->session->userdata('sessUsrId');

		$this->assist_backend->checksession();
		$datatable = $this->assist_backend->get_datatable_request_all_user($start_date, $end_date, $user_id);

		$i = 0;
		foreach ($datatable as $ta) {

			$data_html = '';
			if ($ta['status_qu'] === '1') {
				$data_html .= '<a onclick="edit_data_request(' . $ta['qu_id'] . ')" style="cursor: pointer;padding-right: 0.8em;" ><i class="bx bx-edit" ></i></a><a onclick="cancel_quest(' . $ta['qu_id'] . ')" style="cursor: pointer;padding-right: 0.8em;" ><i class="bx bx-task-x"></i></a>';
			} else if ($ta['status_qu'] === '2') {
				$data_html .= '<a onclick="" style="cursor: pointer;padding-right: 0.8em;" ><i class="bx bx-hourglass bx-tada" ></i></a>';
			} else if ($ta['status_qu'] === '3') {
				$data_html .= '<a onclick="" style="cursor: pointer;padding-right: 0.8em;" ><i class="bx bx-file-find"></i></a>';
			} else if ($ta['status_qu'] === '4') {
				$data_html .= '<a onclick="text_box_detail_reply(' . $ta['qu_id'] . ')" style="padding-right: 0.8em;" ><i class="bx bx-message-rounded-dots bx-tada"></i></a>';
			} else if ($ta['status_qu'] === '0') {
				$data_html .= '<a onclick="text_box_detail_cancel(' . $ta['qu_id'] . ')" style="padding-right: 0.8em;" ><i class="bx bx-message-rounded-dots bx-tada"></i></a>';
			}
			$datatable[$i]['button_show'] = $data_html;
			$i++;
		}

		$table = array("data" => $datatable);
		echo json_encode($table);
	}
	public function send_data_quest_way()
	{
		$action = base64_decode($this->input->post('action'));


		if ($action == 'request_way') {

			$this->form_validation->set_error_delimiters('<p>', '</p>');

			$this->form_validation->set_rules('way_department', 'Department Support', 'trim|is_natural_no_zero|required');
			$this->form_validation->set_rules('support_way', 'Support By', 'trim|is_natural_no_zero|required');
			$this->form_validation->set_rules('type_way', 'Type', 'trim|is_natural_no_zero|required');
			$this->form_validation->set_rules('system_way', 'System', 'trim|is_natural_no_zero|required');
			$this->form_validation->set_rules('subject_way', 'Subject', 'trim|required|min_length[3]|max_length[128]');
			$this->form_validation->set_rules('detail_way', 'Detail', 'trim|required|min_length[3]|max_length[128]');




			$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาตรวจสอบ');
			$this->form_validation->set_message('min_length', '%s ต้องมีมากว่า 3 ตัว');
			$this->form_validation->set_message('max_length', '%s ต้องมีไม่เกิน 128 ตัว');


			$this->form_validation->set_message('is_natural_no_zero', 'กรุณาทำการตรวจสอบ %s ด้วย');

			if ($this->form_validation->run() == FALSE) {
				echo json_encode(validation_errors());
				exit;
			} else {

				$data['re_department'] = $this->input->post('way_department');
				$data['re_support'] = $this->input->post('support_way');
				$data['re_type'] = $this->input->post('type_way');
				$data['re_system'] = $this->input->post('system_way');
				$data['re_subject'] = $this->input->post('subject_way');
				$data['re_detail'] = $this->input->post('detail_way');

				$data['re_line'] = '';
				$data['priority_id'] = '';
				// line_way priority_way
				if (!empty($_FILES["file_way"]["name"])) {
					if ($_FILES['file_way']['size'] <= '4000000') {

						$check_type = $this->assist_backend->check_type($data['re_department'], $data['re_type']);
						if ($check_type !== null && $check_type !== '') {
							$this->form_validation->set_rules('priority_way', 'Priority', 'required');

							$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาตรวจสอบ');

							if ($this->form_validation->run() == FALSE) {
								echo json_encode(validation_errors());
								exit;
							} else {

								$re_priority = $this->input->post('priority_way');
								// --------------------------------------------priority_time-------------------------------------------------

								$myArray = explode(' ', $re_priority);
								$priority_id = $myArray[0];
								$priority_time =  $myArray[1];

								// --------------------------------------------end_priority_time---------------------------------------------

								// --------------------------------------------department_time-----------------------------------------------

								$time_dep = $this->assist_backend->time_department($data['re_department']);

								// --------------------------------------------end_department_time-------------------------------------------

								// --------------------------------------------specified_time------------------------------------------------

								$date = date("Y-m-d H:i:s");
								$data['priority_id'] = $priority_id;
								$data['date_create'] =  $date;
								$time_receive = date('Y-m-d H:i:s', strtotime($date . '' . $time_dep[0]['time_dep'] . ' min'));
								$specified_time = date('Y-m-d H:i:s', strtotime($time_receive . '' . $priority_time . ' min'));
								$data['time_receive'] =  $time_receive;
								$data['specified_time'] =  $specified_time;

								// --------------------------------------------end_specified_time--------------------------------------------	echo json_encode($data);	exit;

								$check_system = $this->assist_backend->check_system($this->session->userdata('sessDep'), $data['re_system']);
								if ($check_system !== null && $check_system !== '') {
									$this->form_validation->set_rules('line_way', 'Line', 'required');

									$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาตรวจสอบ');

									if ($this->form_validation->run() == FALSE) {
										echo json_encode(validation_errors());
										exit;
									} else {
										$data['re_line'] = $this->input->post('line_way');
									}
								}

								$tempFileLogo = $_FILES['file_way']['tmp_name'];
								$FileLogo = $_FILES['file_way']['name'];
								$sending_data_request_way = $this->assist_backend->sending_data_request_way($FileLogo, $tempFileLogo, $data);
								echo json_encode($sending_data_request_way);
								// echo json_encode($data);

								exit;
							}
						} else {
							$time_request = $this->assist_backend->time_request($data['re_department'], $data['re_type']);
							if ($time_request !== null && $time_request !== '') {

								// --------------------------------------------request_time--------------------------------------------------

								$time_request_dep =  $time_request[0]['set_timer_request_dep'];


								// $data['all_m_re'] =  $all_m_re;

								// --------------------------------------------end_request_time----------------------------------------------

								// --------------------------------------------department_time-----------------------------------------------

								$time_dep = $this->assist_backend->time_department($data['re_department']);

								// $data['all_m_dep'] =  $all_m_dep;
								// --------------------------------------------end_department_time-------------------------------------------

								// --------------------------------------------specified_time------------------------------------------------
								$date = date("Y-m-d H:i:s");
								$data['date_create'] =  $date;
								$time_receive = date('Y-m-d H:i:s', strtotime($date . '' . $time_dep[0]['time_dep'] . ' min'));
								$specified_time = date('Y-m-d H:i:s', strtotime($time_receive . '' . $time_request_dep . ' min'));
								$data['time_receive'] =  $time_receive;
								$data['specified_time'] =  $specified_time;

								// --------------------------------------------end_specified_time--------------------------------------------

								$check_system = $this->assist_backend->check_system($this->session->userdata('sessDep'), $data['re_system']);
								if ($check_system !== null && $check_system !== '') {
									$this->form_validation->set_rules('line_way', 'Line', 'required');

									$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาตรวจสอบ');

									if ($this->form_validation->run() == FALSE) {
										echo json_encode(validation_errors());
										exit;
									} else {
										$data['re_line'] = $this->input->post('line_way');
									}
								}
								$tempFileLogo = $_FILES['file_way']['tmp_name'];
								$FileLogo = $_FILES['file_way']['name'];
								$sending_data_request_way = $this->assist_backend->sending_data_request_way($FileLogo, $tempFileLogo, $data);
								echo json_encode($sending_data_request_way);
								exit;
							}
						}
					} else {
						echo json_encode('<p>image ของคุณขนาดเกิน 4000000 </p>');
						exit;
					}
				} else {
					$check_type = $this->assist_backend->check_type($data['re_department'], $data['re_type']);
					if ($check_type !== null && $check_type !== '') {
						$this->form_validation->set_rules('priority_way', 'Priority', 'required');

						$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาตรวจสอบ');

						if ($this->form_validation->run() == FALSE) {
							echo json_encode(validation_errors());
							exit;
						} else {
							$re_priority = $this->input->post('priority_way');
							// --------------------------------------------priority_time-------------------------------------------------

							$myArray = explode(' ', $re_priority);
							$priority_id = $myArray[0];
							$priority_time =  $myArray[1];

							// --------------------------------------------end_priority_time---------------------------------------------

							// --------------------------------------------department_time-----------------------------------------------

							$time_dep = $this->assist_backend->time_department($data['re_department']);

							// --------------------------------------------end_department_time-------------------------------------------

							// --------------------------------------------specified_time------------------------------------------------

							$date = date("Y-m-d H:i:s");
							$data['priority_id'] = $priority_id;
							$data['date_create'] =  $date;
							$time_receive = date('Y-m-d H:i:s', strtotime($date . '' . $time_dep[0]['time_dep'] . ' min'));
							$specified_time = date('Y-m-d H:i:s', strtotime($time_receive . '' . $priority_time . ' min'));
							$data['time_receive'] =  $time_receive;
							$data['specified_time'] =  $specified_time;

							// --------------------------------------------end_specified_time--------------------------------------------

							$check_system = $this->assist_backend->check_system($this->session->userdata('sessDep'), $data['re_system']);
							if ($check_system !== null && $check_system !== '') {
								$this->form_validation->set_rules('line_way', 'Line', 'required');

								$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาตรวจสอบ');

								if ($this->form_validation->run() == FALSE) {
									echo json_encode(validation_errors());
									exit;
								} else {
									$data['re_line'] = $this->input->post('line_way');
								}
							}
							$sending_quest_way_no =  $this->assist_backend->sending_quest_way_no($data);
							echo json_encode($sending_quest_way_no);
							exit;
						}
					} else {
						$time_request = $this->assist_backend->time_request($data['re_department'], $data['re_type']);
						if ($time_request !== null && $time_request !== '') {

							// --------------------------------------------request_time--------------------------------------------------

							$time_request_dep =  $time_request[0]['set_timer_request_dep'];


							// $data['all_m_re'] =  $all_m_re;

							// --------------------------------------------end_request_time----------------------------------------------

							// --------------------------------------------department_time-----------------------------------------------

							$time_dep = $this->assist_backend->time_department($data['re_department']);

							// $data['all_m_dep'] =  $all_m_dep;
							// --------------------------------------------end_department_time-------------------------------------------

							// --------------------------------------------specified_time------------------------------------------------
							$date = date("Y-m-d H:i:s");
							$data['date_create'] =  $date;
							$time_receive = date('Y-m-d H:i:s', strtotime($date . '' . $time_dep[0]['time_dep'] . ' min'));
							$specified_time = date('Y-m-d H:i:s', strtotime($time_receive . '' . $time_request_dep . ' min'));
							$data['time_receive'] =  $time_receive;
							$data['specified_time'] =  $specified_time;

							// --------------------------------------------end_specified_time--------------------------------------------

							$check_system = $this->assist_backend->check_system($this->session->userdata('sessDep'), $data['re_system']);
							if ($check_system !== null && $check_system !== '') {
								$this->form_validation->set_rules('line_way', 'Line', 'required');

								$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาตรวจสอบ');

								if ($this->form_validation->run() == FALSE) {
									echo json_encode(validation_errors());
									exit;
								} else {
									$data['re_line'] = $this->input->post('line_way');
								}
							}
							$sending_quest_way_no =  $this->assist_backend->sending_quest_way_no($data);
							echo json_encode($sending_quest_way_no);
							exit;
						}
					}
				}
			}
		}
	}
	public function get_data_quest()
	{
		$qu_id = $_POST["qu_id"];
		$data_quest = $this->assist_backend->data_quest($qu_id);
		echo json_encode($data_quest);
		exit;
	}
	public function data_quest_user()
	{
		$qu_id = $_POST["qu_id"];
		$data_quest = $this->assist_backend->data_quest($qu_id);
		echo json_encode($data_quest);
		exit;
	}
	public function timer_quest()
	{
		$qu_id = $_POST["qu_id"];
		$timer_quest = $this->assist_backend->timer_quest($qu_id);
		echo json_encode($timer_quest);
		exit;
	}
	public function accept_quest()
	{
		$this->form_validation->set_rules('support_by_quest', 'Support By', 'trim|required');
		$this->form_validation->set_rules('category_quest', 'Category', 'trim|required');


		$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณากรอกข้อมูล  ');
		$this->form_validation->set_message('min_length', '%s ต้องมีมากว่า 3 ตัว');
		$this->form_validation->set_message('max_length', '%s ต้องมีไม่เกิน 128 ตัว');

		if ($this->form_validation->run() == FALSE) {
			echo json_encode(validation_errors());
			exit;
		} else {
			$checkSess = $this->assist_backend->CheckSession();


			$data['sup_by'] = $this->input->post('support_by_quest');
			$data['cat_id'] = $this->input->post('category_quest');
			$data['date_up'] = $this->input->post('update_s');
			$data['qu_id'] = $this->input->post('qu_id_quest');
			$date_hide = $this->input->post('update_suc_hide');

			if ($data['date_up'] !== $date_hide) {
				if ($data['date_up'] > $date_hide) {
					$this->form_validation->set_rules('update_s', 'Update Time', 'trim|required');
					$this->form_validation->set_rules('up_time_quest', 'Detail Update', 'trim|required|min_length[3]|max_length[128]');

					$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณากรอกข้อมูล  ');
					$this->form_validation->set_message('min_length', '%s ต้องมีมากว่า 3 ตัว');
					$this->form_validation->set_message('max_length', '%s ต้องมีไม่เกิน 128 ตัว');

					if ($this->form_validation->run() == FALSE) {
						echo json_encode(validation_errors());
						exit;
					} else {
						$data['datail_up'] = $this->input->post('up_time_quest');
						$result = $this->assist_backend->reply_accept_up($data);
						echo json_encode($result);
						exit;
					}
				}
			}
			$result = $this->assist_backend->reply_accept($data);
			echo json_encode($result);
			exit;
		}
	}
	public function finish_quest()
	{
		$this->form_validation->set_rules('detail_support', 'Detail Support', 'trim|required');


		$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณากรอกข้อมูล  ');
		$this->form_validation->set_message('min_length', '%s ต้องมีมากว่า 3 ตัว');
		$this->form_validation->set_message('max_length', '%s ต้องมีไม่เกิน 128 ตัว');

		if ($this->form_validation->run() == FALSE) {
			echo json_encode(validation_errors());
			exit;
		} else {
			$checkSess = $this->assist_backend->CheckSession();

			$data['detail_sup'] = $this->input->post('detail_support');
			$data['qu_id'] = $this->input->post('qu_id_quest');


			$result = $this->assist_backend->reply_finish($data);
			echo json_encode($result);
			exit;
		}
	}
}
