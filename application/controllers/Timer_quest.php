<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Timer_quest extends CI_Controller
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
	public function timer_quest()
	{
		// $i = 0;
		$check_quest = $this->assist_backend->check_quest();
		echo json_encode($check_quest);
		$main_date = date("Y-m-d H:i:s");
		if ($check_quest !== null) {
			foreach ($check_quest as $quest) {
				if ($quest['status_qu'] !== '0') {
					if ($quest['status_qu'] !== '4') {
						if ($quest['over_accept_flag'] === '0') {
							if ($quest['status_qu'] !== '2') {
								if ($quest['status_qu'] !== '3') {
									if ($main_date > $quest['receive_time']) {
										$update_over_accept = $this->assist_backend->update_over_accept($quest['qu_id']);
									}
								}
							}
						}
						if ($quest['status_qu'] !== '3') {
							if ($quest['over_success_flag'] === '0') {
								if ($main_date > $quest['specified_time']) {
									$update_over_success = $this->assist_backend->update_over_success($quest['qu_id']);
								}
							}
						}
					}
					// 			if ($check_user[0]['email'] !== '' && $check_user[0]['email'] !== null) {
					// 				if ($quest['status_qu'] === '1') {
					// 					$config = array(
					// 						'protocol' => "smtp",
					// 						'smtp_host' => "mail.tbkk.co.th",
					// 						'smtp_timeout' => 30,
					// 						'smtp_port' => 587,
					// 						'smtp_user' => "admin_pcsystem@tbkk.co.th",
					// 						'smtp_pass' => "AvZZ$4",
					// 						'charset' => "utf-8",
					// 						'mailtype' => "html",
					// 						'newline' => "\r\n"
					// 					);
					// 					$this->email->initialize($config);
					// 					$this->email->from("admin_pcsystem@tbkk.co.th", $this->session->userdata('sessUsr'));
					// 					$this->email->to("chayutchanuan53@gmail.com");
					// 					$this->email->subject("เลี้ยวข้าว");
					// 					$this->email->message("เอาข้าวหมูกรอบนะพี่.");
					// 					if ($this->email->send()) {
					// 						$update_flag_issue = $this->assist_backend->update_flag_issue($quest['qu_id']);
					// 					}
					// 				}
					// 			}else{

					// 			}
				}
			}
		}











		// $p['phases'] = $this->input->post('phase');
		// $p['type'] = $this->input->post('types');
		// $p['system'] = $this->input->post('syst');
		// $p['comments'] = $this->input->post('comment');
		// $p['pris'] = $this->input->post('pri');
		// $p['line'] = $this->input->post('line');

		// $type = $this->connect_db->type_db($p['type']);
		// $system = $this->connect_db->system_db($p['system']);
		// $priority = $this->connect_db->priority_db( $p['pris']);
		// echo $priority;
		// echo $system;
		// echo $type;





		//     ini_set('display_errors', 1);
		//     ini_set('display_startup_errors', 1);
		//     error_reporting(E_ALL);
		//     date_default_timezone_set("Asia/Bangkok");

		//     $sToken = "jwTtbViGUDdpjEufuBDrdtSQpnW1sa2X986v7scX38E";
		//     $sMessage = "\nType: ".date("Y-m-d H:i:s")."\n";
		//     // $sMessage .= "______________________\n";
		//     // $sMessage .= "Line: ".$p['line']."\n";
		//     // $sMessage .= "______________________\n";
		//     // $sMessage .= "System: ".$system."\n";
		//     // $sMessage .= "______________________\n";
		//     // $sMessage .= "Priority: ".$priority."\n";
		//     // $sMessage .= "______________________\n";
		//     // $sMessage .= "Detail: ".$p['comments']."\n";
		//     // $sMessage .= "______________________";



		//     $chOne = curl_init(); 
		//     curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
		//     curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
		//     curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
		//     curl_setopt( $chOne, CURLOPT_POST, 1); 
		//     curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
		//     $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
		//     curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
		//     curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
		//     $result = curl_exec( $chOne ); 

		//     //Result error 
		//     if(curl_error($chOne)) 
		//     { 
		//         echo 'error:' . curl_error($chOne); 
		//     } 
		//     else { 
		//         // $result_ = json_decode($result, true); 
		//         // echo "status : ".$result_['status']; echo "message : ". $result_['message'];
		//     } 
		//     curl_close( $chOne ); 
	}
}
