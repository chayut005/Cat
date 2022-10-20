<?php defined('BASEPATH') or exit('No direct script access allowed');

class GET_API extends CI_Controller
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





















	// public function department_data_re()
	// {
	// 	$dep_id = $_POST['dep_id'];
	// 	if ($dep_id != '') {
	// 		$department_data_re = $this->assist_backend->department_data_re($dep_id);
	// 		echo json_encode($department_data_re);
	// 		exit;
	// 	} else if ($dep_id == '') {
	// 		$department_data_re_all = $this->assist_backend->department_data_re_all();
	// 		echo json_encode($department_data_re_all);
	// 		exit;
	// 	}
	// }get_data_category get_data_system check_data_type  
	public function data_system_table()
	{
		$data_main_system = $this->assist_backend->data_main_system();
		$this->assist_backend->checksession();
		$dep_id = $this->session->userdata('sessDep');
		$data_system = $this->assist_backend->data_system($dep_id);
		$i = 0;
		foreach ($data_main_system as $ta) {
			$data_html = '';
			if ($ta['del_flag'] !== '1' && $ta['status_system'] !== '0') {
				$data_html = '<i  onclick="use_system(' . $ta['system_id'] . ',' . $dep_id . ')" class="bx bx-checkbox" ></i>';
			} else {
				$data_html = '<i style="cursor: no-drop;" class="bx bx-checkbox" ></i>';
			}

			foreach ($data_system as $ta_dep) {
				if ($ta['system_id'] == $ta_dep['system_id']) {
					$data_html = '<i class="bx bx-check"></i>';
				}
			}
			$data_main_system[$i]['check_show'] = $data_html;
			$i++;
		}
		$table = array("data" => $data_main_system);
		echo json_encode($table);
		exit;
	}
	public function data_main_system()
	{
		$data_main_system = $this->assist_backend->data_main_system();
		$this->assist_backend->checksession();
		$i = 0;
		foreach ($data_main_system as $ta) {

			$data_html = '';
			if ($ta['del_flag'] !== '1') {
				if ($ta['status_system'] === '1') {
					$data_html .= '<a onclick="edit_category_main(' . $ta['system_id'] . ')" style="cursor: pointer;padding-right: 0.8em;" ><i class="bx bx-edit" ></i></a>';
				}
				$data_html .= '<a onclick="button_delete_system(' . $ta['system_id'] . ')" style="cursor: pointer;"><i class="bx bx-trash"></i></a>';
			} else {
				$data_html = '<a onclick="button_re_system(' . $ta['system_id'] . ')"><i class="bx bx-redo bx-flip-horizontal" ></i></a>';
			}


			$data_main_system[$i]['button_show'] = $data_html;
			$i++;
		}
		$table = array('data' => $data_main_system);
		echo json_encode($table);
		exit;
	}
	public function data_category_table()
	{
		$data_main_category = $this->assist_backend->data_main_category();
		$this->assist_backend->checksession();
		$dep_id = $this->session->userdata('sessDep');
		$data_category = $this->assist_backend->data_category($dep_id);
		$i = 0;
		foreach ($data_main_category as $ta) {
			$data_html = '';
			if ($ta['del_flag'] !== '1' && $ta['status_cat'] !== '0') {
				$data_html = '<i  onclick="use_category(' . $ta['cat_id'] . ',' . $dep_id . ')" class="bx bx-checkbox" ></i>';
			} else {
				$data_html = '<i style="cursor: no-drop;" class="bx bx-checkbox" ></i>';
			}

			foreach ($data_category as $ta_dep) {
				if ($ta['cat_id'] == $ta_dep['cat_id']) {
					$data_html = '<i class="bx bx-check"></i>';
				}
			}
			$data_main_category[$i]['check_show'] = $data_html;
			$i++;
		}
		$table = array("data" => $data_main_category);
		echo json_encode($table);
		exit;
	}
	public function data_main_category()
	{
		$data_main_category = $this->assist_backend->data_main_category();
		$this->assist_backend->checksession();
		$i = 0;
		foreach ($data_main_category as $ta) {

			$data_html = '';
			if ($ta['del_flag'] !== '1') {
				if ($ta['status_cat'] === '1') {
					$data_html .= '<a onclick="edit_category_main(' . $ta['cat_id'] . ')" style="cursor: pointer;padding-right: 0.8em;" ><i class="bx bx-edit" ></i></a>';
				}
				$data_html .= '<a onclick="button_delete_cat(' . $ta['cat_id'] . ')" style="cursor: pointer;"><i class="bx bx-trash"></i></a>';
			} else {
				$data_html = '<a onclick="button_re_cat(' . $ta['cat_id'] . ')"><i class="bx bx-redo bx-flip-horizontal" ></i></a>';
			}


			$data_main_category[$i]['button_show'] = $data_html;
			$i++;
		}
		$table = array('data' => $data_main_category);
		echo json_encode($table);
		exit;
	}
	public function data_type_table()
	{
		$data_main_type = $this->assist_backend->data_main_type();
		$this->assist_backend->checksession();
		$dep_id = $this->session->userdata('sessDep');
		$data_type = $this->assist_backend->data_type($dep_id);
		$i = 0;
		foreach ($data_main_type as $ta) {
			$data_html = '';
			if ($ta['del_flag'] !== '1' && $ta['status_type'] !== '0') {
				$data_html = '<i  onclick="use_type(' . $ta['type_id'] . ',' . $dep_id . ')" class="bx bx-checkbox" ></i>';
			} else {
				$data_html = '<i style="cursor: no-drop;" class="bx bx-checkbox" ></i>';
			}

			foreach ($data_type as $ta_dep) {
				if ($ta['type_id'] == $ta_dep['type_id']) {
					$data_html = '<i class="bx bx-check"></i>';
				}
			}
			$data_main_type[$i]['check_show'] = $data_html;
			$i++;
		}
		$table = array("data" => $data_main_type);
		echo json_encode($table);
		exit;
	}
	public function data_main_type()
	{
		$data_main_type = $this->assist_backend->data_main_type();
		$this->assist_backend->checksession();
		$i = 0;
		foreach ($data_main_type as $ta) {

			$data_html = '';
			if ($ta['del_flag'] !== '1') {
				if ($ta['status_type'] === '1') {
					$data_html .= '<a onclick="edit_type_main(' . $ta['type_id'] . ')" style="cursor: pointer;padding-right: 0.8em;" ><i class="bx bx-edit" ></i></a>';
				}
				$data_html .= '<a onclick="button_delete_type(' . $ta['type_id'] . ')" style="cursor: pointer;"><i class="bx bx-trash"></i></a>';
			} else {
				$data_html = '<a onclick="button_re_type(' . $ta['type_id'] . ')"><i class="bx bx-redo bx-flip-horizontal" ></i></a>';
			}


			$data_main_type[$i]['button_show'] = $data_html;
			$i++;
		}
		$table = array('data' => $data_main_type);
		echo json_encode($table);
		exit;
	}

	public function check_data_system()
	{
		$dep_issue_id = $_POST['dep_issue_id'];
		$system_id = $_POST['system_id'];
		$check_system = $this->assist_backend->check_system($dep_issue_id, $system_id);
		echo json_encode($check_system);
		exit;
	}
	public function check_data_type()
	{
		$dep_sup_id = $_POST['dep_sup_id'];
		$type_id = $_POST['type_id'];
		$check_type = $this->assist_backend->check_type($dep_sup_id, $type_id);
		echo json_encode($check_type);
		exit;
	}
	public function get_data_system()
	{
		$dep_id = $_POST['dep_id'];
		$get_data_system = $this->assist_backend->get_data_system($dep_id);
		echo json_encode($get_data_system);
		exit;
	}
	public function get_data_category()
	{
		$dep_id = $_POST['dep_id'];
		$get_data_category = $this->assist_backend->get_data_category($dep_id);
		echo json_encode($get_data_category);
		exit;
	}
	public function get_data_type()
	{
		$dep_id = $_POST['dep_id'];
		$get_data_type = $this->assist_backend->get_data_type($dep_id);
		echo json_encode($get_data_type);
		exit;
	}
	public function get_support_by()
	{
		$dep_id = $_POST['dep_id'];

		$get_issue_by_all = $this->assist_backend->get_support_by_all($dep_id);
		echo json_encode($get_issue_by_all);
		exit;
	}
	public function get_issue_by()
	{
		$dep_id = $_POST['dep_id'];

		$get_issue_by_all = $this->assist_backend->get_issue_by_all($dep_id);
		echo json_encode($get_issue_by_all);
		exit;
	}
	public function group_data()
	{
		$get_group = $this->assist_backend->get_group();
		echo json_encode($get_group);
		exit;
	}
	public function department_data()
	{
		$department_data = $this->assist_backend->department_data();
		echo json_encode($department_data);
		exit;
	}
	public function get_department()
	{
		$user_id = $this->session->userdata('sessUsrId');
		$per_u = 'permission_search';
		$CheckPermissions = $this->assist_backend->CheckPermissions($user_id, $per_u);
		if ($CheckPermissions == true) {
			$get_department = $this->assist_backend->get_department();
			echo json_encode($get_department);
			exit;
		} else if ($CheckPermissions == false) {
			echo json_encode(false);
			exit;
		}
	}
	public function data_time_priority()
	{
		$dep_id = $_POST['dep_id'];
		$pri_id = $_POST['pri_id'];

		$data_time_priority = $this->assist_backend->data_time_priority($pri_id, $dep_id);

		$i = 0;
		foreach ($data_time_priority as $data_time) {
			$data_e = '';
			$h_e = '';
			$m_e = '';

			$all_to_m = $data_time['time_priority'] / 60;
			$myArray_dep = explode('.', $all_to_m);
			$h_e = $myArray_dep[0];
			$m_e = $data_time['time_priority'] - ($h_e * 60);

			if ($h_e < '24') {
				$data_e = '0';
			} else {
				$aa = $h_e / 24;
				$myArray_d = explode('.', $aa);
				$data_e =  $myArray_d[0];
				$h_e =  $myArray_dep[0] - ($data_e * 24);
			}
			$data_time_priority[$i]['date_e'] = $data_e;
			$data_time_priority[$i]['h_e'] = $h_e;
			$data_time_priority[$i]['m_e'] = $m_e;
			$i++;
		}

		echo json_encode($data_time_priority);
		exit;
	}
	public function data_priority()
	{
		$data_priority = $this->assist_backend->data_priority();
		echo json_encode($data_priority);
		exit;
	}
	public function data_priority_table()
	{
		$data_priority = $this->assist_backend->data_priority();
		$dep = $this->session->userdata('sessDep');
		$this->assist_backend->checksession();
		$datatable = $this->assist_backend->get_data_priority_d($dep);
		$i = 0;
		foreach ($data_priority as $ta) {
			$data_html = '';
			if ($ta['del_flag'] !== '1' && $ta['status_pri'] !== '0') {
				$data_html = '<i  onclick="use_priority(' . $ta['pri_id'] . ',' . $dep . ')" class="bx bx-checkbox" ></i>';
			} else {
				$data_html = '<i style="cursor: no-drop;" class="bx bx-checkbox" ></i>';
			}

			foreach ($datatable as $ta_dep) {
				if ($ta['pri_id'] == $ta_dep['pri_id']) {
					$data_html = '<i class="bx bx-check"></i>';
				}
			}
			$data_priority[$i]['check_show'] = $data_html;
			$i++;
		}
		$table = array("data" => $data_priority);
		echo json_encode($table);
		exit;
	}
	public function data__manage_priority()
	{
		$data_priority = $this->assist_backend->data_priority();
		$this->assist_backend->checksession();
		$i = 0;
		foreach ($data_priority as $ta) {

			$data_html = '';
			if ($ta['del_flag'] !== '1') {
				if ($ta['status_pri'] === '1') {
					$data_html .= '<a onclick="edit_priority(' . $ta['pri_id'] . ')" style="cursor: pointer;padding-right: 0.8em;" ><i class="bx bx-edit" ></i></a>';
					// } else{ disable_pri re_priority 
				}
				$data_html .= '<a onclick="button_delete_pri(' . $ta['pri_id'] . ')" style="cursor: pointer;"><i class="bx bx-trash"></i></a>';
			} else {
				$data_html = '<a onclick="button_re_pri(' . $ta['pri_id'] . ')"><i class="bx bx-redo bx-flip-horizontal" ></i></a>';
			}


			$data_priority[$i]['button_show'] = $data_html;
			$i++;
		}

		$table = array("data" => $data_priority);
		echo json_encode($table);
		exit;
	}
	public function disable_pri()
	{
		$pri_id = $_POST['pri_id'];
		$checkSess = $this->assist_backend->CheckSession();
		// $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));
		$result = $this->assist_backend->disable_priority($pri_id);
		if ($result == true) {
			$reply_disable = "";
			$reply_disable = array('reply' => $result, 'html' => 'Disable สำเร็จ', 'html_eng' => 'Disable Success');
			echo json_encode($reply_disable);
			exit;
		} else if ($result == false) {
			$reply_disable = "";
			$reply_disable = array('reply' => $result, 'html' => 'ไม่สามารถ Disable ได้', 'html_eng' => 'Can"t Disable');
			echo json_encode($reply_disable);
			exit;
		}
	}
	public function enable_pri()
	{
		$pri_id = $_POST['pri_id'];
		$checkSess = $this->assist_backend->CheckSession();
		// $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));
		$result = $this->assist_backend->enable_priority($pri_id);
		if ($result == true) {
			$reply_enable = "";
			$reply_enable = array('reply' => $result, 'html' => 'Enable สำเร็จ', 'html_eng' => 'Enable Success');
			echo json_encode($reply_enable);
			exit;
		} else if ($result == false) {
			$reply_enable = "";
			$reply_enable = array('reply' => $result, 'html' => 'ไม่สามารถ Enable ได้', 'html_eng' => 'Can"t Enable');
			echo json_encode($reply_enable);
			exit;
		}
	}
	public function delete_pri()
	{
		$pri_id = $_POST['pri_id'];
		$checkSess = $this->assist_backend->CheckSession();
		// $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));
		$result = $this->assist_backend->delete_priority($pri_id);
		if ($result == true) {
			$reply_delete = "";
			$reply_delete = array('reply' => $result, 'html' => 'Delete สำเร็จ', 'html_eng' => 'Delete Success');
			echo json_encode($reply_delete);
			exit;
		} else if ($result == false) {
			$reply_delete = "";
			$reply_delete = array('reply' => $result, 'html' => 'ไม่สามารถ Delete ได้', 'html_eng' => 'Can"t Delete');
			echo json_encode($reply_delete);
			exit;
		}
	}
	public function re_pri()
	{
		$pri_id = $_POST['pri_id'];
		$checkSess = $this->assist_backend->CheckSession();
		// $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));
		$result = $this->assist_backend->re_priority($pri_id);
		if ($result == true) {
			$reply_re = "";
			$reply_re = array('reply' => $result, 'html' => 'Re สำเร็จ', 'html_eng' => 'Re Success');
			echo json_encode($reply_re);
			exit;
		} else if ($result == false) {
			$reply_re = "";
			$reply_re = array('reply' => $result, 'html' => 'ไม่สามารถ Re ได้', 'html_eng' => 'Can"t Re');
			echo json_encode($reply_re);
			exit;
		}
	}
	public function data_update_priority()
	{
		$pri_id = $_POST['pri_id'];
		$this->assist_backend->checksession();
		$data_priority = $this->assist_backend->data_update_priority($pri_id);
		echo json_encode($data_priority);
		exit;
	}
	public function update_priority()
	{
		$action = base64_decode($this->input->post('action'));


		if ($action == 'update_priority') {
			$this->form_validation->set_error_delimiters('<p>', '</p>');

			$this->form_validation->set_rules('pri_name_m', 'Priority Name', 'trim|required|min_length[3]|max_length[128]');
			$this->form_validation->set_rules('pri_id_m', 'Error ID', 'trim|is_natural_no_zero|required');

			$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาตรวจสอบ');
			$this->form_validation->set_message('min_length', '%s ต้องมีมากว่า 3 ตัว');
			$this->form_validation->set_message('max_length', '%s ต้องมีไม่เกิน 128 ตัว');


			$this->form_validation->set_message('is_natural_no_zero', 'กรุณาทำการตรวจสอบ %s ด้วย');

			if ($this->form_validation->run() == FALSE) {
				echo json_encode(validation_errors());
				exit;
			} else {

				$data['pri_name'] = $this->input->post('pri_name_m');
				$data['pri_id'] = $this->input->post('pri_id_m');
				$update_priority = $this->assist_backend->update_priority($data);

				echo json_encode($update_priority);
			}
		}
	}
	public function data_time_request()
	{
		$dep_id = $_POST['dep_id'];

		$data_time_request = $this->assist_backend->data_time_request($dep_id);

		$i = 0;
		foreach ($data_time_request as $data_time) {
			$data_e = '';
			$h_e = '';
			$m_e = '';

			$all_to_m = $data_time['set_timer_request_dep'] / 60;
			$myArray_dep = explode('.', $all_to_m);
			$h_e = $myArray_dep[0];
			$m_e = $data_time['set_timer_request_dep'] - ($h_e * 60);

			if ($h_e < '24') {
				$data_e = '0';
			} else {
				$aa = $h_e / 24;
				$myArray_d = explode('.', $aa);
				$data_e =  $myArray_d[0];
				$h_e =  $myArray_dep[0] - ($data_e * 24);
			}
			$data_time_request[$i]['date_e'] = $data_e;
			$data_time_request[$i]['h_e'] = $h_e;
			$data_time_request[$i]['m_e'] = $m_e;
			$i++;
		}

		echo json_encode($data_time_request);
		exit;
	}





	public function category_report()
	{
		$st = $_POST['st'];
		$lt = $_POST['lt'];
		$dep = $_POST['dep'];
		$get_report_cat = $this->assist_backend->get_report_cat($dep, $st, $lt);


		echo json_encode($get_report_cat);
		exit;
	}
}
