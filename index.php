<?php
include 'includes/load.php';
include 'templates/header.php';
if($is_main) {
    include 'templates/main.php';
} elseif($is_post) {
    include 'templates/post.php';
} elseif($is_404) {
    prr('404');
    include 'templates/404.php';
}
include 'templates/footer.php';
?>