<?php

class Update_model extends CI_Model {
    var $uid = '';
    var $nid = '';
    var $type = '';
    var $addtime = '';
    var $update_time = '';
    var $remark = '';

    public function insert($node_id)
    {
        $this->nid = $node_id;
        $this->type = $this->input->post('type');
        $this->addtime = time();
        $this->update_time = $this->input->post('update_time');
        $this->remark = $this->input->post('remark');

        $this->db->insert('update', $this);
        return $this->db->insert_id();
    }

    public function delete($node_id)
    {
        $this->db->set('type', 2);
        $this->db->where('nid', $node_id);
        $this->db->update('update');
    }

    public function get_by_nid($node_id)
    {
        $query = $this->db->get_where('update', array('nid'=>$node_id));
        return $query->result();
    }
}
