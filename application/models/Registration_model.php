<?php
/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 31.10.18
 * Time: 11:37
 */

class Registration_model extends Entity_model
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
}
