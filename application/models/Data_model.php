<?php

/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 31.10.18
 * Time: 13:43
 */
class Data_model extends MY_Model
{

    public $table_name = "data_info";

    public function __construct()
    {
        parent::__construct();
    }

    public function findAll()
    {
        return $this->db->get($this->table_name)->result();
    }

    public function insert($keyname, $value)
    {
        $data = array(
            'keyname' => $keyname,
            'value' => $value
        );

        $this->db->insert($this->table_name, $data);
    }

    public function update ($keyname, $value)
    {
        $data = array(
            'value' => $value
        );
        $this->db->where('keyname', $keyname);
        $this->db->update($this->table_name, $data);
    }

    public function findByKeyName($keyname)
    {
        $this->db->where('keyname', $keyname);
        return $this->db->get($this->table_name)->row();
    }

    public function updateIssilooInfo($value)
    {
        $data = array(
            'value' => $value
        );
        $this->db->where('keyname', 'issiloo-intro');
        $this->db->update($this->table_name, $data);
    }
}
