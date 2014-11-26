<?php

class Project_model extends CI_Model {
    var $pid = '';
    var $name = '';
    var $addtime = '';
    var $producer = '';
    var $area = '';
    var $os = '';
    var $ip = '';
    var $contract = '';
    var $issuer = '';
    var $type = '';
    var $operator = '';
    var $apply = '';
    var $remark = '';

    public function insert()
    {
        $this->name = $this->input->post('name');
        $this->addtime = time();
        $this->producer = $this->input->post('producer');
        $this->ip = $this->input->post('ip');
        $this->contract = $this->input->post('contract');
        $this->issuer = $this->input->post('issuer');
        $this->type = $this->input->post('type');
        $this->operator = $this->input->post('operator');
        $this->apply = $this->input->post('apply');
        $this->remark = $this->input->post('remark');


        $areas = $this->input->post('area');
        $oses = $this->input->post('os');

        foreach ($areas as $area) {
            foreach ($oses as $os) {
                $this->area = $area;
                $this->os = $os;
                $this->db->insert('project', $this);
            }
        }
    }

    public function get_by_id($project_id)
    {
        $query = $this->db->get_where('project', array('pid'=>$project_id), 1);
        return $query->row();
    }

    public function get($page, $per_page=10)
    {
        $page = ($page-1) * $per_page;
        $query = $this->db->get('project', $per_page, $page);

        return $query->result();
    }

    public function count()
    {
        return $this->db->count_all('project');
    }

    public function get_projects()
    {
        $this->db->select('name');
        $this->db->distinct('name');
        $query = $this->db->get('project');
        return $query->result();
    }

    public function filter($condition)
    {

        $sql = "select t.name as n_type, p.*, n.tid, n.deadline_time, u.update_time, n.nid, u.u_remark, u.update_time, p.addtime as p_addtime, n.addtime as n_addtime, p.type as p_type, p.remark as p_remark, n.remark as n_remark, u.u_addtime from PIPELINE_project as p left join PIPELINE_node as n on n.pid = p.pid left join (select PIPELINE_update.addtime as u_addtime, update_time, remark as u_remark, PIPELINE_update.nid from PIPELINE_update inner join (select max(addtime) as addtime, nid from PIPELINE_update group by nid) x on x.nid = PIPELINE_update.nid and x.addtime=PIPELINE_update.addtime) as u on u.nid = n.nid  left join PIPELINE_type as t on t.tid = n.tid where 1=1 ";

        if ($condition['name']) {
            $sql .= " and p.name = '" . $condition['name'] . "'";
        }
        if ($condition['os']) {
            $sql .= " and p.os = '" . $condition['os'] . "'";
        }
        if ($condition['area']) {
            $sql .= " and p.area = '" . $condition['area'] . "'";
        }

        if ($condition['startime']) {
            $sql .= " and update_time > '" . $condition['startime'] . "'";
        }

        if ($condition['deadtime']) {
            $sql .= " and update_time <= '" . $condition['deadtime'] . "'";
        }

        $query = $this->db->query($sql);
        return $query->result();
    }

}
