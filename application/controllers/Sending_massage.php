<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sending_massage extends CI_Controller
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
	public function sending_massage()
	{
		$i = 0;
		$check_quest = $this->assist_backend->check_quest();
		if ($check_quest !== null) {
			foreach ($check_quest as $quest) {
				if ($quest['flag_alert_issue'] === '1') {
					$check_user = $this->assist_backend->check_E_Or_L_user($quest['support_by_id'], $quest['dep_support_id']);
					if ($check_user !== null) {
						if ($check_user[0]['email'] !== '' && $check_user[0]['email'] !== null) {
							if ($quest['status_qu'] === '1') {
								// $config = array(
								// 	'protocol' => "smtp",
								// 	'smtp_host' => "ssl://smtp.gmail.com",
								// 	'smtp_timeout' => 30,
								// 	'smtp_port' => 465,
								// 	'smtp_user' => "64309010005@chontech.ac.th",
								// 	'smtp_pass' => "12345678",
								// 	'charset' => "utf-8",
								// 	'mailtype' => "html",
								// 	'newline' => "\r\n"
								// 	// kaikra01@gmail.com zzzzzzv080@gmail.com
								// );
								$send_by = '';
								if ($quest['issue_by_id'] !== '' && $quest['issue_by_id'] !== null) {
									$send_by = $quest['issue_by'];
								} else {
									$send_by = $quest['issue_text'];
								}
								$config = array(
									'protocol' => "smtp",
									'smtp_host' => "mail.tbkk.co.th",
									'smtp_timeout' => 30,
									'smtp_port' => 587,
									'smtp_user' => "admin_pcsystem@tbkk.co.th",
									'smtp_pass' => "AvZZ$4",
									'charset' => "utf-8",
									'mailtype' => "html",
									'newline' => "\r\n"
								);
								$this->email->initialize($config);

								$img = base_url() . '/themes/softmat/img/cat.png';

								$html_massage = '<table  style="width:100%;  font-size: 16px;   text-align: center;background-size: cover;     background-position: center;  padding: 20px;" background="https://wallpaper.dog/large/20420792.jpg">
								<tr>
																 <td colspan="2"><div></div></td>
															 </tr>
														 <tr>
																 <td  colspan="2"><div style="width:50%;    float: left;     color: white;">Department Issue: <p> <input  type="text" style="padding: 7px;    
																 border-radius: 10px;  color: white; text-align:center;"  value=" ' . $quest['dep_issue'] . '"  disabled ></p></div><div style="width:50%;   ;  float: left;     color: white;">Issue By: <p> <input  type="text" style="padding: 7px;   
																 border-radius: 10px;  color: white; text-align:center;"  value=" ' . $quest['issue_by'] . '"  disabled ></p></div><div style="width:50%;    float: left;     color: white;">Type: <p> <input  type="text" style="padding: 7px;  
																 border-radius: 10px;  color: white; text-align:center;"  value=" ' . $quest['type_name'] . '"  disabled ></p></div><div style="width:50%;    float: left;     color: white;">System:<p> <input  type="text" style="padding: 7px;  
																 border-radius: 10px;  color: white; text-align:center;"  value=" ' . $quest['system_name'] . '"  disabled ></p></div></td>
														 </tr>
															<tr>
																 <td colspan="2"style=" color: white;">
																		 Subject:
						 
																	</td>

															 </tr>
                                                             		<tr>
																 <td colspan="2"style=" color: white;">
																 <input  type="text" style="padding: 7px;  margin-top: 10px; 
																 border-radius: 10px;  color: white; text-align:center;"  value=" ' . $quest['subject'] . '"  disabled >
																
						 
																	</td>

															 </tr>
                                                                                                                                  <tr>
                                                                                                                                   <td colspan="2"style=" color: white;">
																		Detail:
						 
																	</td>
																	
																	
																	</tr>
                                                                                     		<tr>
																 <td colspan="2"style=" color: white;">
																 <textarea style="border-radius: 10px;color: white;  text-align:center;   margin-top: 10px;" disabled id="" cols="50" rows="3" "   required>' . $quest['detail'] . '</textarea>
																
						 
																	</td>

															 </tr>
																<tr>
																 <td colspan="2"><div><button style="padding: 0.5rem 1rem; font-size: 0.75rem;  border-radius: 1rem;    color: #fff;  background-color: #696cff;border-color: #696cff; margin-top: 20px;  " type="button"  onclick="">Open View</button></div></td>
															 </tr>
												 </table>';
								$this->email->from("admin_pcsystem@tbkk.co.th", $send_by);
								$this->email->to('chayutchanuan63@gmail.com');
								$this->email->subject($quest['subject']);
								$this->email->message($html_massage);
								if ($this->email->send()) {
									$update_flag_issue = $this->assist_backend->update_flag_issue($quest['qu_id']);
									echo json_encode('suc');
								}
							}
						} else {
							echo json_encode('error');
						}
					}
				}
			}
		}
	}
}
