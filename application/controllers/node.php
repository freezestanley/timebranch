<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Node extends MY_Controller {

    function __construct()
    {
        parent::__construct();

        $this->check_login();
        if (!$this->check_admin()) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $this->load->view('welcome_message');
    }

    public function add($project_id)
    {
        $this->load->model('project_model', 'project');
        $project = $this->project->get_by_id($project_id);
        if (empty($project)) {
            show_404();
        }
        $data = array('title' => 'add node');
        $this->load->model('type_model', 'type');

        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('deadline_time', 'Deadline', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $data['types'] = $this->type->get();
            $data['project'] = $project;
            $this->load->view('admin/header', $data);
            $this->load->view('admin/node_add');
            $this->load->view('admin/footer');
        }
        else
        {
            $this->load->model('node_model', 'node');
            $this->node->insert($project_id);
            redirect(site_url());
        }
    }

    public function update($node_id)
    {
        $this->load->model('node_model', 'node');
        $this->load->model('project_model', 'project');
        $node = $this->node->get_by_id($node_id);

        if (empty($node)) {
            show_404();
        }
        $project = $this->project->get_by_id($node->pid);

        $data = array('title' => 'update node');

        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('update_time', 'Update time', 'required');

        if ($this->form_validation->run() == FALSE)
        {

            $data['node'] = $node;
            $data['project'] = $project;
            $this->load->view('admin/header', $data);
            $this->load->view('admin/node_update');
            $this->load->view('admin/footer');
        }
        else
        {
            $this->load->model('update_model', 'update');
            $this->update->insert($node_id);
            redirect(site_url());
        }
    }

    public function history($node_id)
    {
        $this->load->model('node_model', 'node');
        $this->load->model('update_model', 'update');

        $node = $this->node->get_by_id($node_id);
        if (empty($node)) {
            show_404();
        }
        $history = $this->update->get_by_nid($node_id);
        $this->output
        ->set_content_type('application/json');
        echo json_encode(array('data'=>$history));
    }
}
