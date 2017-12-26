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
        Repos
    </title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('font-awesome.css') ?>
    <?= $this->Html->css('repo.css') ?>
</head>
<body class="home">

<div class="container">

    <div class="repo-menu">
        <a href="/repo/download" class="btn btn-default">Download data as CSV <span class="fa fa-cloud-download"></span></a>
    </div>

    <div class="repo-group">
        <?php foreach ($repos as $repo): ?>

            <div class="repo row">
                
                <div class="repo-picture media-left"
                    <a href=<?= $repo["html_url"] ?>>
                        <img src=<?= $repo["owner"]["avatar_url"] ?> class="repo-photo">
                    </a>
                </div>

                <div class="repo-data media-body">
                    <h4 class="title">
                        <?= $repo["full_name"] ?>
                    </h4>
                    <p class="summary"><?= $repo["description"] ?></p>
                </div>

                <div class="repo-meta">
                    <button type="button" class="btn btn-sm btn-default"><?= $repo["stargazers_count"] ?> <span class="fa fa-star-o"></span></button>
                    <button type="button" class="btn btn-sm btn-default"><?= $repo["forks_count"] ?> <span class="fa fa-code-fork"></span></button>
                    <button type="button" class="btn btn-sm btn-default"><?= $repo["open_issues"] ?> <span class="fa fa-exclamation-circle"></span></button>
                </div>
                
            </div>

        <?php endforeach; ?>

    </div>

</div>

</body>
</html>