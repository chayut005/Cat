<?php
class Assist_backend extends CI_Model
{
	public function __construct()
	{
		// $this->cmm = $this->load->database('qmdm_system', true); update_request_time save_request_time save_priority get_report_cat
	}
	public function sending_data_request($arr_img, $data)
	{
		$last_id = $this->sending_data_request_db($data);
		foreach ($arr_img as $rimg) {
			$today = date("Y-m-dHis");
			$month = date("m");
			$year = date("Y");
			$fileName = iconv('UTF-8', 'TIS-620', $rimg['FileLogo']);
			$arrStrLogo = explode(".", $fileName);
			$fileNameLogo = $today . "_" . $arrStrLogo[0] . "." . $arrStrLogo[1];
			$new_img_name = $fileNameLogo;
			$org = $arrStrLogo[0] . "." . $arrStrLogo[1];
			$fileNameLogo = preg_replace('/  \s+/', '_', $fileNameLogo);
			$targetPathLogo = 'themes/softmat/request_img/' . $year . '/' . $month . '/';
			$targetFileLogo = $targetPathLogo . $fileNameLogo;
			//============================Checks whether a file or directory exists.============================//
			$tmpPath  = 'themes/softmat/request_img/';
			$tmpPath1 = 'themes/softmat/request_img/' . $year . '/';
			$tmpPath2 = $targetPathLogo;
			$this->create_folder_img($tmpPath, $tmpPath1, $tmpPath2, $year, $month);
			//============================Checks whether a file or directory exists.============================//
			$sending_data_request_db_img = $this->sending_data_request_db_img($targetFileLogo, $org, $new_img_name, $last_id);
			copy($rimg['tempFileLogo'], $targetFileLogo);
		}
		return $sending_data_request_db_img;
		exit;
	}
	public function create_folder_img($tmpPath, $tmpPath1, $tmpPath2, $year, $month)
	{
		if (!file_exists($tmpPath1)) {
			mkdir($tmpPath . '\\' . $year . '\\' . $month . '\\', 0777, true);
		} elseif (!file_exists($tmpPath2)) {
			mkdir($tmpPath1 . '\\' . $month . '\\', 0777, true);
		}
	}




