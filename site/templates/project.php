<!doctype html>
<!-- MARTINA HOLENSTEIN — <?php echo date("m Y");?> -->

<html lang="en">

<?php snippet('head') ?>

<body class="project-page">
    <div class="textoben">

<?php snippet('projectHeader') ?>

    <main>
        <p><?= $page->text() ?></p><br>
        <p><?= $page->info() ?></p>
    </main>
    </div>

    <div class="image-landscape">
        <?php foreach ($page->images()->sorted() as $image): ?>
            <img src="<?= $image->url() ?>" alt="<?= $image->name() ?>">
        <?php endforeach ?>
    </div>

</body>

</html>