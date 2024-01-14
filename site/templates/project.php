<!doctype html>
<!-- MARTINA HOLENSTEIN — <?php echo date("m Y"); ?> -->

<html lang="en">

<?php snippet('head') ?>

<body class="project-page">
    <div class="textoben">

        <?php snippet('projectHeader') ?>

        <main>
            <p>
                <?= $page->text()->kt() ?>
            </p><br>
            <p>
                <?= $page->info()->kt() ?>
            </p>
        </main>
    </div>

    <?php foreach ($page->images()->sorted() as $image): ?>
        <div class="image-<?= $image->orientation() ?>">
            <img src="<?= $image->url() ?>" alt="<?= $image->name() ?>">
        </div>
    <?php endforeach ?>

</body>

</html>