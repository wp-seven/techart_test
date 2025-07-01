<?php
global $posts, $main_posts;
$last_post = $posts->get_last_post();
$last_post_image_url = '/assets/images/' . $last_post['image'];
if(!empty($last_post)) {
?>
<div class="sticky-post" style="background-image: url('<?= $last_post_image_url ?>');">
    <article class="sticky-preview">
      <h1 class="sticky-title"><a href="/?id=<?= (int)$last_post['id'] ?>"><?= $last_post['title'] ?></a></h1>
      <p class="sticky-announce"><?= $last_post['announce'] ?></p>
    </article>
</div>
<?php } ?>
<div class="posts-container">
    <h1>Новости</h1>
    <div class="posts-list">
        <?php foreach ($main_posts as $post) { 
        ?>
        <article class="post-preview">
            <span class="post-date"><?= get_post_date($post['date']) ?></span>
            <h2 class="post-title"><a href="/?id=<?= (int)$post['id'] ?>"><?=$post['title'] ?></a></h2>
            <div class="post-announce"><?= $post['announce'] ?></div>
            <span class="post-more"><a href="/?id=<?= (int)$post['id'] ?>">Подробнее →</a></span>
        </article>
    <?php } ?>
    </div>
<?php
echo get_pagination();
?>
</div>
