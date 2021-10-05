<?php require(__DIR__ . '/partials/header.partial.php') ?>
<main>
    <p>Index Page</p>

    <?php foreach ($params as $key => $value) : ?>
        <li><?= $key ?>: <?= $value ?></li>
    <?php endforeach ?>

</main>
<?php require(__DIR__ . '/partials/footer.partial.php') ?>