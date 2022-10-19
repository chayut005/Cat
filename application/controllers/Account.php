<?php defined('BASEPATH') or exit('No direct script access allowed');

class Account extends CI_Controller
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
	public function add_user()
	{
		$action = base64_decode($this->input->post('action'));


		if ($action == 'add_user') {



			$this->form_validation->set_error_delimiters('<p>', '</p>');

			$this->form_validation->set_rules('a_username', 'Username', 'trim|required|min_length[3]|max_length[128]|is_unique[list_user.employee]');
			$this->form_validation->set_rules('a_pass', 'Password', 'trim|required|min_length[3]|max_length[128]');
			$this->form_validation->set_rules('a_f_name', 'First name', 'trim|required|min_length[3]|max_length[128]');
			$this->form_validation->set_rules('a_l_name', 'Last name', 'trim|required|min_length[3]|max_length[128]');
			$this->form_validation->set_rules('a_dep', 'Department', 'trim|required');
			$this->form_validation->set_rules('a_group', 'Group', 'trim|required');
			$this->form_validation->set_rules('a_email', 'Email', 'trim|valid_email');




			$this->form_validation->set_message('valid_email', 'รูปแบบ %s ไม่ถูกต้อง  ');
			$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาตรวจสอบ  ');
			$this->form_validation->set_message('min_length', '%s ต้องมีมากว่า 3 ตัว');
			$this->form_validation->set_message('max_length', '%s ต้องมีไม่เกิน 128 ตัว');
			$this->form_validation->set_message('is_unique', '%s มีชื่อนี้อยู่แล้ว');


			$this->form_validation->set_message('is_natural_no_zero', 'กรุณาทำการตรวจสอบ %s ด้วย');

			if ($this->form_validation->run() == FALSE) {
				echo json_encode(validation_errors());
			} else {


				if (!empty($_FILES["img_add_user"]["name"])) {
					if ($_FILES['img_add_user']['size'] <= '4000000') {
						$data['a_username'] = $this->input->post('a_username');
						$data['a_pass'] = base64_encode($this->input->post('a_pass'));
						$data['a_f_name'] = $this->input->post('a_f_name');
						$data['a_l_name'] = $this->input->post('a_l_name');
						$data['a_dep'] = $this->input->post('a_dep');
						$data['a_group'] = $this->input->post('a_group');
						$data['a_email'] = $this->input->post('a_email');
						$data['a_line'] = $this->input->post('a_line');
						$this->assist_backend->checksession();
						$tempFileLogo = $_FILES['img_add_user']['tmp_name'];
						$FileLogo = $_FILES['img_add_user']['name'];
						$sending_data_user_img = $this->assist_backend->sending_data_user_img($FileLogo, $tempFileLogo, $data);
						echo json_encode($sending_data_user_img);
						exit;
					} else {
						echo json_encode('<p>image ของคุณขนาดเกิน 4000000 </p>');
						exit;
					}
				} else {
					$data['a_username'] = $this->input->post('a_username');
					$data['a_pass'] = base64_encode($this->input->post('a_pass'));
					$data['a_f_name'] = $this->input->post('a_f_name');
					$data['a_l_name'] = $this->input->post('a_l_name');
					$data['a_dep'] = $this->input->post('a_dep');
					$data['a_group'] = $this->input->post('a_group');
					$data['a_email'] = $this->input->post('a_email');
					$data['a_line'] = $this->input->post('a_line');
					$this->assist_backend->checksession();
					$sending_data_no_img_db = $this->assist_backend->sending_data_no_img_db($data);
					echo json_encode($sending_data_no_img_db);
					exit;
				}
			}
		}
	}
	public function edit_user()
	{
		$action = base64_decode($this->input->post('action'));


		if ($action == 'edit_user') {



			$this->form_validation->set_error_delimiters('<p>', '</p>');
			$this->form_validation->set_rules('E_username', 'Username', 'trim|required|min_length[3]|max_length[128]');
			$this->form_validation->set_rules('E_fname', 'First name', 'trim|required|min_length[3]|max_length[128]');
			$this->form_validation->set_rules('E_lname', 'Last name', 'trim|required|min_length[3]|max_length[128]');
			$this->form_validation->set_rules('E_password', 'Password', 'trim|min_length[3]|max_length[128]');
			$this->form_validation->set_rules('E_line_id', 'ID Line', 'trim|min_length[3]|max_length[128]');
			$this->form_validation->set_rules('E_email', 'Email', 'trim|valid_email');
			$this->form_validation->set_rules('E_group', 'Group', 'trim|required');
			$this->form_validation->set_rules('E_department', 'Department', 'trim|required');


			$this->form_validation->set_message('valid_email', 'รูปแบบ %s ไม่ถูกต้อง  ');
			$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาตรวจสอบ  ');
			$this->form_validation->set_message('min_length', '%s ต้องมีมากว่า 3 ตัว');
			$this->form_validation->set_message('max_length', '%s ต้องมีไม่เกิน 128 ตัว');
			$this->form_validation->set_message('is_unique', '%s มีชื่อนี้อยู่แล้ว');


			$this->form_validation->set_message('is_natural_no_zero', 'กรุณาทำการตรวจสอบ %s ด้วย');

			if ($this->form_validation->run() == FALSE) {
				echo json_encode(validation_errors());
				exit;
			} else {
				$data['E_password'] = $this->input->post('E_password');
				if (!empty($_FILES["img_edit_user"]["name"])) {
					if ($_FILES['img_edit_user']['size'] <= '4000000') {
						$data['E_username'] = $this->input->post('E_username');
						$data['E_user_id'] = $this->input->post('E_user_id');
						$data['E_fname'] = $this->input->post('E_fname');
						$data['E_lname'] = $this->input->post('E_lname');
						$data['E_line_id'] = $this->input->post('E_line_id');
						$data['E_email'] = $this->input->post('E_email');
						$data['E_group'] = $this->input->post('E_group');
						$data['E_department'] = $this->input->post('E_department');
						$this->assist_backend->checksession();
						$tempFileLogo = $_FILES['img_edit_user']['tmp_name'];
						$FileLogo = $_FILES['img_edit_user']['name'];
						$update_data_user_img = $this->assist_backend->update_data_user_img($FileLogo, $tempFileLogo, $data);
						echo json_encode($update_data_user_img);
						exit;
					} else {
						echo json_encode('<p>image ของคุณขนาดเกิน 4000000 </p>');
					}
				} else {
					$this->assist_backend->checksession();
					$data['E_username'] = $this->input->post('E_username');
					$data['E_user_id'] = $this->input->post('E_user_id');
					$data['E_fname'] = $this->input->post('E_fname');
					$data['E_lname'] = $this->input->post('E_lname');
					$data['E_line_id'] = $this->input->post('E_line_id');
					$data['E_email'] = $this->input->post('E_email');
					$data['E_group'] = $this->input->post('E_group');
					$data['E_department'] = $this->input->post('E_department');
					$sending_data_edit_user = $this->assist_backend->sending_data_edit_user($data);
					echo json_encode($sending_data_edit_user);
					exit;
				}
			}
		}
	}
	public function edit_per_user()
	{
		$action = base64_decode($this->input->post('action'));
		if ($action == 'per_user') {
			$data['user_id'] = $this->input->post('list_user_id_username');
			$data['g_id'] = $this->input->post('user_group_id');
			$data['rule'] = $this->input->post('chkRid');
			$this->assist_backend->checksession();
			$RuleUser = $this->assist_backend->RuleUser($data);
			echo json_encode($RuleUser);
		}
	}
	public function Profile()
	{
		$checkSess = $this->assist_backend->CheckSession();
		$setTitle = strtoupper(str_replace('_', ' ', $this->router->fetch_method()));
		$this->template->write('page_title', ' CAT | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'all/' . $this->theme . '/view_menu.php');
		$this->template->write_view('page_header', 'all/' . $this->theme . '/view_header.php');
		$this->template->write_view('page_content', 'all/' . $this->theme . '/view_edit_profile.php');
		$this->template->write_view('page_footer', 'all/' . $this->theme . '/view_footer.php');
		$this->template->render();
	}
	public function update_profile()
	{
		$action = base64_decode($this->input->post('action'));


		if ($action == 'update_profile') {



			$this->form_validation->set_error_delimiters('<p>', '</p>');
			$this->form_validation->set_rules('firstName', 'First name', 'trim|required|min_length[3]|max_length[128]');
			$this->form_validation->set_rules('lastName', 'Last name', 'trim|required|min_length[3]|max_length[128]');
			$this->form_validation->set_rules('email', 'Email', 'trim|min_length[3]|max_length[128]ฅvalid_email');
			$this->form_validation->set_rules('id_line', 'ID Line', 'trim|min_length[3]|max_length[128]');


			$this->form_validation->set_message('valid_email', 'รูปแบบ %s ไม่ถูกต้อง  ');
			$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาตรวจสอบ  ');
			$this->form_validation->set_message('min_length', '%s ต้องมีมากว่า 3 ตัว');
			$this->form_validation->set_message('max_length', '%s ต้องมีไม่เกิน 128 ตัว');
			$this->form_validation->set_message('is_unique', '%s มีชื่อนี้อยู่แล้ว');


			$this->form_validation->set_message('is_natural_no_zero', 'กรุณาทำการตรวจสอบ %s ด้วย');

			if ($this->form_validation->run() == FALSE) {
				echo json_encode(validation_errors());
				exit;
			} else {
				$data['old_pass'] =  base64_encode($this->input->post('old_pass'));
				$data['new_pass'] =  base64_encode($this->input->post('new_pass'));
				$data['con_pass'] =  base64_encode($this->input->post('con_pass'));

				if (!empty($_FILES["upload_imgprofile"]["name"])) {
					if ($_FILES['upload_imgprofile']['size'] <= '4000000') {
						if ($data['old_pass'] !== '' || $data['new_pass'] !== '' || $data['con_pass'] !== '') {

							$this->form_validation->set_error_delimiters('<p>', '</p>');
							$this->form_validation->set_rules('old_pass', 'Old Password', 'trim|required|min_length[3]|max_length[16]');
							$this->form_validation->set_rules('new_pass', 'New Password', 'trim|required|min_length[3]|max_length[16]');
							$this->form_validation->set_rules('con_pass', 'Confirm Password', 'trim|required|min_length[4]|max_length[16]|matches[new_pass]');


							$this->form_validation->set_message('alpha_numeric', '%s ห้ามใช้ตัวอักษรอักขระพิเศษ');
							$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาตรวจสอบ  ');
							$this->form_validation->set_message('min_length', '%s ต้องมีมากว่า 3 ตัว');
							$this->form_validation->set_message('max_length', '%s ต้องมีไม่เกิน 128 ตัว');
							$this->form_validation->set_message('matches', 'New Password กับ Confirm Password ไม่ตรงกัน');


							// 	$this->form_validation->set_message('is_natural_no_zero', 'กรุณาทำการตรวจสอบ %s ด้วย');

							if ($this->form_validation->run() == FALSE) {
								echo json_encode(validation_errors());
								exit;
							} else {
								$data['E_username'] = $this->input->post('profile_user_acc');
								$data['user_id'] = $this->input->post('profile_id_user');
								$data['f_name'] = $this->input->post('firstName');
								$data['l_name'] = $this->input->post('lastName');
								$data['email'] = $this->input->post('email');
								$data['id_line'] = $this->input->post('id_line');
								$this->assist_backend->checksession();
								$tempFileLogo = $_FILES['upload_imgprofile']['tmp_name'];
								$FileLogo = $_FILES['upload_imgprofile']['name'];
								$update_profile_user_passupdate_profile_user_pass = $this->assist_backend->update_profile_user_passupdate_profile_user_pass($FileLogo, $tempFileLogo, $data);
								echo json_encode($update_profile_user_passupdate_profile_user_pass);
								exit;
								// echo json_encode($data);
							}
							// } else if ($data['old_pass'] == '' && $data['new_pass'] == '' && $data['con_pass'] == '') {
						} else if ($data['old_pass'] === '' || $data['new_pass'] === '' || $data['con_pass'] === '') {
							$data['E_username'] = $this->input->post('profile_user_acc');
							$data['user_id'] = $this->input->post('profile_id_user');
							$data['f_name'] = $this->input->post('firstName');
							$data['l_name'] = $this->input->post('lastName');
							$data['email'] = $this->input->post('email');
							$data['id_line'] = $this->input->post('id_line');
							$this->assist_backend->checksession();
							$tempFileLogo = $_FILES['upload_imgprofile']['tmp_name'];
							$FileLogo = $_FILES['upload_imgprofile']['name'];
							$update_profile_user_passupdate_profile_user_pass = $this->assist_backend->update_profile_user_passupdate_profile_user_pass($FileLogo, $tempFileLogo, $data);
							echo json_encode($update_profile_user_passupdate_profile_user_pass);
							exit;
						}
					} else {
						echo json_encode('<p>image ของคุณขนาดเกิน 4000000 </p>');
					}
				} else {
					if ($data['old_pass'] !== '' || $data['new_pass'] !== '' || $data['con_pass'] !== '') {
						$this->form_validation->set_error_delimiters('<p>', '</p>');
						$this->form_validation->set_rules('old_pass', 'Old Password', 'trim|required|min_length[3]|max_length[16]');
						$this->form_validation->set_rules('new_pass', 'New Password', 'trim|required|min_length[3]|max_length[16]');
						$this->form_validation->set_rules('con_pass', 'Confirm Password', 'trim|required|min_length[4]|max_length[16]|matches[new_pass]');


						$this->form_validation->set_message('alpha_numeric', '%s ห้ามใช้ตัวอักษรอักขระพิเศษ');
						$this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาตรวจสอบ  ');
						$this->form_validation->set_message('min_length', '%s ต้องมีมากว่า 3 ตัว');
						$this->form_validation->set_message('max_length', '%s ต้องมีไม่เกิน 128 ตัว');
						$this->form_validation->set_message('matches', 'New Password กับ Confirm Password ไม่ตรงกัน');

						if ($this->form_validation->run() == FALSE) {
							echo json_encode(validation_errors());
							exit;
						} else {
							$this->assist_backend->checksession();
							$data['E_username'] = $this->input->post('profile_user_acc');
							$data['user_id'] = $this->input->post('profile_id_user');
							$data['f_name'] = $this->input->post('firstName');
							$data['l_name'] = $this->input->post('lastName');
							$data['email'] = $this->input->post('email');
							$data['id_line'] = $this->input->post('id_line');
							$update_profile_user_pass = $this->assist_backend->update_profile_user_pass($data);
							echo json_encode($update_profile_user_pass);
							exit;
						}
					} else if ($data['old_pass'] === '' || $data['new_pass'] === '' || $data['con_pass'] === '') {
						$this->assist_backend->checksession();
						$data['E_username'] = $this->input->post('profile_user_acc');
						$data['user_id'] = $this->input->post('profile_id_user');
						$data['f_name'] = $this->input->post('firstName');
						$data['l_name'] = $this->input->post('lastName');
						$data['email'] = $this->input->post('email');
						$data['id_line'] = $this->input->post('id_line');
						$update_profile_user_no_pass = $this->assist_backend->update_profile_user_no_pass($data);
						echo json_encode($update_profile_user_no_pass);
						exit;
					}
				}
			}
		}
	}
}
