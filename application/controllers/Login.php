<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
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

		$this->img_path = $this->image_url;

		$this->template->write('js_url', $this->js_url);
		$this->template->write('css_url', $this->css_url);
		$this->template->write('asset_url', $this->asset_url);
		$this->template->write('image_url', $this->image_url);
	}
	public function index()
	{
		redirect('login/user');
	}
	public function user()
	{
		$setTitle = strtoupper($this->router->fetch_method() . ' ' . $this->router->fetch_class());

		$this->template->set_master_template('all/' . $this->theme . '/blank_login.php');
		$this->template->write('page_title', 'CAT | ' . $setTitle . '');
		$this->template->write_view('page_content', 'all/' . $this->theme . '/view_login.php');
		$this->template->render();
	}




	public function check_user()
	{
		$username = $_POST["username"];
		$check = $this->assist_backend->check_user($username);

		if ($check == 'account_no_data') {
			echo 'account_no_data';
			exit;
		} else if ($check == 'delete_account') {
			echo 'delete_account';
			exit;
		} else if ($check == 'ban_account') {
			echo 'ban_account';
			exit;
		} else if ($check == 'suc_account') {
			echo 'suc_account';
			exit;
		}
		// echo json_encode($check);
	}
	public function check_pass()
	{
		$username = strtoupper($_POST["username"]);
		$pass = $_POST["pass"];
		$action = base64_decode($_POST["action"]);

		if ($action == 'login') {
			$check = $this->assist_backend->check_pass($username, $pass);

			
			// echo json_encode($check);
			// exit;
			if ($check == 'error_pass') {
				echo 'error_pass';
				exit;
			} else if ($check['action'] == 'suc_pass') {
				$arrData = array('sessemail' => $check[0]['email'],'sessDep' => $check[0]['dep_id'],'sessGname' => $check[0]['g_name'],'sessFname' => $check[0]['f_name'], 'sessLname' => $check[0]['l_name'], 'sessUsr' => $check[0]['employee'], 'sessUsrId' => $check[0]['user_id'],'sess_order' =>$check[0]['order_g'], 'sessGroup' => $check[0]['g_id'], 'loggedIn' => "OK");
				$this->session->set_userdata($arrData);
				$this->assist_backend->checksession();
				echo 'suc_pass';
				exit;
			} else {
				$arrData = array('sessemail' => $check[0]['email'],'sessDep' => $check[0]['dep_id'],'sessGname' => $check[0]['g_name'],'sessFname' => $check[0]['f_name'], 'sessLname' => $check[0]['l_name'], 'sessUsr' => $check[0]['employee'], 'sessUsrId' => $check[0]['user_id'],'sess_order' =>$check[0]['order_g'], 'sessGroup' => $check[0]['g_id'], 'loggedIn' => "OK");
				$this->session->set_userdata($arrData);
				$this->assist_backend->checksession();
				echo 'suc_pass_menu';
			}
			// echo json_encode($check);
		}
	}
	public function manage()
	{
		redirect('Manage/Assist_way');
	}
	public function manage_menu()
	{
		redirect('Manage/Home');
	}
}
