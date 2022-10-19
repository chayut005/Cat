<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		// $this->load->view('welcome_message');
		// var_dump(date ("Y-m-d H:i:s"));

		// $date = new DateTime("now", new DateTimeZone('Asia/Bangkok'));
		// 			$time = $date->format('Y-m-d H:i:s');
		// 			$time_depart_ment =  $this->assist_backend->time_depart_ment(4,1);
					
		// 				$set_expected_pickup_time_department = $time_depart_ment['set_expected_pickup_time_department'];
		// 				$set_time_priority_department = $time_depart_ment['set_time_priority_department'];
		// 				$time_department = date('Y-m-d H:i:s', strtotime($time . '' . $set_expected_pickup_time_department . ' min'));
		// 				$time_priority = date('Y-m-d H:i:s', strtotime($time_department . '' . $set_time_priority_department . ' min'));
		// 				var_dump($time_priority);
		$sss = $_FILES["img_add_user"]["name"];
		echo $sss;
		exit;

	}
}
