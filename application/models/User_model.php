<?php

/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 31.10.18
 * Time: 13:49
 */
class User_model extends MY_Model
{

    public $table_name = "user";

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($username, $password, $email)
    {
        $data = array(
            'username' => $username,
            'password' => MD5($password),
            'email' => $email
        );

        $this->db->insert($this->table_name, $data);
    }

    public function update($id, $username, $password, $email)
    {
        $data = array(
            'username' => $username,
            'password' => MD5($password),
            'email' => $email
        );
        $this->db->where('id', $id);
        $this->db->update($this->table_name, $data);
    }

    public function authenticate($username, $password)
    {
        $this->db->from($this->table_name);
        $this->db->where('username', $username);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        }
        return false;
    }
}
