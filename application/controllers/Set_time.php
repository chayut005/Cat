<?php defined('BASEPATH') or exit('No direct script access allowed');

class Set_time extends CI_Controller
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
	public function priority_time()
	{
		$checkSess = $this->assist_backend->CheckSession();
		$setTitle = strtoupper(str_replace('_', ' ', $this->router->fetch_method()));
		$this->template->write('page_title', ' CAT | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'all/' . $this->theme . '/view_menu.php');
		$this->template->write_view('page_header', 'all/' . $this->theme . '/view_header.php');
		$this->template->write_view('page_content', 'all/' . $this->theme . '/view_priority_time.php');
		$this->template->write_view('page_footer', 'all/' . $this->theme . '/view_footer.php');
		$this->template->render();
	}
	public function request_time()
	{
		$checkSess = $this->assist_backend->CheckSession();
		$setTitle = strtoupper(str_replace('_', ' ', $this->router->fetch_method()));
		$this->template->write('page_title', ' CAT | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'all/' . $this->theme . '/view_menu.php');
		$this->template->write_view('page_header', 'all/' . $this->theme . '/view_header.php');
		$this->template->write_view('page_content', 'all/' . $this->theme . '/view_request_time.php');
		$this->template->write_view('page_footer', 'all/' . $this->theme . '/view_footer.php');
		$this->template->render();
	}
	public function Set_type()
	{
		$checkSess = $this->assist_backend->CheckSession();
		$setTitle = strtoupper(str_replace('_', ' ', $this->router->fetch_method()));
		$this->template->write('page_title', ' CAT | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'all/' . $this->theme . '/view_menu.php');
		$this->template->write_view('page_header', 'all/' . $this->theme . '/view_header.php');
		$this->template->write_view('page_content', 'all/' . $this->theme . '/view_manage_type.php');
		$this->template->write_view('page_footer', 'all/' . $this->theme . '/view_footer.php');
		$this->template->render();
	}
	public function Set_category()
	{
		$checkSess = $this->assist_backend->CheckSession();
		$setTitle = strtoupper(str_replace('_', ' ', $this->router->fetch_method()));
		$this->template->write('page_title', ' CAT | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'all/' . $this->theme . '/view_menu.php');
		$this->template->write_view('page_header', 'all/' . $this->theme . '/view_header.php');
		$this->template->write_view('page_content', 'all/' . $this->theme . '/view_manage_category.php');
		$this->template->write_view('page_footer', 'all/' . $this->theme . '/view_footer.php');
		$this->template->render();
	}
	public function Set_system()
	{
		$checkSess = $this->assist_backend->CheckSession();
		$setTitle = strtoupper(str_replace('_', ' ', $this->router->fetch_method()));
		$this->template->write('page_title', ' CAT | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'all/' . $this->theme . '/view_menu.php');
		$this->template->write_view('page_header', 'all/' . $this->theme . '/view_header.php');
		$this->template->write_view('page_content', 'all/' . $this->theme . '/view_manage_system.php');
		$this->template->write_view('page_footer', 'all/' . $this->theme . '/view_footer.php');
		$this->template->render();
	}
	public function data_priority_d()
	{

		$dep = $this->session->userdata('sessDep');
		$this->assist_backend->checksession();
		$datatable = $this->assist_backend->get_data_priority_d($dep);

		$i = 0;
		foreach ($datatable as $data_time) {
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
			$datatable[$i]['date_e'] = $data_e;
			$datatable[$i]['h_e'] = $h_e;
			$datatable[$i]['m_e'] = $m_e;
			$i++;
		}

		$table = array("data" => $datatable);
		echo json_encode($table);
	}
	public function update_time_priority()
	{
		$action = base64_decode($this->input->post('action'));


		if ($action == 'update_priority_time') {


			$date = $this->input->post('u_pri_date');
			$h = $this->input->post('u_pri_time_h');
			$m = $this->input->post('u_pri_time_m');
			$data['pri_id'] = $this->input->post('pri_id_t');
			$data['dep_id'] = $this->input->post('dep_id_t');


			$d_to_h = $date * 24;
			$d_to_h_to_m = $d_to_h * 60;

			$h_to_min = $h * 60;
			$all_m_pri = $d_to_h_to_m + $h_to_min + $m;
			$data['time_priority'] =  $all_m_pri;

			$this->assist_backend->checksession();
			$update_time_pri = $this->assist_backend->update_time_priority($data);
			echo json_encode($update_time_pri);
		}
	}
	public function delete_priority_time()
	{
		$pri_id = $_POST['pri_id'];
		$dep_id = $_POST['dep_id'];

		$checkSess = $this->assist_backend->CheckSession();
		// $this->connect_db->CheckPermission($this->session->userdata('sessUsrId')); 
		$result = $this->assist_backend->delete_priority_time($pri_id, $dep_id);
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
	public function data_request_table()
	{

		$dep = $this->session->userdata('sessDep');
		$this->assist_backend->checksession();
		$datatable = $this->assist_backend->get_data_request_time_d($dep);

		$i = 0;
		foreach ($datatable as $data_time) {
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
			$datatable[$i]['date_e'] = $data_e;
			$datatable[$i]['h_e'] = $h_e;
			$datatable[$i]['m_e'] = $m_e;
			$i++;
		}

		$table = array("data" => $datatable);
		echo json_encode($table);
	}
	public function data_request_all()
	{

		$dep = $this->session->userdata('sessDep');
		$this->assist_backend->checksession();
		$datatable = $this->assist_backend->get_data_request_time_d($dep);

		$i = 0;
		foreach ($datatable as $data_time) {
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
			$datatable[$i]['date_e'] = $data_e;
			$datatable[$i]['h_e'] = $h_e;
			$datatable[$i]['m_e'] = $m_e;
			$i++;
		}

		// $table = array("data" => $datatable);
		echo json_encode($datatable);
	}
	public function update_request_time()
	{
		$action = base64_decode($this->input->post('action'));


		if ($action == 'update_request_time') {


			$date = $this->input->post('u_re_date');
			$h = $this->input->post('u_re_time_h');
			$m = $this->input->post('u_re_time_m');
			$data['dep_id'] = $this->input->post('dep_id');


			$d_to_h = $date * 24;
			$d_to_h_to_m = $d_to_h * 60;

			$h_to_min = $h * 60;
			$all_m_pri = $d_to_h_to_m + $h_to_min + $m;
			$data['time_request'] =  $all_m_pri;

			$this->assist_backend->checksession();
			$update_request_time = $this->assist_backend->update_request_time($data);
			echo json_encode($update_request_time);
		}
	}
	public function delete_request_time()
	{
		$dep_id = $_POST['dep_id'];

		$checkSess = $this->assist_backend->CheckSession();
		// $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));  save_request_time
		$result = $this->assist_backend->delete_request_time($dep_id);
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
	public function save_request_time()
	{
		$action = base64_decode($this->input->post('action'));


		if ($action == 'add_request_time') {

			$this->form_validation->set_error_delimiters('<p>', '</p>');


			$this->form_validation->set_rules('add_re_dep', 'Department', 'trim|is_natural_no_zero|required|is_unique[list_timer_request_department.dep_id]');

			$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาตรวจสอบ');
			$this->form_validation->set_message('is_natural_no_zero', 'กรุณาทำการตรวจสอบ %s ด้วย');
			$this->form_validation->set_message('is_unique', '%s มี Request แล้ว');

			if ($this->form_validation->run() == FALSE) {
				echo json_encode(validation_errors());
				exit;
			} else {

				$date = $this->input->post('add_re_date');
				$h = $this->input->post('add_re_time_h');
				$m = $this->input->post('add_re_time_m');
				$data['dep_id'] = $this->input->post('add_re_dep');



				$d_to_h = $date * 24;
				$d_to_h_to_m = $d_to_h * 60;

				$h_to_min = $h * 60;
				$all_m_pri = $d_to_h_to_m + $h_to_min + $m;
				$data['time_request'] =  $all_m_pri;

				$this->assist_backend->checksession();
				$save_request_time = $this->assist_backend->save_request_time($data);
				echo json_encode($save_request_time);
			}
		}
	}
	public function save_priority()
	{
		$pri_id = $_POST['pri_id'];
		$dep_id = $_POST['dep_id'];

		$this->assist_backend->checksession();
		$save_priority = $this->assist_backend->save_priority($pri_id, $dep_id);
		echo json_encode($save_priority);
	}
	public function create_priority()
	{
		$action = base64_decode($this->input->post('action'));


		if ($action == 'create_priority') {

			$this->form_validation->set_error_delimiters('<p>', '</p>');


			$this->form_validation->set_rules('pri_name_c', 'Priority Name', 'trim|required|is_unique[list_priority.pri_name]');
			$this->form_validation->set_rules('status_pri', 'Startus', 'trim|required');


			$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาตรวจสอบ');
			$this->form_validation->set_message('is_unique', '%s ชื่อนี้มีอยู่แล้ว');

			if ($this->form_validation->run() == FALSE) {
				echo json_encode(validation_errors());
				exit;
			} else {


				$data['pri_name'] = $this->input->post('pri_name_c');
				$data['status_pri'] = $this->input->post('status_pri');


				$this->assist_backend->checksession();
				$create_priority = $this->assist_backend->create_priority($data);
				echo json_encode($create_priority);
			}
		}
	}
	public function data_type()
	{
		// $pri_id = $_POST['pri_id']; disable_type
		// $dep_id = $_POST['dep_id'];
		$dep_id =  $this->session->userdata('sessDep');
		$this->assist_backend->checksession();
		$data_type = $this->assist_backend->data_type($dep_id);
		echo json_encode($data_type);
	}
	public function disable_type()
	{
		$type_id = $_POST['type_id'];
		$checkSess = $this->assist_backend->CheckSession();
		// $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));
		$result = $this->assist_backend->disable_type($type_id);
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
	public function enable_type()
	{
		$type_id = $_POST['type_id'];
		$checkSess = $this->assist_backend->CheckSession();
		// $this->connect_db->CheckPermission($this->session->userdata('sessUsrId')); delete_type
		$result = $this->assist_backend->enable_type($type_id);
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
	public function delete_type()
	{
		$type_id = $_POST['type_id'];
		$checkSess = $this->assist_backend->CheckSession();
		// $this->connect_db->CheckPermission($this->session->userdata('sessUsrId')); 
		$result = $this->assist_backend->delete_type($type_id);
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
	public function re_type()
	{
		$type_id = $_POST['type_id'];
		$checkSess = $this->assist_backend->CheckSession();
		// $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));
		$result = $this->assist_backend->re_type($type_id);
		if ($result == true) {
			$reply_re = "";
			$reply_re = array('reply' => $result, 'html' => 'Enable สำเร็จ', 'html_eng' => 'Enable Success');
			echo json_encode($reply_re);
			exit;
		} else if ($result == false) {
			$reply_re = "";
			$reply_re = array('reply' => $result, 'html' => 'ไม่สามารถ Enable ได้', 'html_eng' => 'Can"t Enable');
			echo json_encode($reply_re);
			exit;
		}
	}
	public function data_type_use_table()
	{
		// $pri_id = $_POST['pri_id']; disable_type
		// $dep_id = $_POST['dep_id'];
		$dep_id =  $this->session->userdata('sessDep');
		$this->assist_backend->checksession();
		$data_type = $this->assist_backend->data_type($dep_id);
		$table = array('data' => $data_type);
		echo json_encode($table);
	}
	public function delete_type_use()
	{
		$type_id = $_POST['type_id'];
		$dep_id = $_POST['dep_id'];

		$checkSess = $this->assist_backend->CheckSession();
		// $this->connect_db->CheckPermission($this->session->userdata('sessUsrId')); 
		$result = $this->assist_backend->delete_type_use($type_id, $dep_id);
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
	public function save_type()
	{
		$type_id = $_POST['type_id'];
		$dep_id = $_POST['dep_id'];

		$this->assist_backend->checksession();
		$save_type = $this->assist_backend->save_type($type_id, $dep_id);
		echo json_encode($save_type);
	}
	public function data_category()
	{
		// $pri_id = $_POST['pri_id']; disable_type
		// $dep_id = $_POST['dep_id'];
		$dep_id =  $this->session->userdata('sessDep');
		$this->assist_backend->checksession();
		$data_category = $this->assist_backend->data_category($dep_id);
		echo json_encode($data_category);
	}
	public function data_category_use_table()
	{
		// $pri_id = $_POST['pri_id']; data_system_use_table
		// $dep_id = $_POST['dep_id'];
		$dep_id =  $this->session->userdata('sessDep');
		$this->assist_backend->checksession();
		$data_category = $this->assist_backend->data_category($dep_id);
		$table = array('data' => $data_category);
		echo json_encode($table);
	}
	public function delete_cat_use()
	{
		$cat_id = $_POST['cat_id'];
		$dep_id = $_POST['dep_id'];

		$checkSess = $this->assist_backend->CheckSession();
		// $this->connect_db->CheckPermission($this->session->userdata('sessUsrId')); 
		$result = $this->assist_backend->delete_cat_use($cat_id, $dep_id);
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
	public function save_category()
	{
		$cat_id = $_POST['cat_id'];
		$dep_id = $_POST['dep_id'];

		$this->assist_backend->checksession();
		$save_category = $this->assist_backend->save_category($cat_id, $dep_id);
		echo json_encode($save_category);
	}
	public function disable_category()
	{
		$cat_id = $_POST['cat_id'];
		$checkSess = $this->assist_backend->CheckSession();
		// $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));
		$result = $this->assist_backend->disable_category($cat_id);
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
	public function enable_category()
	{
		$cat_id = $_POST['cat_id'];
		$checkSess = $this->assist_backend->CheckSession();
		// $this->connect_db->CheckPermission($this->session->userdata('sessUsrId')); delete_type
		$result = $this->assist_backend->enable_category($cat_id);
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
	public function data_system()
	{
		// $pri_id = $_POST['pri_id']; disable_type
		// $dep_id = $_POST['dep_id'];
		$dep_id =  $this->session->userdata('sessDep');
		$this->assist_backend->checksession();
		$data_system = $this->assist_backend->data_system($dep_id);
		echo json_encode($data_system);
	}
	public function data_system_use_table()
	{
		// $pri_id = $_POST['pri_id']; data_system_use_table
		// $dep_id = $_POST['dep_id'];
		$dep_id =  $this->session->userdata('sessDep');
		$this->assist_backend->checksession();
		$data_system = $this->assist_backend->data_system($dep_id);
		$table = array('data' => $data_system);
		echo json_encode($table);
	}
	public function delete_system_use()
	{
		$system_id = $_POST['system_id'];
		$dep_id = $_POST['dep_id'];

		$checkSess = $this->assist_backend->CheckSession();
		// $this->connect_db->CheckPermission($this->session->userdata('sessUsrId')); 
		$result = $this->assist_backend->delete_system_use($system_id, $dep_id);
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
	public function save_system()
	{
		$system_id = $_POST['system_id'];
		$dep_id = $_POST['dep_id'];

		$this->assist_backend->checksession();
		$save_system = $this->assist_backend->save_system($system_id, $dep_id);
		echo json_encode($save_system);
	}
	public function disable_system()
	{
		$system_id = $_POST['system_id'];
		$checkSess = $this->assist_backend->CheckSession();
		// $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));
		$result = $this->assist_backend->disable_system($system_id);
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
	public function enable_system()
	{
		$system_id = $_POST['system_id'];
		$checkSess = $this->assist_backend->CheckSession();
		// $this->connect_db->CheckPermission($this->session->userdata('sessUsrId')); delete_type
		$result = $this->assist_backend->enable_system($system_id);
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
	public function data_card_priority() 
	{

		$dep = $this->session->userdata('sessDep');
		$this->assist_backend->checksession();
		$datatable = $this->assist_backend->get_data_priority_d($dep);

		$i = 0;
		foreach ($datatable as $data_time) {
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
			$datatable[$i]['date_e'] = $data_e;
			$datatable[$i]['h_e'] = $h_e;
			$datatable[$i]['m_e'] = $m_e;
			$i++;
		}
		echo json_encode($datatable);
	}
}
