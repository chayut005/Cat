<?php defined('BASEPATH') or exit('No direct script access allowed');

class Department extends CI_Controller
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
    public function Manage_Department()
    {
        $this->assist_backend->checksession();
        $setTitle = strtoupper(str_replace('_', ' ', $this->router->fetch_method()));
        $this->template->write('page_title', ' CAT | ' . $setTitle . '');
        $this->template->write_view('page_header', 'all/' . $this->theme . '/view_header.php');
        $this->template->write_view('page_menu', 'all/' . $this->theme . '/view_menu.php');
        $this->template->write_view('page_content', 'all/' . $this->theme . '/view_manage_department.php');
        $this->template->write_view('page_footer', 'all/' . $this->theme . '/view_footer.php');
        $this->template->render();
    }
    public function data_department_table()
    {
        $this->assist_backend->checksession();
        $datatable = $this->assist_backend->data_department_table();

        $i = 0;
        foreach ($datatable as $data_time) {
            $data_e = '';
            $h_e = '';
            $m_e = '';

            $all_to_m = $data_time['time_dep'] / 60;
            $myArray_dep = explode('.', $all_to_m);
            $h_e = $myArray_dep[0];
            $m_e = $data_time['time_dep'] - ($h_e * 60);

            if ($h_e < '24') {
                $data_e = '0';
            } else {
                $aa = $h_e / 24;
                $myArray_d = explode('.', $aa);
                $data_e =  $myArray_d[0];
                $h_e =  $myArray_dep[0]-($data_e*24);
            }
            $datatable[$i]['date_e'] = $data_e;
            $datatable[$i]['h_e'] = $h_e;
            $datatable[$i]['m_e'] = $m_e;
            $i++;
        }

        $table = array("data" => $datatable);
        echo json_encode($table);
    }
    public function create_department()
    {
        $action = base64_decode($this->input->post('action'));


        if ($action == 'create_department') {



            $this->form_validation->set_error_delimiters('<p>', '</p>');

            $this->form_validation->set_rules('department_name', 'Department name', 'trim|required|min_length[2]|max_length[128]');
            $this->form_validation->set_rules("status_dep", "Status", "trim");

            $this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณากรอกข้อมูล  ');
            $this->form_validation->set_message('min_length', '%s ต้องมีมากว่า 2 ตัว');
            $this->form_validation->set_message('max_length', '%s ต้องมีไม่เกิน 128 ตัว');


            $this->form_validation->set_message('is_natural_no_zero', 'กรุณาทำการตรวจสอบ %s ด้วย', '%s error');

            if ($this->form_validation->run() == FALSE) {
                echo json_encode(validation_errors());
            } else {
                // echo json_encode($action);
                // exit;
                $data['department_name'] = $this->input->post('department_name');
                $date = $this->input->post('department_date');
                $h = $this->input->post('department_time_h');
                $m = $this->input->post('department_time_m');


                $d_to_h = $date * 24;
                $d_to_h_to_m = $d_to_h * 60;

                $h_to_min = $h * 60;
                // $m_to_m_d = substr($dep_time, 3, 2);
                $all_m_dep = $d_to_h_to_m + $h_to_min + $m;
                $data['time_dep'] =  $all_m_dep;


                $data['status_dep'] = $this->input->post('status_dep');
                $this->assist_backend->checksession();
                $create_department = $this->assist_backend->create_department($data);
                echo json_encode($create_department);
            }
        }
    }
    public function disable_dep()
    {
        $dep_id = $_POST['dep_id'];
        $checkSess = $this->assist_backend->CheckSession();
        // $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));
        $result = $this->assist_backend->disable_dep($dep_id);
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
    public function enable_dep()
    {
        $dep_id = $_POST['dep_id'];
        $checkSess = $this->assist_backend->CheckSession();
        // $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));
        $result = $this->assist_backend->enable_dep($dep_id);
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
    public function delete_dep()
    {
        $dep_id = $_POST['dep_id'];
        $checkSess = $this->assist_backend->CheckSession();
        // $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));
        $result = $this->assist_backend->delete_dep($dep_id);
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
    public function re_dep()
    {
        $dep_id = $_POST['dep_id'];
        $checkSess = $this->assist_backend->CheckSession();
        // $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));
        $result = $this->assist_backend->re_dep($dep_id);
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
    public function data_update_department()
    {
        $dep_id = $_POST['dep_id'];
        $checkSess = $this->assist_backend->CheckSession();
        $data_update_department = $this->assist_backend->data_update_department($dep_id);
        $i = 0;
        foreach ($data_update_department as $data_time) {
            $data_e = '';
            $h_e = '';
            $m_e = '';

            $all_to_m = $data_time['time_dep'] / 60;
            $myArray_dep = explode('.', $all_to_m);
            $h_e = $myArray_dep[0];
            $m_e = $data_time['time_dep'] - ($h_e * 60);

            if ($h_e < '24') {
                $data_e = '0';
            } else {
                $aa = $h_e / 24;
                $myArray_d = explode('.', $aa);
                $data_e =  $myArray_d[0];
                $h_e =  $myArray_dep[0]-($data_e*24);
            }
            $data_update_department[$i]['date_e'] = $data_e;
            $data_update_department[$i]['h_e'] = $h_e;
            $data_update_department[$i]['m_e'] = $m_e;
            $i++;
        }
        echo json_encode($data_update_department);
    }
    public function update_department()
    {
        $action = base64_decode($this->input->post('action'));


        if ($action == 'update_department') {



            $this->form_validation->set_error_delimiters('<p>', '</p>');

            $this->form_validation->set_rules('u_department_name', 'Department name', 'trim|required|min_length[2]|max_length[128]');

            $this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณากรอกข้อมูล  ');
            $this->form_validation->set_message('min_length', '%s ต้องมีมากว่า 2 ตัว');
            $this->form_validation->set_message('max_length', '%s ต้องมีไม่เกิน 128 ตัว');


            $this->form_validation->set_message('is_natural_no_zero', 'กรุณาทำการตรวจสอบ %s ด้วย', '%s error');

            if ($this->form_validation->run() == FALSE) {
                echo json_encode(validation_errors());
            } else {
                // echo json_encode($action);
                // exit;
                $data['u_department_name'] = $this->input->post('u_department_name');

                $date = $this->input->post('u_department_date');
                $h = $this->input->post('u_department_time_h');
                $m = $this->input->post('u_department_time_m');


                $d_to_h = $date * 24;
                $d_to_h_to_m = $d_to_h * 60;

                $h_to_min = $h * 60;
                $all_m_dep = $d_to_h_to_m + $h_to_min + $m;
                $data['time_dep_reply'] =  $all_m_dep;


                $data['u_department_id'] = $this->input->post('u_department_id');
                $this->assist_backend->checksession();
                $update_department = $this->assist_backend->update_department($data);
                echo json_encode($update_department);
            }
        }
    }





























    public function edit_group()
    {
        $action = base64_decode($this->input->post('action'));


        if ($action == 'edit_group') {

            $this->form_validation->set_error_delimiters('<p>', '</p>');

            $this->form_validation->set_rules('E_group_name', 'Group name', 'trim|required|min_length[3]|max_length[128]');
            $this->form_validation->set_rules("E_group_id", "Group id", "trim|is_natural_no_zero");

            $this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณากรอกข้อมูล  ');
            $this->form_validation->set_message('min_length', '%s ต้องมีมากว่า 3 ตัว');
            $this->form_validation->set_message('max_length', '%s ต้องมีไม่เกิน 128 ตัว');


            $this->form_validation->set_message('is_natural_no_zero', 'กรุณาทำการตรวจสอบ %s ด้วย');

            if ($this->form_validation->run() == FALSE) {
                echo json_encode(validation_errors());
            } else {
                // echo json_encode($action);
                // exit;
                $data['group_name'] = $this->input->post('E_group_name');
                $data['group_id'] = $this->input->post('E_group_id');
                $data['rule'] = $this->input->post('chkRid');
                $this->assist_backend->checksession();
                $edit_group = $this->assist_backend->create_and_edit_RuleUserGroup($data);
                echo json_encode($edit_group);
            }
        }
    }
}
