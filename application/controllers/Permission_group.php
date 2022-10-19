<?php defined('BASEPATH') or exit('No direct script access allowed');

class Permission_group extends CI_Controller
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
    public function Manage_permission_group()
    {
        $this->assist_backend->checksession();
        $setTitle = strtoupper(str_replace('_', ' ', $this->router->fetch_method()));
        $this->template->write('page_title', ' CAT | ' . $setTitle . '');
        $this->template->write_view('page_header', 'all/' . $this->theme . '/view_header.php');
        $this->template->write_view('page_menu', 'all/' . $this->theme . '/view_menu.php');
        $this->template->write_view('page_content', 'all/' . $this->theme . '/view_manage_permission_group.php');
        $this->template->write_view('page_footer', 'all/' . $this->theme . '/view_footer.php');
        $this->template->render();
    }
    public function data_permission_group()
    {
        $this->assist_backend->checksession();
        $datatable = $this->assist_backend->data_permission_group();
        $table = array("data" => $datatable);
        echo json_encode($table);
    }
    public function get_data_permission_group()
    {
        $checkSess = $this->assist_backend->CheckSession();
        $get_data_permission_group = $this->assist_backend->get_data_permission_group();
        echo json_encode($get_data_permission_group);
    }
    public function create_permission_group()
    {
        $action = base64_decode($this->input->post('action'));

        if ($action == 'create_permission_group') {



            $this->form_validation->set_error_delimiters('<p>', '</p>');

            $this->form_validation->set_rules('permission_group_name', 'Permission Group name', 'trim|required|min_length[3]|max_length[128]|is_unique[list_permission_group.pg_name]');
            $this->form_validation->set_rules("status_permission_group", "Status", "trim");

            $this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณากรอกข้อมูล  ');
            $this->form_validation->set_message('min_length', '%s ต้องมีมากว่า 3 ตัว');
            $this->form_validation->set_message('max_length', '%s ต้องมีไม่เกิน 128 ตัว');

            $this->form_validation->set_message('is_unique', '%s มีชื่อนี้อยู่แล้ว');
            $this->form_validation->set_message('is_natural_no_zero', 'กรุณาทำการตรวจสอบ %s ด้วย', '%s error');

            if ($this->form_validation->run() == FALSE) {
                echo json_encode(validation_errors());
            } else {
                $data['permission_group_name'] = $this->input->post('permission_group_name');
                $data['status_permission_group'] = $this->input->post('status_permission_group');
                $this->assist_backend->checksession();
                $create_permission_group = $this->assist_backend->create_permission_group($data);
                echo json_encode($create_permission_group);
            }
        } else {
        }
    }
    public function data_edit_permission_group()
    {
        $permission_group_id = $_POST['permission_group_id'];
        $checkSess = $this->assist_backend->CheckSession();
        // $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));
        $data_edit_permission_group = $this->assist_backend->data_edit_permission_group($permission_group_id);
        echo json_encode($data_edit_permission_group);
    }
    public function edit_permission_group()
    {
        $action = base64_decode($this->input->post('action'));


        if ($action == 'edit_permission_group') {



            $this->form_validation->set_error_delimiters('<p>', '</p>');

            $this->form_validation->set_rules('E_permission_group_name', 'Permission Group name', 'trim|required|min_length[3]|max_length[128]');
            $this->form_validation->set_rules('E_permission_group_id', 'Permission Group id', 'trim|is_natural_no_zero');


            $this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณากรอกข้อมูล  ');
            $this->form_validation->set_message('min_length', '%s ต้องมีมากว่า 3 ตัว');
            $this->form_validation->set_message('max_length', '%s ต้องมีไม่เกิน 128 ตัว');
            $this->form_validation->set_message('is_unique', '%s มีชื่อนี้อยู่แล้ว');


            $this->form_validation->set_message('is_natural_no_zero', 'กรุณาทำการตรวจสอบ %s ด้วย');

            if ($this->form_validation->run() == FALSE) {
                echo json_encode(validation_errors());
            } else {
                // echo json_encode($action);
                // exit;
                $data['E_permission_group_name'] = $this->input->post('E_permission_group_name');
                $data['E_permission_group_id'] = $this->input->post('E_permission_group_id');


                $this->assist_backend->checksession();
                $edit_permission_group = $this->assist_backend->edit_permission_group($data);
                echo json_encode($edit_permission_group);
            }
        } else {
        }
    }
    public function disable_permission_group()
    {
        $permission_group_id = $_POST['permission_group_id'];
        $checkSess = $this->assist_backend->CheckSession();
        // $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));
        $result = $this->assist_backend->disable_permission_group($permission_group_id);
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
    public function enable_permission_group()
    {
        $permission_group_id = $_POST['permission_group_id'];
        $checkSess = $this->assist_backend->CheckSession();
        // $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));
        $result = $this->assist_backend->enable_permission_group($permission_group_id);
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
    public function delete_permission_group()
    {
        $permission_group_id = $_POST['permission_group_id'];
        $checkSess = $this->assist_backend->CheckSession();
        // $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));
        $result = $this->assist_backend->delete_permission_group($permission_group_id);
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
    public function re_permission_group()
    {
        $permission_group_id = $_POST['permission_group_id'];
        $checkSess = $this->assist_backend->CheckSession();
        // $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));
        $result = $this->assist_backend->re_permission_group($permission_group_id);
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
    public function list_data_permission_group()
    {
        $checkSess = $this->assist_backend->CheckSession();
        $list_data_permission_group = $this->assist_backend->list_data_permission_group();
        echo json_encode($list_data_permission_group);
    }
}
