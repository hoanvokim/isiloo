<?php

/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 06.11.18
 * Time: 10:42
 */
class Employee_model extends Entity_model
{

    public $table_name = "employee";

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($name, $img)
    {
        $data = array(
            'name' => $name,
            'img' => $img
        );

        $this->db->insert($this->table_name, $data);
    }

    public function update($id, $name, $img)
    {
        $data = array(
            'name' => $name,
            'img' => $img
        );
        $this->db->where('id', $id);
        $this->db->update($this->table_name, $data);
    }
}
