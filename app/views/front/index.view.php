<main class="container">
    <div class="row">
        <div class="col">
            <div class="section">
                <p>Index</p>

                <?php if (isset($params)) :
                    foreach ($params as $key => $value) : ?>
                        <li><?= $key ?>: <?= $value ?></li>
                <?php endforeach;
                endif; ?>
            </div>
        </div>
    </div>
</main>