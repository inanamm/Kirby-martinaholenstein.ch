<!doctype html>
<!-- MARTINA HOLENSTEIN — <?php echo date('m Y'); ?> -->

<html lang="en">

<?php snippet('head') ?>

<body id="about-page">
    <header>
        <nav>
            <a href="<?= $site->url() ?>"><?= $site->title() ?></a>
            <h1>Not found</h1>
        </nav>
    </header>

    <main>
        <?= $page->text()->or('This page doesn’t exist.')->kt() ?>
        <br>
        <p><a href="<?= $site->url() ?>">Back to the homepage</a></p>
    </main>
</body>

</html>
