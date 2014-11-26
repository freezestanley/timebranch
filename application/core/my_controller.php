<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function check_login($redirect=TRUE)
    {
        $user = $this->session->all_userdata();
        if (!isset($user['logged_in']) || $user['logged_in'] != TRUE) {
            redirect(site_url().'login', 'location', 302);
            // return FALSE;
        } else {
            return $user;
        }
    }

    public function check_admin()
    {
        $user = $this->session->all_userdata();
        $this->load->model('admin_model', 'admin');
        return $this->admin->is_admin($user['uid']);
    }
}
