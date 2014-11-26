<?php

class Admin_model extends CI_Model {
    var $aid = '';
    var $user_id = '';

    public function is_admin($user_id)
    {
        $query = $this->db->get_where('admin', array('user_id' => $user_id), 1);
        if ($query->row()) {
            return TRUE;
        }
        return FALSE;
    }
}
