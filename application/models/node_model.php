<?php

class Node_model extends CI_Model {
    var $nid = '';
    var $pid = '';
    var $tid = '';
    var $addtime = '';
    var $deadline_time = '';
    var $remark = '';

    public function insert($project_id)
    {

        $this->pid = $project_id;
        $this->tid = $this->input->post('type');
        $this->addtime = time();
        $this->deadline_time = $this->input->post('deadline_time');
        $this->remark = $this->input->post('remark');

        $this->db->insert('node', $this);
        $insert_id = $this->db->insert_id();

        $update = array('nid'=>$insert_id,
                        'type'=>0,
                        'addtime'=>time(),
                        'update_time'=>$this->deadline_time,
                        'remark'=>$this->remark);

        $this->db->insert('update', $update);
    }

    public function get_by_id($node_id)
    {
        $query = $this->db->get_where('node', array('nid'=>$node_id), 1);

        return $query->row();
    }

    public function get_by_pid($project_id)
    {
        $query = $this->db->get_where('node', array('pid'=>$project_id));

        return $query->result();
    }
}
