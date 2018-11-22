<?php
/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 31.10.18
 * Time: 11:37
 */

class Registration_model extends MY_Model
{

    public $table_name = "registration";

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($subjectId, $name, $phone, $content)
    {
        $data = array(
            'subject_id' => $subjectId,
            'name' => $name,
            'phone' => $phone,
            'content' => $content
        );

        return $this->db->insert($this->table_name, $data);
    }

    public function update($id, $subjectId, $name, $phone, $content)
    {
        $data = array(
            'subject_id' => $subjectId,
            'name' => $name,
            'phone' => $phone,
            'content' => $content
        );
        $this->db->where('id', $id);
        $this->db->update($this->table_name, $data);
    }

    public function updateStatus($id, $status)
    {
        $data = array(
            'status' => $status
        );
        $this->db->where('id', $id);
        $this->db->update($this->table_name, $data);
    }

    public function findAllRegistration()
    {
        $sql = "select reg.*, sub.name as subject_question from registration reg left join subject sub on reg.subject_id = sub.id";
        return $this->db->query($sql)->result();
    }
}
