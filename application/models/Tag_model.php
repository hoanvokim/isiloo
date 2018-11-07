<?php
/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 06.11.18
 * Time: 13:17
 */
class Tag_model extends Entity_model
{

    public $table_name = "tag";

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
