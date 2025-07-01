<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
global $db, $posts, $is_main, $is_post, $is_404, $main_posts, $max_pages, $post, $page;
global $site_title;

include_once __DIR__ . "/config.php";
include_once __DIR__ . "/db.php";
include_once __DIR__ . "/posts.php";
include_once __DIR__ . "/functions.php";

$site_title = 'Галактический вестник';
$is_main = false;
$is_post = false;
$is_404 = false;
$page = 0;

$db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
$posts = new Posts($db);

if(isset($_GET['p']) || empty($_GET)) {
    $page = isset($_GET['p']) ? $_GET['p'] : 1;
    if($page <= 0) $page = 1;
    if(!is_numeric($page)) $is_404 = true;
    else $main_posts = $posts->get_posts(POSTS_PER_PAGE, $page);
    if(!empty($main_posts)) {
        $is_main = true;
        $posts_count = $posts->get_posts_count();
        $max_pages = ceil($posts_count / POSTS_PER_PAGE);
    }
} elseif(isset($_GET['id'])) {
    $pid = $_GET['id'];
    if(!is_numeric($pid)) $is_404 = true;
    else $post = $posts->get_post($pid);
    if(!empty($post)) $is_post = true;
}
if(!$is_main && !$is_post) $is_404 = true;

?>