<?php

/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 06.11.18
 * Time: 10:42
 */
class Student_model extends Entity_model
{

    public $table_name = "student";

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

    public function findStudentHasReview()
    {
        $sql = "select * from $this->table_name where review is not null";
        return $this->db->query($sql)->result();
    }
}
