<?php
global $post;
$post_image_url = '/assets/images/' . $post['image'];
?>
<div class="post_container">
    <?= get_breadcrumbs() ?>
    <article class="post-view">
        <h1 class="post-title"><?=$post['title'] ?></h1>
        <div class="post-box">
        <div class="post-content">
            <span class="post-date"><?= get_post_date($post['date']) ?></span>
            <h2 class="post-announce"><?= $post['announce'] ?></h2>
            <div class="post-text"><?= $post['content'] ?></div>
            <span class="post-back"><a href="/">← Назад к новостям</a></span>
        </div>
        <div class="post-image">
            <img src="<?= $post_image_url ?>"/>
        </div>
        </div>
    </article>
</div>