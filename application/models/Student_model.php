<?php

/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 06.11.18
 * Time: 10:42
 */
class Student_model extends MY_Model
{

    public $table_name = "student";

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($name, $img, $img_pop, $status, $review, $star, $prize, $prize_content)
    {
        $data = array(
            'name' => $name,
            'img' => $img,
            'img_pop' => $img_pop,
            'status' => $status,
            'review' => $review,
            'star' => $star,
            'prize' => $prize,
            'prize_content' => $prize_content
        );

        $this->db->insert($this->table_name, $data);
    }

    public function update($id, $name, $img, $img_pop, $status, $review, $star, $prize, $prize_content)
    {
        $data = array(
            'name' => $name,
            'img' => $img,
            'img_pop' => $img_pop,
            'status' => $status,
            'review' => $review,
            'star' => $star,
            'prize' => $prize,
            'prize_content' => $prize_content
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
