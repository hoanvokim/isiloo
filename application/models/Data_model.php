<?php

/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 31.10.18
 * Time: 13:43
 */
class Data_model extends Entity_model
{

    public $table_name = "data_info";

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($keyname, $value)
    {
        $data = array(
            'keyname' => $keyname,
            'value' => $value
        );

        $this->db->insert($this->table_name, $data);
    }

    public function update($id, $keyname, $value)
    {
        $data = array(
            'keyname' => $keyname,
            'value' => $value
        );
        $this->db->where('id', $id);
        $this->db->update($this->table_name, $data);
    }

    public function findByKeyName($keyname)
    {
        $this->db->where('keyname', $keyname);
        return $this->db->get($this->table_name)->row();
    }
}
