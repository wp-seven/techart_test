<?php
function get_site_title() {
    global $posts, $is_main, $is_post, $is_404, $post, $page, $max_pages;
    if ($is_main) {
        if ($page == 0 || $page == 1) {
            $title = SITE_TITLE;
        } else {
            $posts_count = $posts->get_posts_count();
            $title = SITE_TITLE . " - " . "Страница " . $page . " из " . $max_pages;
        }
    } elseif ($is_post) {
        $title = $post["title"];
    } elseif ($is_404) {
        $title = "Страница не найдена";
    }
    return $title;
}

function get_main_class() {
    global $is_main, $is_post, $is_404;
    if ($is_main) {
        return "main-posts";
    } elseif ($is_post) {
        return "single-post";
    } elseif ($is_404) {
        return "404";
    }
    return "";
}

function get_post_date($date) {
    return date("d.m.Y", strtotime($date));
}

function get_breadcrumbs() {
    global $is_main, $is_post, $post;
    $str = "";
    if ($is_post) {
        $str = '<div class="breadcrumbs"><span><a href="/">Главная</a></span> / <span class="active">' . $post["title"] . "</span></div>";
    }
    return $str;
}

function get_pagination() {
    global $is_main, $posts, $page, $max_pages;
    $current_page = $page;
    $total_pages = $max_pages;
    $max_pages_num = 3;

    $first = max(1, $current_page - 1);
    $last = min($total_pages, $current_page + 1);

    if ($current_page == 1) {
        $first = 1;
        $last = min($max_pages_num, $total_pages);
    }
    if ($current_page == $total_pages) {
        $last = $total_pages;
        $first = max(1, $total_pages - ($max_pages_num - 1));
    }

    $str .= '<div class="pagination">';

    if ($current_page > 1) {
        $str .= '<a href="?p=' . ($current_page - 1) . '">←</a> ';
    }

    for ($i = $first; $i <= $last; $i++) {
        if ($i == $current_page) {
            $str .= '<a class="active">' . $i . "</a>";
        } else {
            $str .= '<a href="?p=' . $i . '">' . $i . "</a>";
        }
    }

    if ($current_page < $total_pages) {
        $str .= '<a href="?p=' . ($current_page + 1) . '">→</a>';
    }

    $str .= "</div>";
    return $str;
}

if (!function_exists("prr")) { function prr($str) { echo "<pre>"; print_r($str); echo "</pre>\r\n"; } }
?>