	public function sending_quest_way_img_edit($targetFileLogo, $org, $new_img_name, $last_id)
	{
		$this->db->where('qu_id', $last_id);
		$send_img_delete = $this->db->delete('list_img_quest');

		$this->db->set('path_img', $targetFileLogo);
		$this->db->set('old_img', $org);
		$this->db->set('new_img', $new_img_name);
		$this->db->where('qu_id', $last_id);
		$send_img_request = $this->db->insert('list_img_quest');

		return $send_img_request;
		exit;
	}
	public function sending_data_request_way_edit($arr_img, $data)
	{
		$last_id = $this->sending_quest_way_edit($data);
		foreach ($arr_img as $rimg) {
			$today = date("Y-m-dHis");
			$month = date("m");
			$year = date("Y");
			$fileName = iconv('UTF-8', 'TIS-620', $rimg['FileLogo']);
			$arrStrLogo = explode(".", $fileName);
			$fileNameLogo = $today . "_" . $arrStrLogo[0] . "." . $arrStrLogo[1];
			$new_img_name = $fileNameLogo;
			$org = $arrStrLogo[0] . "." . $arrStrLogo[1];
			$fileNameLogo = preg_replace('/  \s+/', '_', $fileNameLogo);
			$targetPathLogo = 'themes/softmat/request_img/' . $year . '/' . $month . '/';
			$targetFileLogo = $targetPathLogo . $fileNameLogo;
			//============================Checks whether a file or directory exists.============================//
			$tmpPath  = 'themes/softmat/request_img/';
			$tmpPath1 = 'themes/softmat/request_img/' . $year . '/';
			$tmpPath2 = $targetPathLogo;
			$this->create_folder_img($tmpPath, $tmpPath1, $tmpPath2, $year, $month);
			//============================Checks whether a file or directory exists.============================//
			$sending_quest_way_img = $this->sending_quest_way_img_edit($targetFileLogo, $org, $new_img_name, $last_id);
			copy($rimg['tempFileLogo'], $targetFileLogo);
		}
		return $sending_quest_way_img;
		exit;
	}
	public function sending_quest_way_edit($data)
	{
		$user = $this->session->userdata('sessUsr');
		$dep_id = $this->session->userdata('sessDep');
		$user_id = $this->session->userdata('sessUsrId');

		$this->db->set('dep_support_id', $data['re_department']);
		$this->db->set('support_by_id', $data['re_support']);
		$this->db->set('type_id', $data['re_type']);
		$this->db->set('system_id', $data['re_system']);
		$this->db->set('pri_id', $data['priority_id']);
		$this->db->set('subject', $data['re_subject']);
		$this->db->set('lp_id',  $data['re_line']);
		$this->db->set('detail',  $data['re_detail']);
		$this->db->set('date_create',  $data['date_create']);
		$this->db->set('create_by',  $user);
		$this->db->set('receive_time',  $data['time_receive']);
		$this->db->set('specified_time',  $data['specified_time']);
		$this->db->where('qu_id', $data['qu_id']);

		$send_data_request = $this->db->update('list_quest');
		$last_id = $data['qu_id'];

		return $last_id;
		exit;
	}
	public function sending_quest_way_no_edit($data)
	{
		$user = $this->session->userdata('sessUsr');

		$this->db->set('dep_support_id', $data['re_department']);
		$this->db->set('support_by_id', $data['re_support']);
		$this->db->set('type_id', $data['re_type']);
		$this->db->set('system_id', $data['re_system']);
		$this->db->set('pri_id', $data['priority_id']);
		$this->db->set('subject', $data['re_subject']);
		$this->db->set('lp_id',  $data['re_line']);
		$this->db->set('detail',  $data['re_detail']);
		$this->db->set('date_update',  $data['date_create']);
		$this->db->set('update_by',  $user);
		$this->db->set('status_qu', '1');
		$this->db->set('receive_time',  $data['time_receive']);
		$this->db->set('specified_time',  $data['specified_time']);
		$this->db->where('qu_id', $$data['qu_id']);
		$send_data_request = $this->db->update('list_quest');
		return $send_data_request;
		exit;
	}
	public function re_system($system_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('status_system', '1');
		$this->db->set('del_flag', '0');
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->set('update_by', $sid);
		$this->db->where('system_id', $system_id);
		$exc_user = $this->db->update('list_system');

		if ($exc_user) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function delete_system($system_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('status_system', '0');
		$this->db->set('del_flag', '1');
		$this->db->set('date_delete', 'NOW()', FALSE);
		$this->db->set('del_by', $sid);
		$this->db->where('system_id', $system_id);
		$exc_user = $this->db->update('list_system');

		if ($exc_user) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function re_category($cat_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('status_cat', '1');
		$this->db->set('del_flag', '0');
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->set('update_by', $sid);
		$this->db->where('cat_id', $cat_id);
		$exc_user = $this->db->update('list_category');

		if ($exc_user) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function delete_category($cat_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('status_cat', '0');
		$this->db->set('del_flag', '1');
		$this->db->set('date_delete', 'NOW()', FALSE);
		$this->db->set('del_by', $sid);
		$this->db->where('cat_id', $cat_id);
		$exc_user = $this->db->update('list_category');

		if ($exc_user) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function enable_system($system_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('update_by', $sid);
		$this->db->set('status_system', '1');
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->where('system_id', $system_id);
		$exc_user = $this->db->update('list_system');
		if ($exc_user) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function disable_system($system_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('update_by', $sid);
		$this->db->set('status_system', '0');
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->where('system_id', $system_id);
		$exc_user = $this->db->update('list_system');
		if ($exc_user) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function save_system($system_id, $dep_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('date_create', 'NOW()', FALSE);
		$this->db->set('create_by', $sid);
		$this->db->set('system_id', $system_id);
		$this->db->set('dep_id', $dep_id);
		$type = $this->db->insert('list_system_list');
		return $type;
		exit;
	}
	public function delete_system_use($system_id, $dep_id)
	{
		$arr_id = array('system_id' => $system_id, 'dep_id' => $dep_id);

		$this->db->where($arr_id);
		$delete = $this->db->delete('list_system_list');
		return $delete;
		exit;
	}
	public function data_main_system()
	{
		$sqlLoad = "SELECT * FROM list_system";
		$excLoad = $this->db->query($sqlLoad);
		$recLoad = $excLoad->result_array();
		if ($excLoad->num_rows() != 0) {
			return $recLoad;
		} else {
			return null;
		}
	}
	public function data_system($dep_id)
	{
		$sqlLoad = "SELECT lsl.*,ls.system_name,ld.dep_name FROM list_system_list AS lsl LEFT JOIN list_system AS ls ON ls.system_id = lsl.system_id LEFT JOIN list_department AS ld ON ld.dep_id = lsl.dep_id WHERE ls.status_system<>0 AND ls.del_flag<>1 AND ld.status_dep<>0 AND ld.del_flag<>1 AND lsl.dep_id = '$dep_id' ";
		$excLoad = $this->db->query($sqlLoad);
		$recLoad = $excLoad->result_array();
		if ($excLoad->num_rows() != 0) {
			return $recLoad;
		} else {
			return null;
		}
	}
	public function enable_category($cat_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('update_by', $sid);
		$this->db->set('status_cat', '1');
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->where('cat_id', $cat_id);
		$exc_user = $this->db->update('list_category');
		if ($exc_user) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function disable_category($cat_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('update_by', $sid);
		$this->db->set('status_cat', '0');
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->where('cat_id', $cat_id);
		$exc_user = $this->db->update('list_category');
		if ($exc_user) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function save_category($cat_id, $dep_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('date_create', 'NOW()', FALSE);
		$this->db->set('create_by', $sid);
		$this->db->set('cat_id', $cat_id);
		$this->db->set('dep_id', $dep_id);
		$type = $this->db->insert('list_category_list');
		return $type;
		exit;
	}
	public function delete_cat_use($cat_id, $dep_id)
	{
		$arr_id = array('cat_id' => $cat_id, 'dep_id' => $dep_id);

		$this->db->where($arr_id);
		$delete = $this->db->delete('list_category_list');
		return $delete;
		exit;
	}
	public function data_main_category()
	{
		$sqlLoad = "SELECT * FROM list_category";
		$excLoad = $this->db->query($sqlLoad);
		$recLoad = $excLoad->result_array();
		if ($excLoad->num_rows() != 0) {
			return $recLoad;
		} else {
			return null;
		}
	}
	public function data_category($dep_id)
	{
		$sqlLoad = "SELECT lcl.*,lc.cat_name,ld.dep_name FROM list_category_list AS lcl LEFT JOIN list_category AS lc ON lc.cat_id = lcl.cat_id LEFT JOIN list_department AS ld ON ld.dep_id = lcl.dep_id WHERE lc.status_cat<>0 AND lc.del_flag<>1 AND ld.status_dep<>0 AND ld.del_flag<>1 AND lcl.dep_id = '$dep_id' ";
		$excLoad = $this->db->query($sqlLoad);
		$recLoad = $excLoad->result_array();
		if ($excLoad->num_rows() != 0) {
			return $recLoad;
		} else {
			return null;
		}
	}
	public function save_type($type_id, $dep_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('date_create', 'NOW()', FALSE);
		$this->db->set('create_by', $sid);
		$this->db->set('type_id', $type_id);
		$this->db->set('dep_id', $dep_id);
		$type = $this->db->insert('list_type_list');
		return $type;
		exit;
	}
	public function delete_type_use($type_id, $dep_id)
	{
		$arr_id = array('type_id' => $type_id, 'dep_id' => $dep_id);

		$this->db->where($arr_id);
		$delete = $this->db->delete('list_type_list');
		return $delete;
		exit;
	}
	public function re_type($type_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('status_type', '1');
		$this->db->set('del_flag', '0');
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->set('update_by', $sid);
		$this->db->where('type_id', $type_id);
		$exc_user = $this->db->update('list_type');

		if ($exc_user) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function delete_type($type_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('status_type', '0');
		$this->db->set('del_flag', '1');
		$this->db->set('date_delete', 'NOW()', FALSE);
		$this->db->set('del_by', $sid);
		$this->db->where('type_id', $type_id);
		$exc_user = $this->db->update('list_type');

		if ($exc_user) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function enable_type($type_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('update_by', $sid);
		$this->db->set('status_type', '1');
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->where('type_id', $type_id);
		$exc_user = $this->db->update('list_type');
		if ($exc_user) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function disable_type($type_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('update_by', $sid);
		$this->db->set('status_type', '0');
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->where('type_id', $type_id);
		$exc_user = $this->db->update('list_type');
		if ($exc_user) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function data_main_type()
	{
		$sqlLoad = "SELECT * FROM list_type";
		$excLoad = $this->db->query($sqlLoad);
		$recLoad = $excLoad->result_array();
		if ($excLoad->num_rows() != 0) {
			return $recLoad;
		} else {
			return null;
		}
	}
	public function data_type($dep_id)
	{
		$sqlLoad = "SELECT ltl.*,lt.type_name,ld.dep_name FROM list_type_list AS ltl LEFT JOIN list_type AS lt ON lt.type_id = ltl.type_id LEFT JOIN list_department AS ld ON ld.dep_id = ltl.dep_id WHERE lt.status_type<>0 AND lt.del_flag<>1 AND ld.status_dep<>0 AND ld.del_flag<>1 AND ltl.dep_id = '$dep_id'";
		$excLoad = $this->db->query($sqlLoad);
		$recLoad = $excLoad->result_array();
		if ($excLoad->num_rows() != 0) {
			return $recLoad;
		} else {
			return null;
		}
	}
	public function get_report_cat($dep_id, $st, $lt)
	{
		$cat = "SELECT lcl.*,lc.cat_name FROM `list_category_list` AS lcl LEFT JOIN list_category AS lc ON lc.cat_id = lcl.cat_id WHERE lc.status_cat<>0 AND lc.del_flag<>1 AND lcl.dep_id = '$dep_id'";
		$q_cat = $this->db->query($cat);
		$recat = $q_cat->result_array();
		// sessDep data_time_request
		// $user_id = $this->session->userdata('sessUsrId');
		$quest = "SELECT
		lq.*,lu.employee
			FROM
		list_quest AS lq LEFT JOIN list_user AS lu ON lu.user_id = lq.support_by_id
			WHERE
		dep_support_id = '$dep_id' 
		AND lq.date_create BETWEEN '$st 00:00:00' 
		AND '$lt 23:59:59' 
			ORDER BY
		lq.date_create DESC";
		$q_quest = $this->db->query($quest);
		$re_quest = $q_quest->result_array();

		$data = array();
		$max = 0;
		$allQuest = 0;
		$quest_data = array();
		foreach ($recat as $cat) {
			$num = 0;
			foreach ($re_quest as $quest) {
				if ($cat['cat_id'] == $quest['cat_id']) {
					array_push($quest_data, $quest);
					$num++;
					$allQuest++;
				}
			}
			if ($num > $max) {
				$max = $num;
			}

			array_push($data, array(
				'cat_id' => $cat['cat_id'],
				'name' => $cat['cat_name'],
				'allQ' => $num
			));
		}
		$last_data = array('max' => $max, 'alldata' => $allQuest, 'data' => $data, 'q_data' => $quest_data);
		return $last_data;
	}
	public function create_priority($data)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('date_create', 'NOW()', FALSE);
		$this->db->set('create_by', $sid);
		$this->db->set('status_pri', $data['status_pri']);
		$this->db->set('pri_name', $data['pri_name']);
		$time = $this->db->insert('list_priority');
		return $time;
		exit;
	}
	public function save_priority($pri_id, $dep_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('date_create', 'NOW()', FALSE);
		$this->db->set('create_by', $sid);
		$this->db->set('type_id', '1');
		$this->db->set('pri_id', $pri_id);
		$this->db->set('dep_id', $dep_id);
		$time = $this->db->insert('list_priority_list');
		return $time;
		exit;
	}
	public function save_request_time($data)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('date_create', 'NOW()', FALSE);
		$this->db->set('create_by', $sid);
		$this->db->set('type_id', '2');
		$this->db->set('set_timer_request_dep', $data['time_request']);
		$this->db->set('dep_id', $data['dep_id']);
		$time = $this->db->insert('list_timer_request_department');
		return $time;
		exit;
	}
	public function delete_request_time($dep_id)
	{
		$this->db->where('dep_id', $dep_id);
		$delete = $this->db->delete('list_timer_request_department');
		return $delete;
		exit;
	}
	public function update_request_time($data)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->set('update_by', $sid);
		$this->db->set('set_timer_request_dep', $data['time_request']);
		$this->db->where('dep_id', $data['dep_id']);
		$time = $this->db->update('list_timer_request_department');
		return $time;
		exit;
	}
	public function data_time_request($dep_id)
	{
		// sessDep 
		$user_id = $this->session->userdata('sessUsrId');
		$sqlSel = "SELECT ltd.*,ld.dep_name FROM list_timer_request_department AS ltd LEFT JOIN list_department AS ld ON ld.dep_id = ltd.dep_id WHERE ld.status_dep<>0 AND ld.del_flag<>1 AND ld.dep_id = '$dep_id'";
		$excSel = $this->db->query($sqlSel);
		$recSel = $excSel->result_array();
		return $recSel;
	}
	public function get_data_request_time_d($dep_id)
	{
		// sessDep data_time_request
		$user_id = $this->session->userdata('sessUsrId');
		$sqlSel = "SELECT ltd.*,ld.dep_name FROM list_timer_request_department AS ltd LEFT JOIN list_department AS ld ON ld.dep_id = ltd.dep_id WHERE ld.status_dep<>0 AND ld.del_flag<>1 ";
		$excSel = $this->db->query($sqlSel);
		$recSel = $excSel->result_array();
		return $recSel;
	}
	public function update_priority($data)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('update_by', $sid);
		$this->db->set('pri_name', $data['pri_name']);
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->where('pri_id', $data['pri_id']);
		$exc_per = $this->db->update('list_priority');

		if ($exc_per) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function data_update_priority($pri_id)
	{
		// sessDep
		$user_id = $this->session->userdata('sessUsrId');
		$sqlSel = "SELECT * FROM list_priority WHERE status_pri<>0 AND del_flag<>1 AND pri_id = '$pri_id'";
		$excSel = $this->db->query($sqlSel);
		$recSel = $excSel->result_array();
		return $recSel;
	}
	public function re_priority($pri_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('update_by', $sid);
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->set('status_pri', '1');
		$this->db->set('del_flag', '0');
		$this->db->where('pri_id', $pri_id);
		$exc_per = $this->db->update('list_priority');

		if ($exc_per) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function delete_priority($pri_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('status_pri', '0');
		$this->db->set('del_flag', '1');
		$this->db->set('date_delete', 'NOW()', FALSE);
		$this->db->set('del_by', $sid);
		$this->db->where('pri_id', $pri_id);
		$exc_user = $this->db->update('list_priority');

		if ($exc_user) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function enable_priority($pri_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('update_by', $sid);
		$this->db->set('status_pri', '1');
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->where('pri_id', $pri_id);
		$exc_user = $this->db->update('list_priority');
		if ($exc_user) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function disable_priority($pri_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('update_by', $sid);
		$this->db->set('status_pri', '0');
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->where('pri_id', $pri_id);
		$exc_user = $this->db->update('list_priority');
		if ($exc_user) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function data_priority()
	{
		// sessDep
		$user_id = $this->session->userdata('sessUsrId');
		$sqlSel = "SELECT * FROM list_priority";
		$excSel = $this->db->query($sqlSel);
		$recSel = $excSel->result_array();
		return $recSel;
	}
	public function delete_priority_time($pri_id, $dep_id)
	{
		$arr_id = array('pri_id' => $pri_id, 'dep_id' => $dep_id);

		$this->db->where($arr_id);
		$delete = $this->db->delete('list_priority_list');
		return $delete;
		exit;
	}
	public function update_time_priority($data)
	{
		$arr_id = array('pri_id' => $data['pri_id'], 'dep_id' => $data['dep_id']);

		$this->db->set('time_priority', $data['time_priority']);
		$this->db->where($arr_id);
		$time = $this->db->update('list_priority_list');
		return $time;
		exit;
	}
	public function data_time_priority($pri_id, $dep_id)
	{
		// sessDep
		$user_id = $this->session->userdata('sessUsrId');
		$sqlSel = "SELECT lpl.*,lp.pri_name FROM list_priority_list AS lpl LEFT JOIN list_priority AS lp ON lp.pri_id=lpl.pri_id WHERE  lpl.dep_id = '$dep_id' AND lpl.pri_id = '$pri_id'";
		$excSel = $this->db->query($sqlSel);
		$recSel = $excSel->result_array();
		return $recSel;
	}
	public function get_data_priority_d($dep)
	{
		// sessDep
		$user_id = $this->session->userdata('sessUsrId');
		$sqlSel = "SELECT lpl.*,lp.pri_name,ld.dep_name FROM list_priority_list AS lpl LEFT JOIN list_priority AS lp ON lp.pri_id = lpl.pri_id LEFT JOIN list_department AS ld ON ld.dep_id = lpl.dep_id WHERE lp.status_pri<>0 AND lp.del_flag<>1 AND ld.status_dep<>0 AND ld.del_flag<>1 AND ld.dep_id = '$dep'";
		$excSel = $this->db->query($sqlSel);
		$recSel = $excSel->result_array();
		return $recSel;
	}
	public function update_flag_issue($qu_id)
	{
		$this->db->set('flag_alert_issue', '0');
		$this->db->where('qu_id', $qu_id);
		$cancel_data_request = $this->db->update('list_quest');
		return $cancel_data_request;
		exit;
	}
	public function CheckPermission($user_id)
	{
		$get_url = trim($this->router->fetch_class() . '/' . $this->router->fetch_method());

		$sqlChkPerm = "SELECT
		lp.p_name,
		lp.controller
		FROM
		list_permission_list AS lpl
		INNER JOIN list_permission AS lp ON lp.p_id = lpl.p_id
		LEFT JOIN list_permission_group AS lpg ON lp.pg_id = lpg.pg_id
		WHERE
		lp.status_p<>0 AND lpg.status_pg<>0 AND lpl.user_id = '$user_id' AND lp.controller='$get_url'";

		$excChkPerm = $this->db->query($sqlChkPerm);
		$numChkPerm = $excChkPerm->num_rows();

		if ($numChkPerm != 0) {
			return true;
			exit();
		} else {
			return '<p>คุณไม่มีสิทธิ์การเข้าถึง</p>';
			exit();
		}
	}
	public function get_datatable_request($start_date, $end_date)
	{
		// sessDep
		$user_id = $this->session->userdata('sessUsrId');
		$sqlSel = "SELECT
		lq.*,
		ld.dep_name AS dep_issue,
		lds.dep_name AS dep_support,
		lt.type_name,
		lpr.pri_name,
		lcat.cat_name,
		ls.system_name,
		llp.lp_name,
		lui.employee AS issue_by,
		lus.employee AS support_by 
	    FROM
		list_quest AS lq
		LEFT JOIN list_department AS ld ON ld.dep_id = lq.dep_issue_id
		LEFT JOIN list_department AS lds ON lds.dep_id = lq.dep_support_id
		LEFT JOIN list_type AS lt ON lt.type_id = lq.type_id
		LEFT JOIN list_priority AS lpr ON lpr.pri_id = lq.pri_id
		LEFT JOIN list_category AS lcat ON lcat.cat_id = lq.cat_id
		LEFT JOIN list_system AS ls ON ls.system_id = lq.system_id
		LEFT JOIN list_line_production AS llp ON llp.lp_id = lq.lp_id
		LEFT JOIN list_user AS lui ON lui.user_id = lq.issue_by_id
		LEFT JOIN list_user AS lus ON lus.user_id = lq.support_by_id 
    	WHERE
		lus.user_id = '$user_id'
		AND lq.date_create BETWEEN '$start_date.' '00:00:00' 
		AND '$end_date.' '23:59:59' 
	    ORDER BY
		lq.date_create DESC";
		$excSel = $this->db->query($sqlSel);
		$recSel = $excSel->result_array();
		return $recSel;
	}
	public function get_datatable_request_dep($start_date, $end_date)
	{
		$dep_id = $this->session->userdata('sessDep');

		$sqlSel = "SELECT
		lq.*,
		ld.dep_name AS dep_issue,
		lds.dep_name AS dep_support,
		lt.type_name,
		lpr.pri_name,
		lcat.cat_name,
		ls.system_name,
		llp.lp_name,
		lui.employee AS issue_by,
		lus.employee AS support_by 
	    FROM
		list_quest AS lq
		LEFT JOIN list_department AS ld ON ld.dep_id = lq.dep_issue_id
		LEFT JOIN list_department AS lds ON lds.dep_id = lq.dep_support_id
		LEFT JOIN list_type AS lt ON lt.type_id = lq.type_id
		LEFT JOIN list_priority AS lpr ON lpr.pri_id = lq.pri_id
		LEFT JOIN list_category AS lcat ON lcat.cat_id = lq.cat_id
		LEFT JOIN list_system AS ls ON ls.system_id = lq.system_id
		LEFT JOIN list_line_production AS llp ON llp.lp_id = lq.lp_id
		LEFT JOIN list_user AS lui ON lui.user_id = lq.issue_by_id
		LEFT JOIN list_user AS lus ON lus.user_id = lq.support_by_id 
    	WHERE
		lds.dep_id = '$dep_id'
		AND lq.date_create BETWEEN '$start_date.' '00:00:00' 
		AND '$end_date.' '23:59:59' 
	    ORDER BY
		lq.date_create DESC";
		$excSel = $this->db->query($sqlSel);
		$recSel = $excSel->result_array();
		return $recSel;
	}
	public function get_datatable_request_all($start_date, $end_date)
	{
		$sqlSel = "SELECT
			lq.*,
			ld.dep_name AS dep_issue,
			lds.dep_name AS dep_support,
			lt.type_name,
			lpr.pri_name,
			lcat.cat_name,
			ls.system_name,
			llp.lp_name,
			lui.employee AS issue_by,
			lus.employee AS support_by 
		    FROM
			list_quest AS lq
			LEFT JOIN list_department AS ld ON ld.dep_id = lq.dep_issue_id
			LEFT JOIN list_department AS lds ON lds.dep_id = lq.dep_support_id
			LEFT JOIN list_type AS lt ON lt.type_id = lq.type_id
			LEFT JOIN list_priority AS lpr ON lpr.pri_id = lq.pri_id
			LEFT JOIN list_category AS lcat ON lcat.cat_id = lq.cat_id
			LEFT JOIN list_system AS ls ON ls.system_id = lq.system_id
			LEFT JOIN list_line_production AS llp ON llp.lp_id = lq.lp_id
			LEFT JOIN list_user AS lui ON lui.user_id = lq.issue_by_id
			LEFT JOIN list_user AS lus ON lus.user_id = lq.support_by_id 
		    WHERE lq.date_create BETWEEN '$start_date 00:00:00' 
			AND '$end_date 23:59:59' 
		    ORDER BY
			lq.date_create DESC";
		$excSel = $this->db->query($sqlSel);
		$recSel = $excSel->result_array();
		return $recSel;
	}
	public function update_over_accept($qu_id)
	{
		$this->db->set('over_accept_flag', '1');
		$this->db->where('qu_id', $qu_id);
		$time = $this->db->update('list_quest');
		return $time;
		exit;
	}
	public function update_over_success($qu_id)
	{
		$this->db->set('over_success_flag', '1');
		$this->db->where('qu_id', $qu_id);
		$time = $this->db->update('list_quest');
		return $time;
		exit;
	}
	public function timer_quest($qu_id)
	{
		$sqlSel = "SELECT lq.over_accept_flag,lq.over_success_flag,lq.status_qu FROM list_quest AS lq WHERE lq.qu_id = '$qu_id'";
		$excSel = $this->db->query($sqlSel);
		$recSel = $excSel->result_array();
		if ($excSel->num_rows() != 0) {
			return $recSel;
		} else {
			return null;
		}
	}
	public function data_quest($qu_id)
	{
		$sqlSel = "SELECT
		lq.*,
		ld.dep_name AS dep_issue,
		lds.dep_name AS dep_support,
		lt.type_name,
		lpr.pri_name,
		lcat.cat_name,
		ls.system_name,
		llp.lp_name,
		lui.employee AS issue_by,
		lus.employee AS support_by
		FROM
		list_quest AS lq
		LEFT JOIN list_department AS ld ON ld.dep_id = lq.dep_issue_id
		LEFT JOIN list_department AS lds ON lds.dep_id = lq.dep_support_id
		LEFT JOIN list_type AS lt ON lt.type_id = lq.type_id
		LEFT JOIN list_priority AS lpr ON lpr.pri_id = lq.pri_id
		LEFT JOIN list_category AS lcat ON lcat.cat_id = lq.cat_id
		LEFT JOIN list_system AS ls ON ls.system_id = lq.system_id
		LEFT JOIN list_line_production AS llp ON llp.lp_id = lq.lp_id
		LEFT JOIN list_user AS lui ON lui.user_id = lq.issue_by_id
		LEFT JOIN list_user AS lus ON lus.user_id = lq.support_by_id
		WHERE lq.qu_id = '$qu_id'";
		$excSel = $this->db->query($sqlSel);
		$recSel = $excSel->result_array();
		if ($excSel->num_rows() != 0) {
			return $recSel;
		} else {
			return null;
		}
	}
	public function data_quest_img($qu_id)
	{
		$sqlSel = "SELECT * FROM list_img_quest WHERE qu_id = '$qu_id'";
		$excSel = $this->db->query($sqlSel);
		$recSel = $excSel->result_array();
		if ($excSel->num_rows() != 0) {
			return $recSel;
		} else {
			return null;
		}
	}
	public function check_quest()
	{
		$sqlSel = "SELECT
			lq.*,
			ld.dep_name AS dep_issue,
			lds.dep_name AS dep_support,
			lt.type_name,
			lpr.pri_name,
			lcat.cat_name,
			ls.system_name,
			llp.lp_name,
			lui.employee AS issue_by,
			lus.employee AS support_by 
		    FROM
			list_quest AS lq
			LEFT JOIN list_department AS ld ON ld.dep_id = lq.dep_issue_id
			LEFT JOIN list_department AS lds ON lds.dep_id = lq.dep_support_id
			LEFT JOIN list_type AS lt ON lt.type_id = lq.type_id
			LEFT JOIN list_priority AS lpr ON lpr.pri_id = lq.pri_id
			LEFT JOIN list_category AS lcat ON lcat.cat_id = lq.cat_id
			LEFT JOIN list_system AS ls ON ls.system_id = lq.system_id
			LEFT JOIN list_line_production AS llp ON llp.lp_id = lq.lp_id
			LEFT JOIN list_user AS lui ON lui.user_id = lq.issue_by_id
			LEFT JOIN list_user AS lus ON lus.user_id = lq.support_by_id 
		    ORDER BY
			lq.date_create DESC";
		$excSel = $this->db->query($sqlSel);
		$recSel = $excSel->result_array();
		if ($excSel->num_rows() != 0) {
			return $recSel;
		} else {
			return null;
		}
	}
	public function check_E_Or_L_user($user_id, $dep_id)
	{
		$sqlSel = "SELECT lu.email,lu.id_line_phon FROM list_user AS lu LEFT JOIN list_department AS ld ON ld.dep_id = lu.dep_id WHERE lu.status_user<>0 AND ld.status_dep<>0 AND lu.user_id = '$user_id' AND ld.dep_id = '$dep_id'";
		$excSel = $this->db->query($sqlSel);
		$recSel = $excSel->result_array();
		if ($excSel->num_rows() != 0) {
			return $recSel;
		} else {
			return null;
		}
	}
	public function sending_quest_way_no($data)
	{
		$user = $this->session->userdata('sessUsr');
		$dep_id = $this->session->userdata('sessDep');
		$user_id = $this->session->userdata('sessUsrId');

		$this->db->set('dep_issue_id', $dep_id);
		$this->db->set('issue_by_id', $user_id);
		$this->db->set('dep_support_id', $data['re_department']);
		$this->db->set('support_by_id', $data['re_support']);
		$this->db->set('type_id', $data['re_type']);
		$this->db->set('system_id', $data['re_system']);
		$this->db->set('pri_id', $data['priority_id']);
		$this->db->set('subject', $data['re_subject']);
		$this->db->set('lp_id',  $data['re_line']);
		$this->db->set('detail',  $data['re_detail']);
		$this->db->set('date_create',  $data['date_create']);
		$this->db->set('create_by',  $user);
		$this->db->set('status_qu', '1');
		$this->db->set('receive_time',  $data['time_receive']);
		$this->db->set('specified_time',  $data['specified_time']);

		$send_data_request = $this->db->insert('list_quest');
		return $send_data_request;
		exit;
	}
	public function sending_quest_way($data)
	{
		$user = $this->session->userdata('sessUsr');
		$dep_id = $this->session->userdata('sessDep');
		$user_id = $this->session->userdata('sessUsrId');

		$this->db->set('dep_issue_id', $dep_id);
		$this->db->set('issue_by_id', $user_id);
		$this->db->set('dep_support_id', $data['re_department']);
		$this->db->set('support_by_id', $data['re_support']);
		$this->db->set('type_id', $data['re_type']);
		$this->db->set('system_id', $data['re_system']);
		$this->db->set('pri_id', $data['priority_id']);
		$this->db->set('subject', $data['re_subject']);
		$this->db->set('lp_id',  $data['re_line']);
		$this->db->set('detail',  $data['re_detail']);
		$this->db->set('date_create',  $data['date_create']);
		$this->db->set('create_by',  $user);
		$this->db->set('status_qu', '1');
		$this->db->set('receive_time',  $data['time_receive']);
		$this->db->set('specified_time',  $data['specified_time']);

		$send_data_request = $this->db->insert('list_quest');
		$last_id = $this->db->insert_id();

		return $last_id;
		exit;
	}
	public function sending_quest_way_img($targetFileLogo, $org, $new_img_name, $last_id)
	{
		$this->db->set('qu_id', $last_id);
		$this->db->set('path_img', $targetFileLogo);
		$this->db->set('old_img', $org);
		$this->db->set('new_img', $new_img_name);
		$send_img_request = $this->db->insert('list_img_quest');

		return $send_img_request;
		exit;
	}
	public function sending_data_request_way($arr_img, $data)
	{
		$last_id = $this->sending_quest_way($data);
		foreach ($arr_img as $rimg) {
			$today = date("Y-m-dHis");
			$month = date("m");
			$year = date("Y");
			$fileName = iconv('UTF-8', 'TIS-620', $rimg['FileLogo']);
			$arrStrLogo = explode(".", $fileName);
			$fileNameLogo = $today . "_" . $arrStrLogo[0] . "." . $arrStrLogo[1];
			$new_img_name = $fileNameLogo;
			$org = $arrStrLogo[0] . "." . $arrStrLogo[1];
			$fileNameLogo = preg_replace('/  \s+/', '_', $fileNameLogo);
			$targetPathLogo = 'themes/softmat/request_img/' . $year . '/' . $month . '/';
			$targetFileLogo = $targetPathLogo . $fileNameLogo;
			//============================Checks whether a file or directory exists.============================//
			$tmpPath  = 'themes/softmat/request_img/';
			$tmpPath1 = 'themes/softmat/request_img/' . $year . '/';
			$tmpPath2 = $targetPathLogo;
			$this->create_folder_img($tmpPath, $tmpPath1, $tmpPath2, $year, $month);
			//============================Checks whether a file or directory exists.============================//
			$sending_quest_way_img = $this->sending_quest_way_img($targetFileLogo, $org, $new_img_name, $last_id);
			copy($rimg['tempFileLogo'], $targetFileLogo);
		}
		return $sending_quest_way_img;
		exit;
	}
	public function get_datatable_request_all_user($start_date, $end_date, $user_id)
	{
		$sqlSel = "SELECT
			lq.*,
			ld.dep_name AS dep_issue,
			lds.dep_name AS dep_support,
			lt.type_name,
			lpr.pri_name,
			lcat.cat_name,
			ls.system_name,
			llp.lp_name,
			lui.employee AS issue_by,
			lus.employee AS support_by 
		    FROM
			list_quest AS lq
			LEFT JOIN list_department AS ld ON ld.dep_id = lq.dep_issue_id
			LEFT JOIN list_department AS lds ON lds.dep_id = lq.dep_support_id
			LEFT JOIN list_type AS lt ON lt.type_id = lq.type_id
			LEFT JOIN list_priority AS lpr ON lpr.pri_id = lq.pri_id
			LEFT JOIN list_category AS lcat ON lcat.cat_id = lq.cat_id
			LEFT JOIN list_system AS ls ON ls.system_id = lq.system_id
			LEFT JOIN list_line_production AS llp ON llp.lp_id = lq.lp_id
			LEFT JOIN list_user AS lui ON lui.user_id = lq.issue_by_id
			LEFT JOIN list_user AS lus ON lus.user_id = lq.support_by_id 
		    WHERE lui.user_id = '$user_id'
			AND lq.date_create BETWEEN '$start_date.' '00:00:00' 
			AND '$end_date.' '23:59:59' 
		    ORDER BY
			lq.date_create DESC";
		$excSel = $this->db->query($sqlSel);
		$recSel = $excSel->result_array();
		return $recSel;
	}
	public function cancel_request($qu_id, $detail_c)
	{
		$user = $this->session->userdata('sessUsr');
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->set('update_by',  $user);
		$this->db->set('status_qu', '0');
		$this->db->set('detail_cancel', $detail_c);
		$this->db->set('cancel_by', $user);
		$this->db->where('qu_id', $qu_id);
		$cancel_data_request = $this->db->update('list_quest');
		return $cancel_data_request;
		exit;
	}
	public function reply_accept_up($data)
	{
		$user = $this->session->userdata('sessUsr');
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->set('update_by',  $user);
		$this->db->set('status_qu', '2');
		$this->db->set('detail_up_time_sup', $data['datail_up']);
		$this->db->set('over_success_flag', '0');
		$this->db->set('specified_time', $data['date_up']);
		$this->db->set('support_by_id', $data['sup_by']);
		$this->db->set('cat_id', $data['cat_id']);
		$this->db->where('qu_id', $data['qu_id']);
		$cancel_data_request = $this->db->update('list_quest');
		return $cancel_data_request;
		exit;
	}
	public function reply_accept($data)
	{
		$user = $this->session->userdata('sessUsr');
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->set('update_by',  $user);
		$this->db->set('status_qu', '2');
		$this->db->set('support_by_id', $data['sup_by']);
		$this->db->set('cat_id', $data['cat_id']);
		$this->db->where('qu_id', $data['qu_id']);
		$cancel_data_request = $this->db->update('list_quest');
		return $cancel_data_request;
		exit;
	}
	public function reply_finish($data)
	{
		$user = $this->session->userdata('sessUsr');
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->set('update_by',  $user);
		$this->db->set('status_qu', '3');
		$this->db->where('qu_id', $data['qu_id']);
		$cancel_data_request = $this->db->update('list_quest');
		return $cancel_data_request;
		exit;
	}
	public function reply_quest_way($data)
	{
		$user = $this->session->userdata('sessUsr');
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->set('update_by',  $user);
		$this->db->set('status_qu', '3');
		$this->db->where('qu_id', $data['qu_id']);
		$cancel_data_request = $this->db->update('list_quest');

		return $cancel_data_request;
		exit;
	}
	public function reply_quest_way_img($targetFileLogo, $org, $new_img_name, $data)
	{
		$this->db->set('qu_id', $data['qu_id']);
		$this->db->set('path_img', $targetFileLogo);
		$this->db->set('old_img', $org);
		$this->db->set('new_img', $new_img_name);
		$send_img_request = $this->db->insert('list_img_support_quest');

		return $send_img_request;
		exit;
	}
	public function reply_data_request_way($arr_img, $data)
	{
		$sending_quest_way = $this->reply_quest_way($data);
		foreach ($arr_img as $rimg) {
			$today = date("Y-m-dHis");
			$month = date("m");
			$year = date("Y");
			$fileName = iconv('UTF-8', 'TIS-620', $rimg['FileLogo']);
			$arrStrLogo = explode(".", $fileName);
			$fileNameLogo = $today . "_" . $arrStrLogo[0] . "." . $arrStrLogo[1];
			$new_img_name = $fileNameLogo;
			$org = $arrStrLogo[0] . "." . $arrStrLogo[1];
			$fileNameLogo = preg_replace('/  \s+/', '_', $fileNameLogo);
			$targetPathLogo = 'themes/softmat/request_img/' . $year . '/' . $month . '/';
			$targetFileLogo = $targetPathLogo . $fileNameLogo;
			//============================Checks whether a file or directory exists.============================//
			$tmpPath  = 'themes/softmat/request_img/';
			$tmpPath1 = 'themes/softmat/request_img/' . $year . '/';
			$tmpPath2 = $targetPathLogo;
			$this->create_folder_img($tmpPath, $tmpPath1, $tmpPath2, $year, $month);
			//============================Checks whether a file or directory exists.============================//
			$reply_quest_way_img = $this->reply_quest_way_img($targetFileLogo, $org, $new_img_name, $data);
			copy($rimg['tempFileLogo'], $targetFileLogo);
		}
		return $reply_quest_way_img;
		exit;
	}
	public function reply_request($qu_id, $detail_r)
	{
		$user = $this->session->userdata('sessUsr');
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->set('update_by', $user);
		$this->db->set('status_qu', '4');
		$this->db->set('detail_deny', $detail_r);
		$this->db->set('cancel_by', $user);
		$this->db->where('qu_id', $qu_id);
		$cancel_data_request = $this->db->update('list_quest');
		return $cancel_data_request;
		exit;
	}
	public function update_profile_user_no_me_pass($targetFileLogo, $org, $new_img_name, $data)
	{
		$user = $this->session->userdata('sessUsr');
		$this->db->set('f_name', $data['f_name']);
		$this->db->set('l_name', $data['l_name']);
		$this->db->set('email', $data['email']);
		$this->db->set('id_line_phon', $data['id_line']);
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->set('path_img_user', $targetFileLogo);
		$this->db->set('origin_img_name', $org);
		$this->db->set('new_img_name', $new_img_name);
		$this->db->set('update_by', $user);
		$this->db->where('user_id', $data['user_id']);
		$update_profile_user_no_pass = $this->db->update('list_user');
		return $update_profile_user_no_pass;
		exit;
	}
	public function update_profile_user_passupdate_profile_user_pass($fileupload, $tempFileLogo, $data)
	{
		$today = date("Y-m-dHis");
		$fileName = iconv('UTF-8', 'TIS-620', $fileupload);
		$arrStrLogo = explode(".", $fileName);
		$fileNameLogo = $today . "_" . $arrStrLogo[0] . "." . $arrStrLogo[1];
		$new_img_name = $fileNameLogo;
		$org = $arrStrLogo[0] . "." . $arrStrLogo[1];
		$fileNameLogo = preg_replace('/  \s+/', '_', $fileNameLogo);
		$targetPathLogo = 'themes/softmat/img_user/' . $data['E_username'] . '/';
		$targetFileLogo = $targetPathLogo . $fileNameLogo;
		//============================Checks whether a file or directory exists.============================//
		$tmpPath  = 'themes/softmat/img_user/';
		$tmpPath1 = 'themes/softmat/img_user/' . $data['E_username'] . '/';
		$tmpPath2 = $targetPathLogo;
		$this->create_folder_img_user($tmpPath, $tmpPath1, $tmpPath2, $data['E_username']);
		//============================Checks whether a file or directory exists.============================//
		if ($data['old_pass'] !== '' || $data['new_pass'] !== '' || $data['con_pass'] !== '') {
			$sending_data_edit_user_img = $this->update_profile_user_me_pass($targetFileLogo, $org, $new_img_name, $data);
		} else if ($data['old_pass'] === '' || $data['new_pass'] === '' || $data['con_pass'] === '') {
			$sending_data_edit_user_img = $this->update_profile_user_no_me_pass($targetFileLogo, $org, $new_img_name, $data);
		}
		copy($tempFileLogo, $targetFileLogo);
		return $sending_data_edit_user_img;
		exit;
	}
	public function update_profile_user_me_pass($targetFileLogo, $org, $new_img_name, $data)
	{

		$sqlLoad = "SELECT lu.employee FROM list_user AS lu WHERE lu.status_user<>0 AND lu.del_flag<>1 AND lu.pass = '{$data['old_pass']}' AND lu.user_id = '{$data['user_id']}'";
		$excLoad = $this->db->query($sqlLoad);
		if ($excLoad->num_rows() != 0) {
			$user = $this->session->userdata('sessUsr');
			$this->db->set('f_name', $data['f_name']);
			$this->db->set('l_name', $data['l_name']);
			$this->db->set('email', $data['email']);
			$this->db->set('pass', $data['new_pass']);
			$this->db->set('id_line_phon', $data['id_line']);
			$this->db->set('date_update', 'NOW()', FALSE);
			$this->db->set('path_img_user', $targetFileLogo);
			$this->db->set('origin_img_name', $org);
			$this->db->set('new_img_name', $new_img_name);
			$this->db->set('update_by', $user);
			$this->db->where('user_id', $data['user_id']);
			$update_profile_user_no_pass = $this->db->update('list_user');
			return $update_profile_user_no_pass;
			exit;
		} else {
			return 'Old Password ไม่ตรง';
			exit;
		}
	}
	public function update_profile_user_pass($data)
	{

		$sqlLoad = "SELECT lu.employee FROM list_user AS lu WHERE lu.status_user<>0 AND lu.del_flag<>1 AND lu.pass = '{$data['old_pass']}' AND lu.user_id = '{$data['user_id']}'";
		$excLoad = $this->db->query($sqlLoad);
		if ($excLoad->num_rows() != 0) {
			$user = $this->session->userdata('sessUsr');
			$this->db->set('f_name', $data['f_name']);
			$this->db->set('l_name', $data['l_name']);
			$this->db->set('email', $data['email']);
			$this->db->set('pass', $data['new_pass']);
			$this->db->set('id_line_phon', $data['id_line']);
			$this->db->set('date_update', 'NOW()', FALSE);
			$this->db->set('update_by', $user);
			$this->db->where('user_id', $data['user_id']);
			$update_profile_user_no_pass = $this->db->update('list_user');
			return $update_profile_user_no_pass;
			exit;
		} else {
			return 'Old Password ไม่ตรง';
			exit;
		}
	}
	public function update_profile_user_no_pass($data)
	{
		$user = $this->session->userdata('sessUsr');
		$this->db->set('f_name', $data['f_name']);
		$this->db->set('l_name', $data['l_name']);
		$this->db->set('email', $data['email']);
		$this->db->set('id_line_phon', $data['id_line']);
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->set('update_by', $user);
		$this->db->where('user_id', $data['user_id']);
		$update_profile_user_no_pass = $this->db->update('list_user');
		return $update_profile_user_no_pass;
		exit;
	}
	public function sending_data_edit_user_img($targetFileLogo, $org, $new_img_name, $data)
	{
		$sid = $this->session->userdata('sessUsr');
		if ($data['E_password'] == '') {
			$this->db->set('g_id', $data['E_group']);
			$this->db->set('dep_id', $data['E_department']);
			$this->db->set('f_name', $data['E_fname']);
			$this->db->set('l_name', $data['E_lname']);
			$this->db->set('email', $data['E_email']);
			$this->db->set('id_line_phon', $data['E_line_id']);
			$this->db->set('date_update', 'NOW()', FALSE);
			$this->db->set('update_by', $sid);
			$this->db->set('path_img_user', $targetFileLogo);
			$this->db->set('origin_img_name', $org);
			$this->db->set('new_img_name', $new_img_name);
			$this->db->where('user_id', $data['E_user_id']);
			$sending_data_edit_user_img = $this->db->update('list_user');
		} else if ($data['E_password'] != '') {
			$this->db->set('g_id', $data['E_group']);
			$this->db->set('dep_id', $data['E_department']);
			$this->db->set('f_name', $data['E_fname']);
			$this->db->set('l_name', $data['E_lname']);
			$this->db->set('email', $data['E_email']);
			$this->db->set('id_line_phon', $data['E_line_id']);
			$this->db->set('pass', base64_encode(trim($data['E_password'])));
			$this->db->set('date_update', 'NOW()', FALSE);
			$this->db->set('update_by', $sid);
			$this->db->set('path_img_user', $targetFileLogo);
			$this->db->set('origin_img_name', $org);
			$this->db->set('new_img_name', $new_img_name);
			$this->db->where('user_id', $data['E_user_id']);
			$sending_data_edit_user_img = $this->db->update('list_user');
		}

		$this->db->where_in('user_id', $data['E_user_id']);
		$disable_per_user = $this->db->delete('list_permission_list');

		if ($disable_per_user === true) {
			## User Permission 
			$sqlSelPerm = "SELECT
		lp.p_id,
		lp.p_name
		FROM
		list_permission_group_list AS lpgl
		LEFT JOIN list_permission_group AS lpg ON lpg.pg_id = lpgl.pg_id
		LEFT JOIN list_permission AS lp ON lp.pg_id = lpg.pg_id
		WHERE lpg.status_pg<>0 AND lp.status_p<>0 AND lpgl.g_id='{$data['E_group']}'";
			$excSelPerm = $this->db->query($sqlSelPerm);

			$result_p = $excSelPerm->result_array();
			foreach ($result_p as $p) {


				$this->db->set('user_id', $data['E_user_id']);
				$this->db->set('p_id', $p['p_id']);
				$this->db->set('update_by', $sid);
				$this->db->set('date_update', 'NOW()', FALSE);

				$excInsPerm = $this->db->insert('list_permission_list');
			}
		}


		if ($sending_data_edit_user_img || $excInsPerm) {
			return true;
		} else {
			return false;
		}
	}
	public function update_data_user_img($fileupload, $tempFileLogo, $data)
	{
		$today = date("Y-m-dHis");
		$fileName = iconv('UTF-8', 'TIS-620', $fileupload);
		$arrStrLogo = explode(".", $fileName);
		$fileNameLogo = $today . "_" . $arrStrLogo[0] . "." . $arrStrLogo[1];
		$new_img_name = $fileNameLogo;
		$org = $arrStrLogo[0] . "." . $arrStrLogo[1];
		$fileNameLogo = preg_replace('/  \s+/', '_', $fileNameLogo);
		$targetPathLogo = 'themes/softmat/img_user/' . $data['E_username'] . '/';
		$targetFileLogo = $targetPathLogo . $fileNameLogo;
		//============================Checks whether a file or directory exists.============================//
		$tmpPath  = 'themes/softmat/img_user/';
		$tmpPath1 = 'themes/softmat/img_user/' . $data['E_username'] . '/';
		$tmpPath2 = $targetPathLogo;
		$this->create_folder_img_user($tmpPath, $tmpPath1, $tmpPath2, $data['E_username']);
		//============================Checks whether a file or directory exists.============================//
		$sending_data_edit_user_img = $this->sending_data_edit_user_img($targetFileLogo, $org, $new_img_name, $data);
		copy($tempFileLogo, $targetFileLogo);
		return $sending_data_edit_user_img;
		exit;
	}
	public function sending_data_no_img_db($data)
	{
		$user = $this->session->userdata('sessUsr');
		$this->db->set('g_id', $data['a_group']);
		$this->db->set('employee', $data['a_username']);
		$this->db->set('dep_id',  $data['a_dep']);
		$this->db->set('f_name', $data['a_f_name']);
		$this->db->set('l_name', $data['a_l_name']);
		$this->db->set('pass', $data['a_pass']);
		$this->db->set('email', $data['a_email']);
		$this->db->set('id_line_phon', $data['a_line']);
		$this->db->set('date_create', 'NOW()', FALSE);
		$this->db->set('create_by',  $user);
		$this->db->set('status_user', '1');

		$send_data_user = $this->db->insert('list_user');


		$lastId = $this->db->insert_id();

		## User Permission 
		$sqlSelPerm = "SELECT
		lp.p_id,
		lp.p_name
		FROM
		list_permission_group_list AS lpgl
		LEFT JOIN list_permission_group AS lpg ON lpg.pg_id = lpgl.pg_id
		LEFT JOIN list_permission AS lp ON lp.pg_id = lpg.pg_id
		WHERE lpg.status_pg<>0 AND lp.status_p<>0 AND lpgl.g_id='{$data['a_group']}'";
		$excSelPerm = $this->db->query($sqlSelPerm);

		$result_p = $excSelPerm->result_array();
		foreach ($result_p as $p) {


			$this->db->set('user_id', $lastId);
			$this->db->set('p_id', $p['p_id']);
			$this->db->set('update_by', $user);
			$this->db->set('date_update', 'NOW()', FALSE);

			$excInsPerm = $this->db->insert('list_permission_list');
		}



		if ($send_data_user && $excInsPerm) {
			return true;
		} else {
			return false;
		}
	}
	public function sending_data_db($targetFileLogo, $org, $new_img_name, $data)
	{
		$user = $this->session->userdata('sessUsr');
		$this->db->set('g_id', $data['a_group']);
		$this->db->set('employee', $data['a_username']);
		$this->db->set('dep_id',  $data['a_dep']);
		$this->db->set('f_name', $data['a_f_name']);
		$this->db->set('l_name', $data['a_l_name']);
		$this->db->set('pass', $data['a_pass']);
		$this->db->set('email', $data['a_email']);
		$this->db->set('id_line_phon', $data['a_line']);
		$this->db->set('path_img_user', $targetFileLogo);
		$this->db->set('origin_img_name', $org);
		$this->db->set('new_img_name', $new_img_name);
		$this->db->set('date_create', 'NOW()', FALSE);
		$this->db->set('create_by',  $user);
		$this->db->set('status_user', '1');

		$send_data_user = $this->db->insert('list_user');

		$lastId = $this->db->insert_id();

		## User Permission 
		$sqlSelPerm = "SELECT
		lp.p_id,
		lp.p_name
		FROM
		list_permission_group_list AS lpgl
		LEFT JOIN list_permission_group AS lpg ON lpg.pg_id = lpgl.pg_id
		LEFT JOIN list_permission AS lp ON lp.pg_id = lpg.pg_id
		WHERE lpg.status_pg<>0 AND lp.status_p<>0 AND lpgl.g_id='{$data['a_group']}'";
		$excSelPerm = $this->db->query($sqlSelPerm);

		$result_p = $excSelPerm->result_array();
		foreach ($result_p as $p) {


			$this->db->set('user_id', $lastId);
			$this->db->set('p_id', $p['p_id']);
			$this->db->set('update_by', $user);
			$this->db->set('date_update', 'NOW()', FALSE);

			$excInsPerm = $this->db->insert('list_permission_list');
		}



		if ($send_data_user && $excInsPerm) {
			return true;
		} else {
			return false;
		}
	}
	public function sending_data_user_img($fileupload, $tempFileLogo, $data)
	{
		$today = date("Y-m-dHis");
		$fileName = iconv('UTF-8', 'TIS-620', $fileupload);
		$arrStrLogo = explode(".", $fileName);
		$fileNameLogo = $today . "_" . $arrStrLogo[0] . "." . $arrStrLogo[1];
		$new_img_name = $fileNameLogo;
		$org = $arrStrLogo[0] . "." . $arrStrLogo[1];
		$fileNameLogo = preg_replace('/  \s+/', '_', $fileNameLogo);
		$targetPathLogo = 'themes/softmat/img_user/' . $data['a_username'] . '/';
		$targetFileLogo = $targetPathLogo . $fileNameLogo;
		//============================Checks whether a file or directory exists.============================//
		$tmpPath  = 'themes/softmat/img_user/';
		$tmpPath1 = 'themes/softmat/img_user/' . $data['a_username'] . '/';
		$tmpPath2 = $targetPathLogo;
		$this->create_folder_img_user($tmpPath, $tmpPath1, $tmpPath2, $data['a_username']);
		//============================Checks whether a file or directory exists.============================//
		$sending_data_db = $this->sending_data_db($targetFileLogo, $org, $new_img_name, $data);
		copy($tempFileLogo, $targetFileLogo);
		return $sending_data_db;
		exit;
	}
	public function create_folder_img_user($tmpPath, $tmpPath1, $tmpPath2, $user)
	{
		if (!file_exists($tmpPath1)) {
			mkdir($tmpPath . '\\' . $user . '\\', 0777, true);
		} elseif (!file_exists($tmpPath2)) {
			mkdir($tmpPath1 . '\\', 0777, true);
		}
	}

	public function sending_data_request_db($data)
	{
		$user = $this->session->userdata('sessUsr');
		$this->db->set('dep_issue_id', $data['re_department_issue']);
		$this->db->set('issue_by_id', $data['re_issue']);
		$this->db->set('issue_text',  $data['issue_box']);
		$this->db->set('dep_support_id', $data['re_department']);
		$this->db->set('support_by_id', $data['re_support']);
		$this->db->set('type_id', $data['re_type']);
		$this->db->set('system_id', $data['re_system']);
		$this->db->set('cat_id', $data['re_category']);
		$this->db->set('pri_id', $data['priority_id']);
		$this->db->set('subject', $data['re_subject']);
		$this->db->set('lp_id',  $data['re_line']);
		$this->db->set('detail',  $data['re_detail']);
		$this->db->set('date_create',  $data['date_create']);
		$this->db->set('create_by',  $user);
		$this->db->set('status_qu', '2');
		$this->db->set('receive_time',  $data['time_receive']);
		$this->db->set('specified_time',  $data['specified_time']);

		$send_data_request = $this->db->insert('list_quest');
		$last_id = $this->db->insert_id();
		return $last_id;
		exit;
	}
	public function sending_data_request_db_img($targetFileLogo, $org, $new_img_name, $last_id)
	{
		$this->db->set('qu_id', $last_id);
		$this->db->set('path_img', $targetFileLogo);
		$this->db->set('old_img', $org);
		$this->db->set('new_img', $new_img_name);
		$send_img_request = $this->db->insert('list_img_quest');

		return $send_img_request;
		exit;
	}
	public function sending_request($data)
	{
		$user = $this->session->userdata('sessUsr');
		$this->db->set('dep_issue_id', $data['re_department_issue']);
		$this->db->set('issue_by_id', $data['re_issue']);
		$this->db->set('issue_text',  $data['issue_box']);
		$this->db->set('dep_support_id', $data['re_department']);
		$this->db->set('support_by_id', $data['re_support']);
		$this->db->set('type_id', $data['re_type']);
		$this->db->set('system_id', $data['re_system']);
		$this->db->set('cat_id', $data['re_category']);
		$this->db->set('pri_id', $data['priority_id']);
		$this->db->set('subject', $data['re_subject']);
		$this->db->set('lp_id',  $data['re_line']);
		$this->db->set('detail',  $data['re_detail']);
		$this->db->set('date_create',  $data['date_create']);
		$this->db->set('create_by',  $user);
		$this->db->set('status_qu', '2');
		$this->db->set('receive_time',  $data['time_receive']);
		$this->db->set('specified_time',  $data['specified_time']);

		$send_data_request = $this->db->insert('list_quest');
		$id =  $this->db->insert_id();

		return $id;
		exit;
	}
	public function time_request($dep_sup_id, $type_sup_id)
	{
		$sqlLoad = "SELECT ltr.set_timer_request_dep FROM `list_timer_request_department` AS ltr LEFT JOIN list_department AS ld ON ld.dep_id = ltr.dep_id LEFT JOIN list_type AS lt ON lt.type_id = ltr.type_id WHERE ld.status_dep<>0 AND lt.status_type<>0 AND ld.del_flag<>1 AND lt.del_flag<>1 AND ltr.dep_id = '$dep_sup_id' AND ltr.type_id = '$type_sup_id'";
		$excLoad = $this->db->query($sqlLoad);
		$recLoad = $excLoad->result_array();
		if ($excLoad->num_rows() != 0) {
			return $recLoad;
		} else {
			return null;
		}
	}
	public function time_department($dep_id)
	{
		$sqlLoad = "SELECT ld.time_dep FROM list_department AS ld WHERE ld.status_dep<>0 AND ld.del_flag<>1 AND dep_id = '$dep_id'";
		$excLoad = $this->db->query($sqlLoad);
		$recLoad = $excLoad->result_array();
		if ($excLoad->num_rows() != 0) {
			return $recLoad;
		} else {
			return null;
		}
	}
	public function check_system($dep_issue_id, $system_id)
	{
		$sqlLoad = "SELECT
		llpl.*,
		llp.lp_name 
	    FROM
		list_line_production_list AS llpl
		LEFT JOIN list_line_production AS llp ON llp.lp_id = llpl.lp_id
		LEFT JOIN list_system AS ls ON ls.system_id = llpl.system_id
		LEFT JOIN list_department AS ld ON ld.dep_id = llpl.dep_id 
	    WHERE
		ld.status_dep <> 0 
		AND ls.status_system <> 0 
		AND llp.status_lp <> 0 
		AND ld.del_flag<>1
		AND llp.del_flag<>1
		AND ls.del_flag<>1
		AND ld.dep_id = '$dep_issue_id'
		AND llpl.system_id = '$system_id'
		GROUP BY llp.lp_name ";
		$excLoad = $this->db->query($sqlLoad);
		$recLoad = $excLoad->result_array();
		if ($excLoad->num_rows() != 0) {
			return $recLoad;
		} else {
			return null;
		}
	}
	public function check_type($dep_sup_id, $type_id)
	{
		$sqlLoad = "SELECT
	    lprl.*, 
	    lp.pri_name 
        FROM
	    list_priority_list AS lprl
	    LEFT JOIN list_priority AS lp ON lp.pri_id = lprl.pri_id
	    LEFT JOIN list_type AS lt ON lt.type_id = lprl.type_id
	    LEFT JOIN list_department AS ld ON ld.dep_id = lprl.dep_id 
        WHERE
	    ld.status_dep <> 0 
	    AND lt.status_type <> 0 
	    AND lp.status_pri <> 0 
	    AND ld.del_flag<>1
	    AND lp.del_flag<>1
	    AND lt.del_flag<>1
	    AND ld.dep_id = '$dep_sup_id'
	    AND lprl.type_id = '$type_id'
	    GROUP BY lp.pri_name  ";
		$excLoad = $this->db->query($sqlLoad);
		$recLoad = $excLoad->result_array();
		if ($excLoad->num_rows() != 0) {
			return $recLoad;
		} else {
			return null;
		}
	}
	public function get_data_system($dep_id)
	{
		$sqlLoad = "SELECT lsl.*,ls.system_name FROM list_system_list AS lsl LEFT JOIN list_system AS ls ON lsl.system_id = ls.system_id LEFT JOIN list_department AS ld ON ld.dep_id = lsl.dep_id WHERE ld.status_dep<>0 AND ld.del_flag<>1 AND ls.status_system<>0 AND ls.del_flag<>1 AND lsl.dep_id = '$dep_id' GROUP BY ls.system_id";
		$excLoad = $this->db->query($sqlLoad);
		$recLoad = $excLoad->result_array();
		if ($excLoad->num_rows() != 0) {
			return $recLoad;
		} else {
			return null;
		}
	}
	public function get_data_category($dep_id)
	{
		$sqlLoad = "SELECT lcl.*,lc.cat_name FROM list_category_list AS lcl LEFT JOIN list_category AS lc ON lcl.cat_id = lc.cat_id LEFT JOIN list_department AS ld ON ld.dep_id = lcl.dep_id WHERE ld.status_dep<>0 AND ld.del_flag<>1 AND lc.status_cat<>0 AND lc.del_flag<>1 AND lcl.dep_id = '$dep_id' GROUP BY lc.cat_id";
		$excLoad = $this->db->query($sqlLoad);
		$recLoad = $excLoad->result_array();
		if ($excLoad->num_rows() != 0) {
			return $recLoad;
		} else {
			return null;
		}
	}
	public function get_data_type($dep_id)
	{
		$sqlLoad = "SELECT ltl.*,lt.type_name FROM list_type_list AS ltl LEFT JOIN list_type AS lt ON ltl.type_id = lt.type_id LEFT JOIN list_department AS ld ON ld.dep_id = ltl.dep_id WHERE ld.status_dep<>0 AND ld.del_flag<>1 AND lt.status_type<>0 AND lt.del_flag<>1 AND ld.dep_id = '$dep_id' GROUP BY lt.type_id";
		$excLoad = $this->db->query($sqlLoad);
		$recLoad = $excLoad->result_array();
		if ($excLoad->num_rows() != 0) {
			return $recLoad;
		} else {
			return null;
		}
	}
	public function get_support_by_all($dep_id)
	{
		$sqlLoad = "SELECT * FROM list_user WHERE status_user<>0 AND del_flag<>1 AND dep_id = '$dep_id' AND user_id<>'1'";
		$excLoad = $this->db->query($sqlLoad);
		$recLoad = $excLoad->result_array();
		if ($excLoad->num_rows() != 0) {
			return $recLoad;
		} else {
			return null;
		}
	}
	public function get_issue_by_all($dep_id)
	{
		$sqlLoad = "SELECT * FROM list_user WHERE status_user<>0 AND del_flag<>1 AND dep_id = '$dep_id' AND user_id<>'1'";
		$excLoad = $this->db->query($sqlLoad);
		$recLoad = $excLoad->result_array();
		if ($excLoad->num_rows() != 0) {
			return $recLoad;
		} else {
			return null;
		}
	}
	public function CheckSession()
	{
		if ($this->session->userdata('loggedIn') != "OK") {
			redirect('login/user');
			return false;
		} else {
			return true;
		}
	}
	public function update_group($data)
	{
		$user = $this->session->userdata('sessUsr');
		$this->db->set('g_name', $data['group_name']);
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->set('update_by', $user);
		$this->db->where('g_id', $data['group_id']);
		$edit_per_group = $this->db->update('list_group');
		if ($edit_per_group) {
			$strIns = true;
		} else {
			$strIns = false;
		}
		return $strIns;
	}
	public function list_data_permission_group()
	{
		$sqlSel = "SELECT * FROM list_permission_group AS lpg WHERE lpg.del_flag<>'1' AND lpg.status_pg<>'0'";
		$excSel = $this->db->query($sqlSel);
		$recSel = $excSel->result_array();
		return $recSel;
	}
	public function list_user_permission($g_id)
	{
		$list_user_permission = "SELECT lp.p_id FROM list_permission AS lp WHERE lp.status_p<>0 AND lp.del_flag<>1 AND lp.pg_id IN (SELECT lpg.pg_id FROM list_permission_group AS lpg LEFT JOIN list_permission_group_list AS lpgl ON lpgl.pg_id = lpg.pg_id LEFT JOIN list_group AS lg ON lg.g_id = lpgl.g_id WHERE lpg.status_pg<>0 AND lpg.del_flag<>1 AND lg.status_g<>0 AND lg.del_flag<>1 AND lg.g_id = '$g_id') GROUP BY lp.p_id";
		$query_list_user_permission = $this->db->query($list_user_permission);
		$result_list_user_permission = $query_list_user_permission->result_array();
		if ($query_list_user_permission->num_rows() != 0) {
			return $result_list_user_permission;
		} else {
			return null;
		}
	}
	public function list_user_group_by($group_id)
	{
		$list_user_group_by = "SELECT lu.user_id FROM `list_user` AS lu LEFT JOIN list_group AS lg ON lg.g_id = lu.g_id WHERE lu.status_user<>0 AND lu.del_flag<>1 AND lg.status_g<>0 AND lg.del_flag<>1 AND lg.g_id = '$group_id' GROUP BY lu.user_id";
		$query_list_user_group_by = $this->db->query($list_user_group_by);
		$result_list_user_group_by = $query_list_user_group_by->result_array();
		return $result_list_user_group_by;
	}
	public function apply_permission_user($data)
	{

		$sqlLoad = "SELECT * FROM list_group WHERE status_g<>0 AND del_flag<>1 AND g_id<>{$data['group_id']} AND g_name='{$data['group_name']}'";
		$excLoad = $this->db->query($sqlLoad);

		if ($excLoad->num_rows() != 0) {
			return '<p>ชื่อ นี้มีอยู่แล้ว</p><p>กรุณาตรวจสอบ</p>';
			exit;
		} else {
			if ($data['rule'] != '') {
				$user = $this->session->userdata('sessUsr');
				$list_user_group_by = $this->list_user_group_by($data['group_id']);
				foreach ($list_user_group_by as $list_user) {
					$this->db->where_in('user_id', $list_user['user_id']);
					$disable_per_user = $this->db->delete('list_permission_list');
					$list_user_permission = $this->list_user_permission($data['group_id']);
					if ($list_user_permission !== null) {
						foreach ($list_user_permission as $per_g) {
							$this->db->set('update_by', $user);
							$this->db->set('date_update', 'NOW()', FALSE);
							$this->db->set('p_id', $per_g['p_id']);
							$this->db->set('user_id',  $list_user['user_id']);
							$enable_group = $this->db->insert('list_permission_list');
							if ($enable_group) {
								$flag = true;
							} else {
								$flag = false;
							}
						}
					} else {
						$flag = 'No Data';
					}
				}
			} else {
				$flag = 'No Data';
			}

			return $flag;
		}
	}
	public function list_permission_group()
	{
		$list_permission_group = "SELECT pg_id FROM `list_permission_group` WHERE status_pg<>0 AND del_flag<>1 GROUP BY pg_id";
		$query_list_permission_group = $this->db->query($list_permission_group);
		$result_list_permission_group = $query_list_permission_group->result_array();
		return $result_list_permission_group;
	}
	public function create_and_edit_RuleUserGroup($data)
	{
		$sqlLoad = "SELECT * FROM list_group WHERE status_g<>0 AND del_flag<>1 AND g_id<>{$data['group_id']} AND g_name='{$data['group_name']}'";
		$excLoad = $this->db->query($sqlLoad);

		if ($excLoad->num_rows() != 0) {
			return '<p>ชื่อ นี้มีอยู่แล้ว</p><p>กรุณาตรวจสอบ</p>';
			exit;
		} else {
			if ($data['rule'] != '') {
				$update_group = $this->update_group($data);
				$user = $this->session->userdata('sessUsr');
				$this->db->where_in('g_id', $data['group_id']);
				$delete_group = $this->db->delete('list_permission_group_list');
				$list_permission_group = $this->list_permission_group();

				foreach ($data['rule'] as $list_rule) {
					foreach ($list_permission_group as $list_data_permission_group) {
						if ($list_rule == $list_data_permission_group['pg_id']) {
							$this->db->set('update_by', $user);
							$this->db->set('date_update', 'NOW()', FALSE);
							$this->db->set('pg_id', $list_rule);
							$this->db->set('g_id',  $data['group_id']);
							$enable_group = $this->db->insert('list_permission_group_list');
							if ($enable_group) {
								$flag = true;
							} else {
								$flag = false;
							}
						}
					}
				}
			} else {
				$flag = 'No Data';
			}
			return $flag;
		}
	}
	public function list_data_group_permission_group($group_id)
	{
		$sqlSel = "SELECT
		lg.g_id ,
		lpgl.pg_id 
		
		FROM
			list_permission_group_list AS lpgl LEFT JOIN
			list_group AS lg ON lg.g_id = lpgl.g_id
		WHERE
		lpgl.g_id = lg.g_id
			AND lg.status_g<>0 AND lg.g_id = '$group_id'";
		$excSel = $this->db->query($sqlSel);
		$recSel = $excSel->result_array();
		return $recSel;
	}
	public function data_edit_group($group_id)
	{
		$sqlLoad = "SELECT * FROM list_group WHERE status_g<>0 AND del_flag<>1 AND g_id = $group_id ";
		$excLoad = $this->db->query($sqlLoad);
		$recLoad = $excLoad->result_array();
		return $recLoad;
	}
	public function re_group($g_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('update_by', $sid);
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->set('status_g', '1');
		$this->db->set('del_flag', '0');
		$this->db->where('g_id', $g_id);
		$exc_per = $this->db->update('list_group');

		if ($exc_per) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function delete_group($group_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('status_g', '0');
		$this->db->set('del_flag', '1');
		$this->db->set('date_delete', 'NOW()', FALSE);
		$this->db->set('del_by', $sid);
		$this->db->where('g_id', $group_id);
		$exc_user = $this->db->update('list_group');

		if ($exc_user) {
			$this->db->where_in('g_id', $group_id);
			$delete_group = $this->db->delete('list_permission_group_list');
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function enable_group($group_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('update_by', $sid);
		$this->db->set('status_g', '1');
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->where('g_id', $group_id);
		$exc_user = $this->db->update('list_group');
		if ($exc_user) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function disable_group($group_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('update_by', $sid);
		$this->db->set('status_g', '0');
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->where('g_id', $group_id);
		$exc_user = $this->db->update('list_group');
		if ($exc_user) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function create_group($data)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('create_by', $sid);
		$this->db->set('g_name', $data['group_name']);
		$this->db->set('status_g', $data['status_group']);
		$this->db->set('date_create', 'NOW()', FALSE);
		$exc_group = $this->db->insert('list_group');

		if ($exc_group) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function edit_permission($data)
	{
		$sqlLoad = "SELECT * FROM list_permission WHERE status_p<>0 AND del_flag<>1 AND p_id<>{$data['E_permission_id']} AND controller='{$data['E_controller_method']}'";
		$excLoad = $this->db->query($sqlLoad);

		if ($excLoad->num_rows() != 0) {
			return '<p>Controller นี้มีอยู่แล้ว</p><p>กรุณาตรวจสอบ</p>';
			exit;
		} else {

			$sqlLoad = "SELECT * FROM list_permission WHERE status_p<>0 AND del_flag<>1 AND p_id<>{$data['E_permission_id']} AND p_name ='{$data['E_permission_name']}'";
			$excLoad = $this->db->query($sqlLoad);
			if ($excLoad->num_rows() != 0) {
				return '<p>ชือนี้ นี้มีอยู่แล้ว</p><p>กรุณาตรวจสอบ</p>';
				exit;
			} else {
				$sid = $this->session->userdata('sessUsr');
				$this->db->set('update_by', $sid);
				$this->db->set('p_name', $data['E_permission_name']);
				$this->db->set('pg_id', $data['E_group_permission']);
				$this->db->set('controller', $data['E_controller_method']);
				$this->db->set('date_update', 'NOW()', FALSE);
				$this->db->where('p_id', $data['E_permission_id']);
				$edit_per = $this->db->update('list_permission');
				if ($edit_per) {
					return true;
					exit;
				} else {
					return false;
					exit;
				}
			}
		}
	}
	public function data_edit_permission($permission_id)
	{
		$sqlLoad = "SELECT * FROM list_permission WHERE status_p<>0 AND del_flag<>1 AND p_id = $permission_id ";
		$excLoad = $this->db->query($sqlLoad);
		$recLoad = $excLoad->result_array();
		return $recLoad;
	}
	public function re_permission($p_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('update_by', $sid);
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->set('status_p', '1');
		$this->db->set('del_flag', '0');
		$this->db->where('p_id', $p_id);
		$exc_per = $this->db->update('list_permission');

		if ($exc_per) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function delete_permission($permission_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('status_p', '0');
		$this->db->set('del_flag', '1');
		$this->db->set('date_delete', 'NOW()', FALSE);
		$this->db->set('del_by', $sid);
		$this->db->where('p_id', $permission_id);
		$exc_user = $this->db->update('list_permission');

		if ($exc_user) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function enable_permission($permission_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('update_by', $sid);
		$this->db->set('status_p', '1');
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->where('p_id', $permission_id);
		$exc_user = $this->db->update('list_permission');
		if ($exc_user) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function disable_permission($permission_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('update_by', $sid);
		$this->db->set('status_p', '0');
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->where('p_id', $permission_id);
		$exc_user = $this->db->update('list_permission');
		if ($exc_user) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function create_permission($data)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('p_name', $data['permission_name']);
		$this->db->set('controller', $data['controller_method']);
		$this->db->set('pg_id', $data['group_permission']);
		$this->db->set('status_p', $data['status_permission']);
		$this->db->set('date_create', 'NOW()', FALSE);
		$this->db->set('create_by', $sid);
		$exc_per_g = $this->db->insert('list_permission');

		if ($exc_per_g) {
			return true;
		} else {
			return false;
		}
	}
	public function re_permission_group($pg_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('status_pg', '1');
		$this->db->set('del_flag', '0');
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->set('update_by', $sid);
		$this->db->where('pg_id', $pg_id);
		$exc_per = $this->db->update('list_permission_group');

		$sqlLoad = "SELECT * FROM list_permission AS lp LEFT JOIN list_permission_group AS lpg ON lpg.pg_id = lp.pg_id WHERE lp.del_flag<>1 AND lpg.pg_id = '$pg_id'";
		$excLoad = $this->db->query($sqlLoad);
		$recLoad = $excLoad->result_array();

		if ($excLoad->num_rows() != 0) {
			foreach ($recLoad as $data) {
				$sid = $this->session->userdata('sessUsr');
				$this->db->set('status_p', '1');
				$this->db->set('date_update', 'NOW()', FALSE);
				$this->db->set('update_by', $sid);
				$this->db->where_in('p_id', $data['p_id']);
				$exc = $this->db->update('list_permission');
			}
		}

		if ($exc_per || $exc) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function data_edit_permission_group($permission_group_id)
	{
		$sqlLoad = "SELECT * FROM list_permission_group WHERE status_pg<>0 AND del_flag<>1 AND pg_id = $permission_group_id ";
		$excLoad = $this->db->query($sqlLoad);
		$recLoad = $excLoad->result_array();
		return $recLoad;
	}
	public function enable_permission_group($permission_group_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('status_pg', '1');
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->where('pg_id', $permission_group_id);
		$this->db->set('update_by', $sid);
		$exc_user = $this->db->update('list_permission_group');
		$sqlLoad = "SELECT * FROM list_permission AS lp LEFT JOIN list_permission_group AS lpg ON lpg.pg_id = lp.pg_id WHERE lp.del_flag<>1 AND lpg.pg_id = '$permission_group_id'";
		$excLoad = $this->db->query($sqlLoad);
		$recLoad = $excLoad->result_array();

		if ($excLoad->num_rows() != 0) {
			foreach ($recLoad as $data) {
				$sid = $this->session->userdata('sessUsr');
				$this->db->set('status_p', '1');
				$this->db->set('date_update', 'NOW()', FALSE);
				$this->db->set('update_by', $sid);
				$this->db->where_in('p_id', $data['p_id']);
				$exc = $this->db->update('list_permission');
			}
		}

		if ($exc_user || $exc) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function disable_permission_group($permission_group_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('status_pg', '0');
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->where('pg_id', $permission_group_id);
		$this->db->set('update_by', $sid);
		$exc_user = $this->db->update('list_permission_group');
		$sqlLoad = "SELECT * FROM list_permission AS lp LEFT JOIN list_permission_group AS lpg ON lpg.pg_id = lp.pg_id WHERE lp.status_p<>0 AND lp.del_flag<>1 AND lpg.pg_id = '$permission_group_id'";
		$excLoad = $this->db->query($sqlLoad);
		$recLoad = $excLoad->result_array();

		if ($excLoad->num_rows() != 0) {
			foreach ($recLoad as $data) {
				$sid = $this->session->userdata('sessUsr');
				$this->db->set('status_p', '0');
				$this->db->set('date_update', 'NOW()', FALSE);
				$this->db->set('update_by', $sid);
				$this->db->where_in('p_id', $data['p_id']);
				$exc = $this->db->update('list_permission');
			}
		}

		if ($exc_user || $exc) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function delete_permission_group($permission_group_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('status_pg', '0');
		$this->db->set('del_flag', '1');
		$this->db->set('date_delete', 'NOW()', FALSE);
		$this->db->set('del_by', $sid);
		$this->db->where('pg_id', $permission_group_id);
		$exc_user = $this->db->update('list_permission_group');

		$sqlLoad = "SELECT * FROM list_permission AS lp LEFT JOIN list_permission_group AS lpg ON lpg.pg_id = lp.pg_id WHERE lp.status_p<>0 AND lp.del_flag<>1 AND lpg.pg_id = '$permission_group_id'";
		$excLoad = $this->db->query($sqlLoad);
		$recLoad = $excLoad->result_array();

		if ($excLoad->num_rows() != 0) {
			foreach ($recLoad as $data) {
				$sid = $this->session->userdata('sessUsr');
				$this->db->set('status_p', '0');
				$this->db->set('date_update', 'NOW()', FALSE);
				$this->db->set('update_by', $sid);
				$this->db->where_in('p_id', $data['p_id']);
				$exc = $this->db->update('list_permission');
			}
		}

		if ($exc_user || $exc) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function edit_permission_group($data)
	{
		$sqlLoad = "SELECT * FROM list_permission_group WHERE status_pg<>0 AND del_flag<>1 AND pg_id<>{$data['E_permission_group_id']} AND pg_name='{$data['E_permission_group_name']}'";
		$excLoad = $this->db->query($sqlLoad);

		if ($excLoad->num_rows() != 0) {
			return '<p>ชื่อ นี้มีอยู่แล้ว</p><p>กรุณาตรวจสอบ</p>';
			exit;
		} else {
			$sid = $this->session->userdata('sessUsr');
			$this->db->set('pg_name', $data['E_permission_group_name']);
			$this->db->set('date_update', 'NOW()', FALSE);
			$this->db->set('update_by', $sid);
			$this->db->where('pg_id', $data['E_permission_group_id']);
			$edit_per_group = $this->db->update('list_permission_group');
			if ($edit_per_group) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}
	public function create_permission_group($data)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('pg_name', $data['permission_group_name']);
		$this->db->set('status_pg', $data['status_permission_group']);
		$this->db->set('date_create', 'NOW()', FALSE);
		$this->db->set('create_by', $sid);
		$exc_per_g = $this->db->insert('list_permission_group');

		if ($exc_per_g) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function Logout()
	{
		$sid = $this->session->userdata('sessUsrId');
		$this->db->set('last_logout', 'NOW()', FALSE);
		$this->db->where('user_id', $sid);
		$exc_dep = $this->db->update('list_user');
		$this->session->sess_destroy();
		redirect('login/user');
	}
	public function data_update_department($dep_id)
	{
		$sqlSel = "SELECT * FROM list_department WHERE status_dep<>0 AND del_flag<>1 AND dep_id = '$dep_id'";
		$excSel = $this->db->query($sqlSel);
		$recSel = $excSel->result_array();
		return $recSel;
	}
	public function re_dep($dep_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('update_by', $sid);
		$this->db->set('status_dep', '1');
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->set('del_flag', '0');
		$this->db->where('dep_id', $dep_id);
		$exc_per = $this->db->update('list_department');

		if ($exc_per) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function delete_dep($dep_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('status_dep', '0');
		$this->db->set('del_flag', '1');
		$this->db->set('date_delete', 'NOW()', FALSE);
		$this->db->set('del_by', $sid);
		$this->db->where('dep_id', $dep_id);
		$exc_user = $this->db->update('list_department');

		if ($exc_user) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function enable_dep($dep_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('update_by', $sid);
		$this->db->set('status_dep', '1');
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->where('dep_id', $dep_id);
		$exc_user = $this->db->update('list_department');
		if ($exc_user) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function disable_dep($dep_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('update_by', $sid);
		$this->db->set('status_dep', '0');
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->where('dep_id', $dep_id);
		$exc_user = $this->db->update('list_department');
		if ($exc_user) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function update_department($data)
	{
		$sqlLoad = "SELECT * FROM list_department WHERE status_dep<>0 AND del_flag<>1 AND dep_id<>{$data['u_department_id']} AND dep_name='{$data['u_department_name']}'";
		$excLoad = $this->db->query($sqlLoad);

		if ($excLoad->num_rows() != 0) {
			return '<p>ชื่อ นี้มีอยู่แล้ว</p><p>กรุณาตรวจสอบ</p>';
			exit;
		} else {
			$sid = $this->session->userdata('sessUsr');
			$this->db->set('time_dep', $data['time_dep_reply']);
			$this->db->set('dep_name', $data['u_department_name']);
			$this->db->set('date_update', 'NOW()', FALSE);
			$this->db->set('update_by', $sid);
			$this->db->where('dep_id', $data['u_department_id']);
			$exc_dep = $this->db->update('list_department');

			if ($exc_dep) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}
	public function create_department($data)
	{
		$sid = $this->session->userdata('sessUsr');
		$set_datetime = $data['time_dep'];
		$this->db->set('time_dep', $set_datetime);
		$this->db->set('dep_name', $data['department_name']);
		$this->db->set('status_dep', $data['status_dep']);
		$this->db->set('date_create', 'NOW()', FALSE);
		$this->db->set('create_by', $sid);
		$exc_dep = $this->db->insert('list_department');

		if ($exc_dep) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function data_department_table()
	{
		$sqlSel = "SELECT ld.* FROM `list_department` AS ld";
		$excSel = $this->db->query($sqlSel);
		$recSel = $excSel->result_array();
		return $recSel;
	}
	public function RuleUser($data)
	{
		$user = $this->session->userdata('sessUsr');
		$this->db->where_in('user_id', $data['user_id']);
		$disable_per_user = $this->db->delete('list_permission_list');
		$permission_user_list = $this->permission_user_list();
		if ($data['rule'] != '') {
			foreach ($data['rule'] as $r) {
				foreach ($permission_user_list as $user_per) {
					if ($r ==  $user_per['p_id']) {
						$this->db->set('update_by', $user);
						$this->db->set('date_update', 'NOW()', FALSE);
						$this->db->set('p_id', $user_per['p_id']);
						$this->db->set('user_id', $data['user_id']);
						$enable_per_user = $this->db->insert('list_permission_list');
					}
				}
			}
			return $enable_per_user;
		} else {
			return '<p>เลือกอย่างน้อย 1 สิทธิ์</p>';
		}
	}
	public function get_data_permission_group()
	{
		$sqlSel = "SELECT lpg.pg_id, lpg.pg_name , lpg.status_pg FROM list_permission_group AS lpg WHERE lpg.del_flag<>'1' AND lpg.status_pg<>'0' ORDER BY lpg.pg_id ASC";
		$excSel = $this->db->query($sqlSel);
		$recSel = $excSel->result_array();
		return $recSel;
	}
	public function permission_user_list()
	{
		$main_permission = "SELECT lp.p_id FROM list_permission AS lp WHERE lp.status_p<>0 AND lp.del_flag<>1";
		$query_main_permission = $this->db->query($main_permission);
		$result_main_permission = $query_main_permission->result_array();
		return $result_main_permission;
	}
	public function set_session_order()
	{
		$user_id = $this->session->userdata('sessUsrId');
		$sqlSel = "SELECT lu.*,lg.order_g,lg.g_name FROM list_user AS lu LEFT JOIN list_group AS lg ON lg.g_id = lu.g_id WHERE lu.user_id = '$user_id'";
		$excSel = $this->db->query($sqlSel);
		$recSel = $excSel->result_array();
		$arrData = array('sessemail' => $recSel[0]['email'], 'sessDep' => $recSel[0]['dep_id'], 'sessFname' => $recSel[0]['f_name'], 'sessLname' => $recSel[0]['l_name'], 'sessUsr' => $recSel[0]['employee'], 'sessUsrId' => $recSel[0]['user_id'], 'sess_order' => $recSel[0]['order_g'], 'sessGroup' => $recSel[0]['g_id'], 'sessGname' => $recSel[0]['g_name'], 'loggedIn' => "OK");
		$this->session->set_userdata($arrData);
		return $recSel;
	}
	public function set_order_group($data)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('update_by', $sid);
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->set('order_g', $data['order']);
		$this->db->where('g_id', $data['g_id']);
		$exc_user = $this->db->update('list_group');
		if ($exc_user) {
			$set_session_order = $this->set_session_order();
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function datagroups()
	{
		$sess_order = $this->session->userdata('sess_order');
		$sqlSel = "SELECT lg.* FROM `list_group` AS lg  WHERE lg.order_g >='$sess_order' ORDER BY lg.order_g";
		$excSel = $this->db->query($sqlSel);
		$recSel = $excSel->result_array();
		return $recSel;
	}
	public function data_order_groups()
	{
		$sqlSel = "SELECT lg.* FROM `list_group` AS lg ORDER BY lg.order_g";
		$excSel = $this->db->query($sqlSel);
		$recSel = $excSel->result_array();
		return $recSel;
	}
	public function data_permission()
	{
		$sqlSel = "SELECT lp.*, lpg.pg_name FROM list_permission AS lp LEFT JOIN list_permission_group AS lpg ON lpg.pg_id = lp.pg_id GROUP BY lp.p_name";
		$excSel = $this->db->query($sqlSel);
		$recSel = $excSel->result_array();
		return $recSel;
	}
	public function data_permission_group()
	{
		$sqlSel = "SELECT lpg.* FROM list_permission_group AS lpg ORDER BY lpg.pg_id ASC";
		$excSel = $this->db->query($sqlSel);
		$recSel = $excSel->result_array();
		return $recSel;
	}
	public function list_permission_user($user_id)
	{
		$sqlLoad = "SELECT p_id FROM `list_permission_list` WHERE user_id='$user_id'";
		$excLoad = $this->db->query($sqlLoad);
		$recLoad = $excLoad->result_array();
		return $recLoad;
	}
	public function get_list_data_permission($user_id)
	{
		$sqlLoad = "SELECT lg.g_id, lg.g_name FROM list_user AS lu LEFT JOIN list_group AS lg ON lg.g_id = lu.g_id WHERE lg.status_g<>0 AND lu.status_user<>0 AND lu.del_flag<>1 AND lg.del_flag<>1 AND lu.user_id='$user_id'";
		$excLoad = $this->db->query($sqlLoad);
		$recLoad = $excLoad->result_array();
		$recLoad[0];

		$list_permission_group = "SELECT
		lp.p_id,
		lp.p_name
		FROM
		list_permission_group_list AS lpgl 
		LEFT JOIN list_permission_group AS lpg ON lpg.pg_id = lpgl.pg_id
		LEFT JOIN list_permission AS lp ON lp.pg_id = lpg.pg_id
		WHERE
		lpg.status_pg<>0 AND lp.status_p<>0 AND lpg.del_flag<>1 AND lp.del_flag<>1 AND lpgl.g_id='{$recLoad[0]['g_id']}' ORDER BY lp.p_id ASC";
		$excSel = $this->db->query($list_permission_group);
		$recSel = $excSel->result_array();
		return $recSel;
	}
	public function sending_data_edit_user($data)
	{
		$sid = $this->session->userdata('sessUsr');
		if ($data['E_password'] == '') {
			$this->db->set('g_id', $data['E_group']);
			$this->db->set('dep_id', $data['E_department']);
			$this->db->set('f_name', $data['E_fname']);
			$this->db->set('l_name', $data['E_lname']);
			$this->db->set('email', $data['E_email']);
			$this->db->set('id_line_phon', $data['E_line_id']);
			$this->db->set('date_update', 'NOW()', FALSE);
			$this->db->set('update_by', $sid);
			$this->db->where('user_id', $data['E_user_id']);
			$sending_data_edit_user = $this->db->update('list_user');
		} else if ($data['E_password'] != '') {
			$this->db->set('g_id', $data['E_group']);
			$this->db->set('dep_id', $data['E_department']);
			$this->db->set('f_name', $data['E_fname']);
			$this->db->set('l_name', $data['E_lname']);
			$this->db->set('email', $data['E_email']);
			$this->db->set('id_line_phon', $data['E_line_id']);
			$this->db->set('pass', base64_encode(trim($data['E_password'])));
			$this->db->set('date_update', 'NOW()', FALSE);
			$this->db->set('update_by', $sid);
			$this->db->where('user_id', $data['E_user_id']);
			$sending_data_edit_user = $this->db->update('list_user');
		}

		$this->db->where_in('user_id', $data['E_user_id']);
		$disable_per_user = $this->db->delete('list_permission_list');


		if ($disable_per_user === true) {
			## User Permission 
			$sqlSelPerm = "SELECT
		lp.p_id,
		lp.p_name
		FROM
		list_permission_group_list AS lpgl
		LEFT JOIN list_permission_group AS lpg ON lpg.pg_id = lpgl.pg_id
		LEFT JOIN list_permission AS lp ON lp.pg_id = lpg.pg_id
		WHERE lpg.status_pg<>0 AND lp.status_p<>0 AND lpgl.g_id='{$data['E_group']}'";
			$excSelPerm = $this->db->query($sqlSelPerm);

			$result_p = $excSelPerm->result_array();
			foreach ($result_p as $p) {


				$this->db->set('user_id', $data['E_user_id']);
				$this->db->set('p_id', $p['p_id']);
				$this->db->set('update_by', $sid);
				$this->db->set('date_update', 'NOW()', FALSE);

				$excInsPerm = $this->db->insert('list_permission_list');
			}
		}

		if ($sending_data_edit_user || $excInsPerm) {
			return true;
		} else {
			return false;
		}
	}
	public function get_data_edit_user($user_id)
	{
		$sqlLoad = "SELECT lu.*,lg.g_name FROM list_user AS lu LEFT JOIN list_group AS lg ON lg.g_id = lu.g_id WHERE lu.del_flag<>1 AND lu.status_user<>0 AND lu.user_id = '$user_id'";
		$excLoad = $this->db->query($sqlLoad);
		$recLoad = $excLoad->result_array();
		return $recLoad;
	}
	public function get_group()
	{
		$sqlLoad = "SELECT * FROM list_group WHERE g_id<>0 AND status_g<>0 AND del_flag<>1";
		$excLoad = $this->db->query($sqlLoad);
		$recLoad = $excLoad->result_array();
		return $recLoad;
	}
	public function department_data()
	{
		$sqlLoad = "SELECT * FROM list_department WHERE dep_id<>0 AND status_dep<>0 AND del_flag<>1";
		$excLoad = $this->db->query($sqlLoad);
		$recLoad = $excLoad->result_array();
		return $recLoad;
	}
	public function reUser($user_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('status_user', '1');
		$this->db->set('del_flag', '0');
		$this->db->set('update_by', $sid);
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->where('user_id', $user_id);
		$exc_user = $this->db->update('list_user');

		if ($exc_user) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function deleteUser($user_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('status_user', '0');
		$this->db->set('del_flag', '1');
		$this->db->set('date_delete', 'NOW()', FALSE);
		$this->db->set('del_by', $sid);
		$this->db->where('user_id', $user_id);
		$exc_user = $this->db->update('list_user');

		if ($exc_user) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function enableUser($user_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('status_user', '1');
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->set('update_by', $sid);
		$this->db->where('user_id', $user_id);
		$exc_user = $this->db->update('list_user');

		if ($exc_user) {

			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function disableUser($user_id)
	{
		$sid = $this->session->userdata('sessUsr');
		$this->db->set('status_user', '0');
		$this->db->set('date_update', 'NOW()', FALSE);
		$this->db->set('update_by', $sid);
		$this->db->where('user_id', $user_id);
		$exc_user = $this->db->update('list_user');
		if ($exc_user) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function CheckPermissions($user_id, $per_u)
	{
		$sqlChkPerm = "SELECT
		lp.p_name,
		lp.controller
		FROM
		list_permission_list AS lpl
		INNER JOIN list_permission AS lp ON lp.p_id = lpl.p_id
		LEFT JOIN list_permission_group AS lpg ON lp.pg_id = lpg.pg_id
		WHERE
		lp.status_p<>0 AND lpg.status_pg<>0 AND lp.del_flag<>1 AND lpg.del_flag<>1 AND lpl.user_id='$user_id' AND lp.controller='$per_u'";

		$excChkPerm = $this->db->query($sqlChkPerm);
		$numChkPerm = $excChkPerm->num_rows();

		if ($numChkPerm == 0) {
			return false;
			exit();
		} else {
			return true;
			exit();
		}
	}
	public function CheckPermissions2($user_id, $per)
	{
		$sqlChkPerm = "SELECT
		lp.p_name,
		lp.controller
		FROM
		list_permission_list AS lpl
		INNER JOIN list_permission AS lp ON lp.p_id = lpl.p_id
		LEFT JOIN list_permission_group AS lpg ON lp.pg_id = lpg.pg_id
		WHERE
		lp.status_p<>0 AND lpg.status_pg<>0 AND lp.del_flag<>1 AND lpg.del_flag<>1 AND lpl.user_id='$user_id' AND lp.controller='$per'";

		$excChkPerm = $this->db->query($sqlChkPerm);
		$numChkPerm = $excChkPerm->num_rows();

		if ($numChkPerm == 0) {
			return false;
			exit();
		} else {
			return true;
			exit();
		}
	}
	public function get_department()
	{
		$sqlLoad = "SELECT * FROM list_department WHERE dep_id<>0 AND status_dep<>0 AND del_flag<>1";
		$excLoad = $this->db->query($sqlLoad);
		$recLoad = $excLoad->result_array();
		return $recLoad;
	}
	public function datauser($search_department, $user, $user_id, $department_id)
	{
		$per_u = 'permission_search';
		$CheckPermissions = $this->CheckPermissions($user_id, $per_u);
		if ($CheckPermissions == true) {

			if ($search_department == 'All') {
				$sqlSel = "SELECT
				lu.*,
				CONCAT( lu.f_name, ' ', lu.l_name ) AS full_name,
				lg.g_name AS g_name,
				ld.dep_name AS dep_name 
			    FROM
				`list_user` AS lu
				LEFT JOIN list_group AS lg ON lu.g_id = lg.g_id
				LEFT JOIN list_department AS ld ON lu.dep_id = ld.dep_id 
			    WHERE
				lu.user_id <> 1 
				AND lu.g_id <> ''
				AND lu.employee <> '$user' 
				AND lu.user_id <> '$user_id' 
			    ORDER BY
				ld.dep_id ASC";
			} else {
				$sqlSel = "SELECT
				lu.*,
				CONCAT( lu.f_name, ' ', lu.l_name ) AS full_name,
				lg.g_name AS g_name,
				ld.dep_name AS dep_name 
			    FROM
				`list_user` AS lu
				LEFT JOIN list_group AS lg ON lu.g_id = lg.g_id
				LEFT JOIN list_department AS ld ON lu.dep_id = ld.dep_id 
			    WHERE
				lu.user_id <> 1 
				AND lu.g_id <> ''
				AND lu.employee <> '$user' 
				AND lu.user_id <> '$user_id' 
				AND lu.dep_id = '$search_department'
			    ORDER BY
				ld.dep_id ASC";
			}
		} else {
			$sqlSel = "SELECT
			lu.*,
			CONCAT( lu.f_name, ' ', lu.l_name ) AS full_name,
			lg.g_name AS g_name,
			ld.dep_name AS dep_name 
			FROM
			`list_user` AS lu
			LEFT JOIN list_group AS lg ON lu.g_id = lg.g_id
			LEFT JOIN list_department AS ld ON lu.dep_id = ld.dep_id 
			WHERE
			lu.user_id <> 1 
			AND lu.g_id <> ''
			AND lu.employee <> '$user' 
			AND lu.user_id <> '$user_id' 
			AND lu.dep_id = '$department_id'
			ORDER BY
			ld.dep_id ASC";
		}
		$excSel = $this->db->query($sqlSel);
		$recSel = $excSel->result_array();
		return $recSel;
	}
	public function check_pass($username, $pass)
	{
		$password = base64_encode(trim($pass));
		$username = trim($username);

		$sqlSel = "SELECT lu.*,lg.order_g,lg.g_name,ld.dep_name FROM `list_user` AS lu LEFT JOIN list_group AS lg ON lg.g_id = lu.g_id LEFT JOIN list_department AS ld ON ld.dep_id = lu.dep_id WHERE lu.employee = '$username' AND lu.pass = '$password'";
		$query = $this->db->query($sqlSel);
		$result = $query->result_array();
		// return $username;
		// return $result[0]['password'];
		// exit;
		if ($query->num_rows() != 0) {
			if ($result[0]['employee'] == $username && $result[0]['pass'] == $password) {
				// return 'suc_pass';
				$per_u = 'menu_home';
				$CheckPermissions = $this->CheckPermissions($result[0]['user_id'], $per_u);
				if ($CheckPermissions === true) {
					$this->db->set('last_login', 'NOW()', FALSE);
					$this->db->where('user_id', $result[0]['user_id']);
					$exc_dep = $this->db->update('list_user');
					return array('action' => 'suc_pass_menu', $result[0]);
					exit;
				} else {
					$this->db->set('last_login', 'NOW()', FALSE);
					$this->db->where('user_id', $result[0]['user_id']);
					$exc_dep = $this->db->update('list_user');
					return array('action' => 'suc_pass', $result[0]);
					exit;
				}
			}
		} else {
			return 'error_pass';
			exit;
		}
	}
	public function check_user($username)
	{

		$sqlSel = "SELECT * FROM `list_user` WHERE employee = '$username'";
		$query = $this->db->query($sqlSel);
		$result = $query->result_array();

		if ($query->num_rows() != 0) {
			if ($result[0]['del_flag'] == 1) {
				return 'delete_account';
				exit;
			} else if ($result[0]['status_user'] == 0) {
				return 'ban_account';
				exit;
			} else if ($result[0]['status_user'] == 1 && $result[0]['del_flag'] == 0) {
				return 'suc_account';
				exit;
			}
		} else {
			return 'account_no_data';
		}
	}
	public function ShowMenu($key)
	{
		$sqlGroupMenu = "";
		$sqlGroupMenu = "SELECT
		lmg.menu_g_name AS g_name,
		lmg.icon_menu_g,
		lmg.menu_g_id,
		lmg.order_no 
			FROM
		list_menu_group AS lmg
		LEFT JOIN list_menu AS lm ON lmg.menu_g_id = lm.menu_g_id 
			WHERE
		lm.p_id IS NULL 
		OR lm.p_id IN (	SELECT	lpl.p_id FROM list_permission_list AS lpl LEFT JOIN list_permission AS lp ON lpl.p_id = lp.p_id LEFT JOIN list_permission_group AS lpg ON lpg.pg_id = lp.pg_id WHERE lpl.user_id = '$key' AND lm.status_menu <> 0 AND lmg.status_menu_g <> 0 AND lp.status_p <> 0 AND lp.del_flag <> 1 AND lpg.status_pg<>0 AND lpg.del_flag<>1 AND lpg.pg_id IN (	SELECT	lpgl.pg_id FROM list_permission_group_list AS lpgl)) 
			GROUP BY
		lmg.menu_g_name,
		lmg.icon_menu_g,
		lm.menu_g_id,
		lmg.order_no 
			ORDER BY
		lmg.order_no ASC ";




		$excGroupMenu = $this->db->query($sqlGroupMenu);

		$result = array();
		foreach ($excGroupMenu->result_array() as $gm) {


			$sqlSubMenu = "";
			$sqlSubMenu = "SELECT
			lm.* 
				FROM
			list_menu AS lm
			LEFT JOIN list_menu_group AS lmg ON lmg.menu_g_id = lm.menu_g_id 
				WHERE
			lm.menu_g_id = '{$gm['menu_g_id']}' 
			AND lm.status_menu<>0 
			AND (
				lm.p_id IS NULL 
			OR lm.p_id IN ( SELECT lpl.p_id FROM list_permission_list AS lpl LEFT JOIN list_permission AS lp ON lp.p_id = lpl.p_id WHERE lp.status_p<>0 AND lp.del_flag<>1 AND lpl.user_id = '$key' )) 
				ORDER BY
			lmg.order_no ASC,
			lm.order_no ASC ";


			$excSubMenu = $this->db->query($sqlSubMenu);

			$subMenu = array();
			foreach ($excSubMenu->result_array() as $sm) {

				array_push($subMenu, array('name' => $sm['menu_name'], 'method' => $sm['method'], 'link' => $sm['link']));
			}

			array_push($result, array('g_name' => $gm['g_name'], 'icon_menu' => $gm['icon_menu_g'], 'sub_menu' => $subMenu));
		}
		// exit;
		return $result;
	}
}
