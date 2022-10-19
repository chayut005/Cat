<?php defined('BASEPATH') or exit('No direct script access allowed');

class Manage extends CI_Controller
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
	// public function index(){

	// 	redirect('manage/Assist');
	// }	
	public function Home()
	{
		$checkSess = $this->assist_backend->CheckSession();
		$setTitle = strtoupper(str_replace('_', ' ', $this->router->fetch_method()));
		$this->template->write('page_title', ' CAT | ' . $setTitle . '');
		$this->template->write_view('page_menu', 'all/' . $this->theme . '/view_menu.php');
		$this->template->write_view('page_header', 'all/' . $this->theme . '/view_header.php');
		$this->template->write_view('page_content', 'all/' . $this->theme . '/view_home.php');
		$this->template->write_view('page_footer', 'all/' . $this->theme . '/view_footer.php');
		$this->template->render();
	}
	public function Assist_way()
	{
		$checkSess = $this->assist_backend->CheckSession();
		$setTitle = strtoupper(str_replace('_', ' ', $this->router->fetch_method()));
		$this->template->set_master_template('all/' . $this->theme . '/blank_assist_way.php');
		$this->template->write('page_title', ' CAT | ' . $setTitle . '');
		$this->template->write_view('page_content', 'all/' . $this->theme . '/view_assist_way.php');
		// $this->template->write_view('page_footer', 'all/' . $this->theme . '/view_footer.php');
		$this->template->render();
	}
	public function flag_show_page_add_img()
	{
		$flag_show = $_POST['flag_show'];
		$set_flag = array('flag_show' => $flag_show);
		$this->session->set_userdata($set_flag);
		$this->assist_backend->checksession();
		// $get_recipient = $this->assist_backend->get_recipient($sdpm_id);
		echo json_encode($set_flag);
		exit;
	}
	public function Logout()
	{
		$this->assist_backend->Logout();
	}
	public function tests(){
		$user_id = $_POST['user_id'];
		$result = $this->assist_backend->CheckPermissions($user_id);
		echo json_encode($result);
	}
}
