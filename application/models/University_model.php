<?php

/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 31.10.18
 * Time: 11:45
 */
class University_model extends MY_Model
{

    public $table_name = "university";

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($name, $img, $description)
    {
        $data = array(
            'name' => $name,
            'img' => $img,
            'description' => $description
        );
        $this->db->insert($this->table_name, $data);
    }

    public function update($id, $name, $img, $description)
    {
        $data = array(
            'name' => $name,
            'img' => $img,
            'description' => $description
        );
        $this->db->where('id', $id);
        $this->db->update($this->table_name, $data);
    }

    public function findAllWithNewsInformation()
    {
        $sql = "select $this->table_name.*, news.slug as news_slug from $this->table_name join news on news.id = $this->table_name.news_id";
        return $this->db->query($sql)->result();
    }
}
