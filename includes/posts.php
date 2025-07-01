<?php
class Posts {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    
    public function get_posts_count() {
        $sql = "SELECT COUNT(*) as count FROM news";
        try {
            $count = $this->db->query($sql);
        } catch (Exception $e) {
            return ['error' => true];
        }
        return $count[0]['count'];
    }

    public function get_posts($posts_per_page = 4, $page, $order = 'DESC') {
        $offset = ($page == 0 || $page == 1) ? 0 : $posts_per_page * ($page - 1);
        $sql = "SELECT * FROM news ORDER BY date " . $order . " LIMIT " . $posts_per_page . " OFFSET " . $offset;
        try {
            $posts = $this->db->query($sql);
        } catch (Exception $e) {
            return ['error' => true];
        }
        return $posts;
    }
    
    public function get_post($id) {
        if($id == 0) return [];
        $sql = "SELECT * FROM news WHERE id = " . $id;
        try {
            $post = $this->db->query($sql);
        } catch (Exception $e) {
            return ['error' => true];
        }
        if(!empty($post))
            return $post[0];
    }

    public function get_last_post() {
        $sql = "SELECT * FROM news ORDER BY date DESC LIMIT 1";
        try {
            $post = $this->db->query($sql);
        } catch (Exception $e) {
            return ['error' => true];
        }
        return (!empty($post)) ? $post[0] : [];
    }
}
?>