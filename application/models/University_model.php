<?php

/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 31.10.18
 * Time: 11:45
 */
class University_model extends Entity_model
{

    public $table_name = "university";

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($name, $url, $img, $description)
    {
        $data = array(
            'name' => $name,
            'img' => $img,
            'url' => $url,
            'description' => $description
        );
        $this->db->insert($this->table_name, $data);
    }

    public function update($id, $name, $url, $img, $description)
    {
        $data = array(
            'name' => $name,
            'img' => $img,
            'url' => $url,
            'description' => $description
        );
        $this->db->where('id', $id);
        $this->db->update($this->table_name, $data);
    }

    public function findAllWithNewsInformation()
    {
        $sql = "select *, news.slug as news_slug from $this->table_name join news on news.id = $this->table_name.news_id";
        return $this->db->query($sql)->result();
    }
}
