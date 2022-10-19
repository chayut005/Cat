<?php defined('BASEPATH') or exit('No direct script access allowed');

class Group extends CI_Controller
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
    public function Manage_Group()
    {
        $this->assist_backend->checksession();
        $setTitle = strtoupper(str_replace('_', ' ', $this->router->fetch_method()));
        $this->template->write('page_title', ' CAT | ' . $setTitle . '');
        $this->template->write_view('page_header', 'all/' . $this->theme . '/view_header.php');
        $this->template->write_view('page_menu', 'all/' . $this->theme . '/view_menu.php');
        $this->template->write_view('page_content', 'all/' . $this->theme . '/view_manage_group.php');
        $this->template->write_view('page_footer', 'all/' . $this->theme . '/view_footer.php');
        $this->template->render();
    }
    public function data_group()
    {
        $this->assist_backend->checksession();
        $datatable = $this->assist_backend->datagroups();
        $table = array("data" => $datatable);
        echo json_encode($table);
    }
    public function create_group()
    {
        $action = base64_decode($this->input->post('action'));


        if ($action == 'create_group') {



            $this->form_validation->set_error_delimiters('<p>', '</p>');

            $this->form_validation->set_rules('group_name', 'Group name', 'trim|required|min_length[3]|max_length[128]|is_unique[list_group.g_name]');
            $this->form_validation->set_rules("status_group", "Status", "trim");

            $this->form_validation->set_message('is_unique', '%s มีชื่อนี้อยู่แล้ว');
            $this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณากรอกข้อมูล  ');
            $this->form_validation->set_message('min_length', '%s ต้องมีมากว่า 3 ตัว');
            $this->form_validation->set_message('max_length', '%s ต้องมีไม่เกิน 128 ตัว');


            $this->form_validation->set_message('is_natural_no_zero', 'กรุณาทำการตรวจสอบ %s ด้วย', '%s error');

            if ($this->form_validation->run() == FALSE) {
                echo json_encode(validation_errors());
            } else {
                // echo json_encode($action);
                // exit;
                $data['group_name'] = $this->input->post('group_name');
                $data['status_group'] = $this->input->post('status_group');
                $this->assist_backend->checksession();
                $create_group = $this->assist_backend->create_group($data);
                echo json_encode($create_group);
            }
        } else {
        }
    }
    public function disable_group()
    {
        $group_id = $_POST['group_id'];
        $checkSess = $this->assist_backend->CheckSession();
        // $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));
        $result = $this->assist_backend->disable_group($group_id);
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
    public function enable_group()
    {
        $group_id = $_POST['group_id'];
        $checkSess = $this->assist_backend->CheckSession();
        // $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));
        $result = $this->assist_backend->enable_group($group_id);
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
    public function delete_group()
    {
        $group_id = $_POST['group_id'];
        $checkSess = $this->assist_backend->CheckSession();
        // $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));
        $result = $this->assist_backend->delete_group($group_id);
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
    public function re_group()
    {
        $group_id = $_POST['group_id'];
        $checkSess = $this->assist_backend->CheckSession();
        // $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));
        $result = $this->assist_backend->re_group($group_id);
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
    public function data_edit_group()
    {
        $group_id = $_POST['group_id'];
        $checkSess = $this->assist_backend->CheckSession();
        // $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));
        $data_edit_group = $this->assist_backend->data_edit_group($group_id);
        echo json_encode($data_edit_group);
    }
    public function list_data_group_permission_group()
    {
        $group_id = $_POST['group_id'];
        $checkSess = $this->assist_backend->CheckSession();
        // $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));
        $list_data_group_permission_group = $this->assist_backend->list_data_group_permission_group($group_id);
        echo json_encode($list_data_group_permission_group);
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
    public function apply_group()
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
                $data['group_name'] = $this->input->post('E_group_name');
                $data['group_id'] = $this->input->post('E_group_id');
                $data['rule'] = $this->input->post('chkRid');
                $this->assist_backend->checksession();
                $edit_group = $this->assist_backend->create_and_edit_RuleUserGroup($data);
                $apply_group = $this->assist_backend->apply_permission_user($data);
                echo json_encode($apply_group);
            }
        }
    }
    public function data_order_group()
    {
        $this->assist_backend->checksession();
        $datatable = $this->assist_backend->data_order_groups();
        echo json_encode($datatable);
    }
    public function set_order_group()
    {
                $data['g_id'] = $_POST['g_id'];
                $data['order'] = $_POST['numberList'];
                $this->assist_backend->checksession();
                $set_order_group = $this->assist_backend->set_order_group($data);
                echo json_encode($set_order_group);
            
    }
}
