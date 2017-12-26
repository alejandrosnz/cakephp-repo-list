<?php

use Cake\Cache\Cache;

$this->layout = false;

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('home.css') ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
</head>
<body class="home">

<header class="row">
    <div class="header-title">
        <h1>Symfony repos</h1>
    </div>
</header>

<div class="row">
    <ul>
    <?php foreach ($repos as $repo): ?>
        <li><?= $repo["full_name"] ?></li>
    <?php endforeach; ?>
    </ul>

</div>

</body>
</html>