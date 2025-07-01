<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?php echo get_site_title(); ?></title>
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
<header>
    <div class="logo">
        <a href="/">
            <img src="/assets/logo.svg" alt="Галактический вестник">
        </a>
    </div>
</header>
<?php
$main_class = get_main_class();
if(!empty($main_class)) {
?>
<main class="<?= $main_class ?>"">
<?php } else { ?>
<main>
<?php } ?>