<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends MY_Controller {

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

    public function add()
    {
        $data = array('title' => 'add project');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('os[]', 'OS', 'required');
        $this->form_validation->set_rules('area[]', 'area', 'required');
        $this->form_validation->set_rules('producer[]', 'producer', 'required');

        if ($this->form_validation->run() == FALSE)
        {

            $this->load->view('admin/header', $data);
            $this->load->view('admin/project_add');
            $this->load->view('admin/footer');
        }
        else
        {
            $this->load->model('project_model', 'project');
            $this->project->insert();
            redirect(site_url());
        }
    }

    public function test_show($page=1)
    {
        $this->load->model('project_model', 'project');
        $per_page = 5;
        $this->load->library('pagination');

        $config['base_url'] = base_url().'project/test_show';
        $config['total_rows'] = $this->project->count();
        $config['per_page'] = $per_page;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);

        $projects = $this->project->get($page, $per_page);
        $data = array();
        $data['pagination'] = $this->pagination->create_links();
        $data['projects'] = $projects;

        $this->load->view('admin/header', $data);
        $this->load->view('admin/test_show');
        $this->load->view('admin/footer');

    }

    public function test_show_id($project_id)
    {
        $this->load->model('project_model', 'project');
        $this->load->model('node_model', 'node');
        $project = $this->project->get_by_id($project_id);
        if (empty($project)) {
            show_404();
        }

        $nodes = $this->node->get_by_pid($project_id);
        $data = array('project'=>$project,
                      'nodes' => $nodes);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/test_show_id');
        $this->load->view('admin/footer');

    }
}
