<?php

/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 31.10.18
 * Time: 11:42
 */
class Subject_model extends Entity_model
{

    public $table_name = "subject";

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($name)
    {
        $data = array(
            'name' => $name
        );

        $this->db->insert($this->table_name, $data);
    }

    public function update($id, $name)
    {
        $data = array(
            'name' => $name
        );
        $this->db->where('id', $id);
        $this->db->update($this->table_name, $data);
    }
}
