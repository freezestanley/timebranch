<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class API extends CI_Controller {

    public function json($data='', $status=TRUE, $err_msg='')
    {
        $result = array('data'=>$data, 'status'=>$status);
        if ($status !== TRUE) {
            $result['err_msg'] = $err_msg;
        }

        header('Content-Type: application/json');
        $callback = $this->input->get('cb');
        if (!empty($callback)) {
          echo $callback . '(' . json_encode($result) . ');';
        } else {
          echo json_encode($result);
        }
        exit;

    }

    function __construct()
    {
        parent::__construct();

        $this->load->model('project_model', 'project');
        $this->load->model('node_model', 'node');
        $this->load->model('update_model', 'update');
        $this->load->model('type_model', 'type');
    }

    // public function index()
    // {
    //     $this->load->view('welcome_message');
    // }

    public function filter()
    {
        $project_name = $this->input->get('gname');
        $project_os = $this->input->get('pf');
        $project_area = $this->input->get('market');
        $project_startime = $this->input->get('stime');
        $project_deadtime = $this->input->get('mtime');
        $page = $this->input->get('p');
        if (empty($page)) {
            $page = 1;
        }

        $condition = array('name' => $project_name,
                           'os' => $project_os,
                           'area' => $project_area,
                           'startime' => $project_startime,
                           'deadtime' => $project_deadtime,
                           );

        $projects = $this->project->filter($condition);
        // $page_data = $this->_paginate($this->_filter2($projects), $page, $per_page=2);
        $this->json($this->_filter2($projects));
    }

    public function _filter2($projects)
    {
        $result = array();

        foreach ($projects as $project) {
            // $stime = date('Y-m-d', $project->n_addtime);
            // 实际数据可能没有 node 只有 project
            if (empty($project->update_time)) {
              $stime = $project->deadline_time;
            } else {
              $stime = $project->update_time;
            }
            $mtime = $stime;
            if (empty($project->node_id)) {
              continue;
            }
            if (isset($result[$stime])) {
              $_task = array(//'nid' => $project->nid,
                             'reason' => $project->u_remark,
                             // 'type_id' => $project->tid,
                             'point' => $project->n_type,
                             'pf' => $project->os,
                             'stime' => $stime,
                             'mtime' => $mtime,
                             'market' => $project->area,
                             'gname' => $project->name,
                             'nid' => $project->node_id);
              $result[$stime][] = $_task;
            } else {
              $_task = array(//'nid' => $project->nid,
                             'reason' => $project->u_remark,
                             // 'type_id' => $project->tid,
                             'point' => $project->n_type,
                             'pf' => $project->os,
                             'stime' => $stime,
                             'mtime' => $mtime,
                             'market' => $project->area,
                             'gname' => $project->name,
                             'nid' => $project->node_id);
              $result[$stime] = array($_task);
            }
        }
        $_temp = array();
        foreach ($result as $key => $value) {
            $_temp[] = array('day'=>$key, 'task'=>$value);
        }
        return $_temp;
    }

    public function _filter($projects)
    {
        $result = array();
        $_temp = array();
        foreach ($projects as $project) {
            if (isset($_temp[$project->pid])) {
                $_node = array('nid' => $project->nid,
                               'remark' => $project->n_remark,
                               'update_remark' => $project->u_remark,
                               'type_id' => $project->tid,
                               'type' => $project->n_type,
                               'deadline' => $project->deadline_time,
                               'updatetime' => $project->update_time,
                               );
                $_temp[$project->pid]['nodes'][] = $_node;
            } else {
                $_node = array('nid' => $project->nid,
                               'remark' => $project->n_remark,
                               'update_remark' => $project->u_remark,
                               'type_id' => $project->tid,
                               'type' => $project->n_type,
                               'deadline' => $project->deadline_time,
                               'updatetime' => $project->update_time,
                               );
                if ($project->nid == null) {
                    $nodes = array();
                } else {
                    $nodes = array($_node);
                }
                $_temp[$project->pid] = array('nodes'=>$nodes,
                                              'name'=>$project->name,
                                              'os'=>$project->os,
                                              'area'=>$project->area,
                                              'ip'=>$project->ip,
                                              'contract'=>$project->contract,
                                              'issuer'=>$project->issuer,
                                              'issuer'=>$project->issuer,
                                              'type'=>$project->p_type,
                                              'operator'=>$project->operator,
                                              'apply'=>$project->apply,
                                              'remark'=>$project->p_remark,
                                              'pid'=>$project->pid,
                                              );
            }
        }

        return $_temp;
    }

    public function _paginate($data, $page, $per_page)
    {
        return array_slice($data, ($page-1)*$per_page, $per_page);
    }

    public function get_projects()
    {
        $projects = $this->project->get_projects();
        $this->json($projects);
    }

    public function history()
    {
      $nid = $this->input->get('nid');
      if ($nid == null) {
        show_404();
      }
      $this->load->model('update_model', 'update');
      $result = $this->update->get_by_nid($nid);
      $this->json($result);
    }
}
