<?php

/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 31.10.18
 * Time: 11:19
 */
class Category_model extends Entity_model
{
    public $table_name = "category";

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($parentId, $slug, $name, $img, $sort_index)
    {
        $data = array(
            'parent_id' => $parentId,
            'slug' => $slug,
            'img' => $img,
            'name' => $name,
            'sort_index' => $sort_index
        );

        $this->db->insert($this->table_name, $data);
    }

    public function update($id, $parentId, $slug, $name, $img, $sort_index)
    {
        $data = array(
            'parent_id' => $parentId,
            'slug' => $slug,
            'img' => $img,
            'name' => $name,
            'sort_index' => $sort_index
        );
        $this->db->where('id', $id);
        $this->db->update($this->table_name, $data);
    }

    public function findAllByParentId($id)
    {
        $this->db->where('parent_id', $id);
        return $this->db->get($this->table_name)->result();
    }

    public function findByParentId($id)
    {
        $this->db->select('id');
        $this->db->where('parent_id', $id);
        return $this->db->get($this->table_name)->result();
    }

}
