<?php
/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 30.10.18
 * Time: 13:11
 */

class News_model extends Entity_model
{

    public $table_name = 'news';

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($catId, $img_square, $img_horizontal, $slug, $title, $summary, $content, $title_header, $description_header, $keyword_header)
    {
        $data = array(
            'category_id' => $catId,
            'img_square' => $img_square,
            'img_horizontal' => $img_horizontal,
            'slug' => $slug,
            'title' => $title,
            'summary' => $summary,
            'content' => $content,
            'title_header' => $title_header,
            'description_header' => $description_header,
            'keyword_header' => $keyword_header
        );

        $this->db->insert($this->table_name, $data);
    }

    public function update($newsId, $catId, $img_square, $img_horizontal, $slug, $title, $summary, $content, $title_header, $description_header, $keyword_header)
    {
        $data = array(
            'category_id' => $catId,
            'img_square' => $img_square,
            'img_horizontal' => $img_horizontal,
            'slug' => $slug,
            'title' => $title,
            'summary' => $summary,
            'content' => $content,
            'title_header' => $title_header,
            'description_header' => $description_header,
            'keyword_header' => $keyword_header
        );
        $this->db->where('id', $newsId);
        $this->db->update($this->table_name, $data);
    }

    public function findFirstByCategoryId($catId)
    {
        $sql = "select * from news where category_id in (";
        $cnt = count($catId);
        for ($i = 0; $i < $cnt - 1; $i++) {
            $sql = $sql . $catId[$i] . ",";
        }
        $sql = $sql . $catId[$cnt - 1] . ") order by created_date desc limit 1";

        return $this->db->query($sql)->row();
    }

    public function findLatestByCategoryId($catId)
    {
        $sql = "select * from $this->table_name where category_id in (";
        foreach ($catId as $key => $value) {
            $sql = $sql . $value->id . ",";
        }
        $sql = rtrim($sql, ", ") . ") order by created_date desc limit 5";
        return $this->db->query($sql)->result();
    }

    public function findByCategoryIds($catId)
    {
        $sql = "select * from $this->table_name where category_id in (";
        foreach ($catId as $key => $value) {
            $sql = $sql . $value->id . ",";
        }
        $sql = rtrim($sql, ", ") . ") order by created_date desc";
        return $this->db->query($sql)->result();
    }

    public function findMostViewByCategoryId($catId, $limit)
    {
        $sql = "select *, $this->table_name.slug as news_slug, category.slug as cat_slug, category.name as cat_name from $this->table_name join category on category.id = $this->table_name.category_id where $this->table_name.category_id in (";
        $cnt = count($catId);
        for ($i = 0; $i < $cnt - 1; $i++) {
            $sql = $sql . $catId[$i] . ",";
        }
        $sql = $sql . $catId[$cnt - 1] . ") order by view_count desc limit ".$limit;
        return $this->db->query($sql)->result();
    }

    public function findRelatedNews($catId, $mainNewsId)
    {
        $sql = "select *, $this->table_name.slug as news_slug, category.slug as cat_slug, category.name as cat_name from $this->table_name join category on category.id = $this->table_name.category_id where $this->table_name.id != $mainNewsId and  $this->table_name.category_id in (";
        $cnt = count($catId);
        for ($i = 0; $i < $cnt - 1; $i++) {
            $sql = $sql . $catId[$i] . ",";
        }
        $sql = $sql . $catId[$cnt - 1] . ") ORDER BY RAND() desc limit 6";
        return $this->db->query($sql)->result();
    }
}
