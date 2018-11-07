<?php
/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 31.10.18
 * Time: 13:46
 */

class HumanResources_model extends MY_Model
{
    public $table_name = "human_resources";

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($type, $name, $img, $title, $content)
    {
        $data = array(
            'type' => $type,
            'name' => $name,
            'img' => $img,
            'title' => $title,
            'content' => $content
        );

        $this->db->insert($this->table_name, $data);
    }

    public function update($id, $type, $name, $img, $title, $content)
    {
        $data = array(
            'type' => $type,
            'name' => $name,
            'img' => $img,
            'title' => $title,
            'content' => $content
        );
        $this->db->where('id', $id);
        $this->db->update($this->table_name, $data);
    }
}

