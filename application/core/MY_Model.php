<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 30.10.18
 * Time: 14:10
 */

class MY_Model extends CI_Model
{
    public $table_name;

    public function __construct()
    {
        parent::__construct();
    }

    public function findAll()
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get($this->table_name)->result();
    }

    public function findAllAsc()
    {
        $this->db->order_by('id', 'ASC');
        return $this->db->get($this->table_name)->result();
    }

    public function findById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get($this->table_name)->row();
    }

    public function findBySlug($slug)
    {
        $this->db->where('slug', $slug);
        return $this->db->get($this->table_name)->row();
    }

    public function findByCategoryId($id)
    {
        $this->db->where('category_id', $id);
        return $this->db->get($this->table_name)->result();
    }

    public function findByTitle($title)
    {
        $this->db->like('title', $title);
        return $this->db->get($this->table_name)->result();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_name);
    }

    public function updateClickView($id)
    {
        $sql = "select * from $this->table_name where id = $id";
        $item = $this->db->query($sql)->row();
        $data = array(
            'view_count' => $item->view_count + 1
        );
        $this->db->where('id', $id);
        $this->db->update($this->table_name, $data);
    }
}