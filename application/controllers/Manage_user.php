<?php defined('BASEPATH') or exit('No direct script access allowed');

class Manage_user extends CI_Controller
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
    public function Manage_user()
    {
        $data['str_validate'] = '';
        $this->assist_backend->checksession();

        $setTitle = strtoupper(str_replace('_', ' ', $this->router->fetch_method()));
        $this->template->write('page_title', ' CAT | ' . $setTitle . '');
        $this->template->write_view('page_header', 'all/' . $this->theme . '/view_header.php');
        $this->template->write_view('page_menu', 'all/' . $this->theme . '/view_menu.php');
        $this->template->write_view('page_content', 'all/' . $this->theme . '/view_manage_user.php', $data);
        $this->template->write_view('page_footer', 'all/' . $this->theme . '/view_footer.php');
        $this->template->render();
    }
    public function data_user()
    {
        $this->assist_backend->checksession();
        $search_department = $_POST['search_department'];
        $datatable = $this->assist_backend->datauser($search_department, $this->session->userdata('sessUsr'), $this->session->userdata('sessUsrId'), $this->session->userdata('sessDep'));
        $table = array("data" => $datatable);
        echo json_encode($table);
    }
    public function disable()
    {
        $user_id = $_POST['user_id'];
        $checkSess = $this->assist_backend->CheckSession();
        // $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));
        $result = $this->assist_backend->disableUser($user_id);
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
    public function enable()
    {
        $user_id = $_POST['user_id'];
        $checkSess = $this->assist_backend->CheckSession();
        // $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));
        $result = $this->assist_backend->enableUser($user_id);
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
    public function delete()
    {
        $user_id = $_POST['user_id'];
        $checkSess = $this->assist_backend->CheckSession();
        // $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));
        $result = $this->assist_backend->deleteUser($user_id);
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
    public function re_user()
    {
        $user_id = $_POST['user_id'];
        $checkSess = $this->assist_backend->CheckSession();
        // $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));
        $result = $this->assist_backend->reUser($user_id);
        if ($result == true) {
            $reply_delete = "";
            $reply_delete = array('reply' => $result, 'html' => 'Re user สำเร็จ', 'html_eng' => 'Re user Success');
            echo json_encode($reply_delete);
            exit;
        } else if ($result == false) {
            $reply_delete = "";
            $reply_delete = array('reply' => $result, 'html' => 'ไม่สามารถ Re user ได้', 'html_eng' => 'Can"t Re user');
            echo json_encode($reply_delete);
            exit;
        }
    }
    public function get_data_edit_user()
    {
        $user_id = $_POST['user_id'];
        $get_data_edit_user = $this->assist_backend->get_data_edit_user($user_id);
        echo json_encode($get_data_edit_user);
    }
    public function get_list_data_permission()
    {
        $user_id = $_POST['user_id'];
        $checkSess = $this->assist_backend->CheckSession();
        // $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));
        $result = $this->assist_backend->get_list_data_permission($user_id);
        echo json_encode($result);
    }
    public function get_list_data_permission_user()
    {
        $user_id = $_POST['user_id'];
        $checkSess = $this->assist_backend->CheckSession();
        // $this->connect_db->CheckPermission($this->session->userdata('sessUsrId'));
        $result = $this->assist_backend->list_permission_user($user_id);
        echo json_encode($result);
    }
}
