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
            // if (empty($project->update_time)) {
            //   $stime = $project->deadline_time;
            // } else {
            //   $stime = $project->update_time;
            // }
            $stime = $project->update_time;
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
      $_result = array();
      foreach ($result as $value) {
          $value->addtime = date('Y-m-d', $value->addtime);
          $_result[] = $value;
      }
      $this->json($result);
    }

    public function gantt()
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
        header('Content-Type: application/json');
        $result = json_encode($this->_gantt_filter($projects));
        echo $result;
        // echo str_replace('\/','/', $result);
        // $this->json($this->_gantt_filter($projects));
    }

    public function gantt_iframe()
    {
        $this->load->view('gantt.html');
    }

    public function _gantt_filter($projects)
    {
        $result = array();

        $games = array();

        foreach ($projects as $project) {
            if (!isset($games[$project->name])) {
                $games[$project->name] = array();
            }
        }

        foreach ($games as $key => $value) {
            foreach ($projects as $project) {
                if ($project->nid == null) {
                    continue;
                }
                if ($key == $project->name) {
                    $from = date('Y-m-d 23:59:59', strtotime($project->update_time));
                    $to = date('Y-m-d 00:00:00', strtotime($project->update_time));
                    $_node = array('id' => $project->pid,
                                   'from' => '/Date(' . strtotime($from) . '000)/',
                                   'to' => '/Date(' . strtotime($to) . '000)/',
                                   'label' => '',
                                   'desc' => '<b>' . $project->t_name . '</b><br/><small>' . $project->update_time .'</small>',
                                   'customClass' => $project->label_color);

                    if (isset($games[$key][$project->pid])) {
                        $games[$key][$project->pid]['values'][] = $_node;
                    } else {
                        $_project = array('name' => $project->name,
                                      'desc' => $project->area . '（' . $project->os . '）',
                                      'values' => array($_node));
                        $games[$key][$project->pid] = $_project;
                    }
                }
            }
        }

        foreach ($games as $key => $value) {
            $_temp = array();
            foreach ($value as $_key => $_value) {
                $_temp[] = $_value;
            }
            if (empty($_temp)) {
              continue;
            }
            $result[] = $_temp[0];
            for ($i = 1; $i < count($_temp); $i++) {
                $_temp[$i]['name'] = ' ';
                $result[] = $_temp[$i];
            }
        }
        return $result;
    }

    public function count()
    {
        $this->json($this->project->count_project_node());
    }
}
