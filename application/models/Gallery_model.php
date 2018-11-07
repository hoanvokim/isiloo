<?php
/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 30.10.18
 * Time: 14:06
 */

class Gallery_model extends Entity_model
{

    public $table_name = "gallery";

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($img, $title)
    {
        $data = array(
            'img' => $img,
            'title' => $title
        );

        $this->db->insert($this->table_name, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function update($id, $img, $title)
    {
        $data = array(
            'img' => $img,
            'title' => $title
        );
        $this->db->where('id', $id);
        $this->db->update($this->table_name, $data);
    }
}
