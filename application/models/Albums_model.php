<?php
/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 30.10.18
 * Time: 15:22
 */

class Albums_model extends Entity_model
{

    public $table_name = "albums";

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($slug, $img, $title, $content, $title_header, $description_header, $keyword_header, $filename)
    {
        $data = array(
            'slug' => $slug,
            'img' => $img,
            'title' => $title,
            'content' => $content,
            'title_header' => $title_header,
            'description_header' => $description_header,
            'keyword_header' => $keyword_header
        );

        $this->db->insert($this->table_name, $data);
        $insert_id = $this->db->insert_id();
        //insert album gallery
        foreach ($filename as $file) {
            $data_album = array(
                'album_id' => $insert_id,
                'img' => $file
            );
            $this->db->insert('albums_gallery', $data_album);
        }
    }

    public function update($id, $slug, $img, $title, $content, $title_header, $description_header, $keyword_header, $filename)
    {
        $data = array(
            'slug' => $slug,
            'img' => $img,
            'title' => $title,
            'content' => $content,
            'title_header' => $title_header,
            'description_header' => $description_header,
            'keyword_header' => $keyword_header
        );
        $this->db->where('id', $id);
        $this->db->update($this->table_name, $data);
        //update album gallery
    }

    public function findAllImages($albumId)
    {
        $sql = "SELECT ag.img from $this->table_name a join albums_gallery ag on ag.album_id = a.id where a.id = $albumId";
        return $this->db->query($sql)->result();
    }
}
