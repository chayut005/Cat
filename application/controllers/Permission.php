<?php defined('BASEPATH') or exit('No direct script access allowed');

class Permission extends CI_Controller
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
    public function Manage_permission()
    {
        $this->assist_backend->checksession();
        $setTitle = strtoupper(str_replace('_', ' ', $this->router->fetch_method()));
        $this->template->write('page_title', ' CAT | ' . $setTitle . '');
        $this->template->write_view('page_header', 'all/' . $this->theme . '/view_header.php');
        $this->template->write_view('page_menu', 'all/' . $this->theme . '/view_menu.php');
        $this->template->write_view('page_content', 'all/' . $this->theme . '/view_manage_permission.php');
        $this->template->write_view('page_footer', 'all/' . $this->theme . '/view_footer.php');
        $this->template->render();
    }
    public function data_permission()
    {
        $this->assist_backend->checksession();
        $datatable = $this->assist_backend->data_permission();
        $table = array("data" => $datatable);
        echo json_encode($table);
    }
    public function create_permission()
    {
        $action = base64_decode($this->input->post('action'));

        if ($action == 'create_permission') {



            $this->form_validation->set_error_delimiters('<p>', '</p>');

            $this->form_validation->set_rules('permission_name', 'Permission name', 'trim|required|min_length[3]|max_length[128]|is_unique[list_permission.p_name]');
            $this->form_validation->set_rules('controller_method', 'Controller/Method', 'trim|required|min_length[3]|max_length[128]|is_unique[list_permission.controller]');
            // $this->form_validation->set_rules('group_permission', 'Permission Group', 'trim|required');

            $this->form_validation->set_rules("status_permission", "Status", "trim");

            $this->form_validation->set_message('required', '%s ไม่มีข้อมูล กรุณาตรวจสอบ');
            $this->form_validation->set_message('min_length', '%s ต้องมีมากว่า 3 ตัว');
            $this->form_validation->set_message('max_length', '%s ต้องมีไม่เกิน 128 ตัว');
            $this->form_validation->set_message('is_unique', '%s มีชื่อนี้อยู่แล้ว');



            $this->form_validation->set_message('is_natural_no_zero', 'กรุณาทำการตรวจสอบ %s ด้วย');

            if ($this->form_validation->run() == FALSE) {
                echo json_encode(validation_errors());
                exit;
            } else {
                $data['permission_name'] = $this->input->post('permission_name');
                $data['controller_method'] = $this->input->post('controller_method');
                $data['group_permission'] = $this->input->post('group_permission');
                $data['status_permission'] = $this->input->post('status_permission');

                $this->assist_backend->checksession();
                $create_permission_group = $this->assist_backend->create_permission($data);
                echo json_encode($create_permission_group);
                exit;
            }
        } else {
        }
    }
    public function disable_permission()
    {
        $permission_id = $_POST['permission_id'];
        $checkSess = $this->assist_backend->CheckSession();
        // $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));
        $result = $this->assist_backend->disable_permission($permission_id);
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
    public function enable_permission()
    {
        $permission_id = $_POST['permission_id'];
        $checkSess = $this->assist_backend->CheckSession();
        // $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));
        $result = $this->assist_backend->enable_permission($permission_id);
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
    public function re_permission()
    {
        $permission_id = $_POST['permission_id'];
        $checkSess = $this->assist_backend->CheckSession();
        // $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));
        $result = $this->assist_backend->re_permission($permission_id);
        if ($result == true) {
            $reply_re = "";
            $reply_re = array('reply' => $result, 'html' => 'Enable สำเร็จ', 'html_eng' => 'Enable Success');
            echo json_encode($reply_re);
            exit;
        } else if ($result == false) {
            $reply_re = "";
            $reply_re = array('reply' => $result, 'html' => 'ไม่สามารถ Enable ได้', 'html_eng' => 'Can"t Enable');
            echo json_encode($reply_re);
            exit;
        }
    }
    public function data_edit_permission()
    {
        $permission_id = $_POST['permission_id'];
        $checkSess = $this->assist_backend->CheckSession();
        // $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));
        $data_edit_permission = $this->assist_backend->data_edit_permission($permission_id);
        echo json_encode($data_edit_permission);
    }
    public function edit_permission()
    {
        $action = base64_decode($this->input->post('action'));


        if ($action == 'edit_permission') {



            $this->form_validation->set_error_delimiters('<p>', '</p>');

            $this->form_validation->set_rules('E_permission_name', 'Permission name', 'trim|required|min_length[3]|max_length[128]');
            $this->form_validation->set_rules('E_controller_method', 'Controller/Method', 'trim|required|min_length[3]|max_length[128]');
            // $this->form_validation->set_rules('E_group_permission', 'Permission Group', 'trim|is_natural_no_zero');
            $this->form_validation->set_rules('E_permission_id', 'Permission id', 'trim|is_natural_no_zero');


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
                $data['E_permission_name'] = $this->input->post('E_permission_name');
                $data['E_controller_method'] = $this->input->post('E_controller_method');
                $data['E_group_permission'] = $this->input->post('E_group_permission');
                $data['E_permission_id'] = $this->input->post('E_permission_id');


                $this->assist_backend->checksession();
                $edit_permission = $this->assist_backend->edit_permission($data);
                echo json_encode($edit_permission);
            }
        } else {
        }
    }
    public function delete_permission()
    {
        $permission_id = $_POST['permission_id'];
        $checkSess = $this->assist_backend->CheckSession();
        // $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));
        $result = $this->assist_backend->delete_permission($permission_id);
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
}
