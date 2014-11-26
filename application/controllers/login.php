<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()
    {
        $login_url = 'http://system.denachina.com/mobage_oa/index.php/user/login?from=others&others_url=' . site_url(). 'login/callback';
        redirect($login_url);
    }

    public function callback()
    {
        $uid = $this->input->get('uid');
        $nickname = $this->input->get('nickname');
        $dep = $this->input->get('department');
        $token = $this->input->get('token');
        $email = $this->input->get('email');
        $_token = md5(md5('c13[234@%!@$'.$uid));

        if ($token != $_token) {
            $data = array('title' => '登录失败',
                          'error' => '登录失败');
            $this->load->view('layout/header', $data);
            $this->load->view('login');
            $this->load->view('layout/footer');
        } else {
            $user = array('username' => urldecode($nickname),
                                               'uid' => $uid,
                                               'dep' => urldecode($dep),
                                               'email' => $email,
                                               'logged_in' => TRUE);
            $this->session->set_userdata($user);
            redirect('/', 'location', 301);

        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url(), 'location', 301);
    }
}
