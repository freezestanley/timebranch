<?php

class Type_model extends CI_Model {
    var $tid = '';
    var $name = '';

    public function get()
    {
        $query = $this->db->get('type');
        return $query->result();
    }
}
