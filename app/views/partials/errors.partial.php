<?php if (isset($errors)) : ?>
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card-panel red darken-1 white-text">
                    <ul>
                        <?php foreach ($errors as $key => $error_data) : ?>
                            <?php foreach ($error_data as $error) : ?>
                                <li><?= $error ?></li>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>