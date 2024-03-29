<!doctype html>
<!-- MARTINA HOLENSTEIN — <?php echo date("m Y");?> -->

<html lang="en">

<?php snippet('head') ?>

<body id="about-page">
    <header>
        <nav>
            <a href="<?= $pages->get('home')->url()?>"><?= $pages->get('projects')->title() ?></a>
            <h1><?= $page->title()->kt() ?></h1>
        </nav>
    </header>

    <main>
        <p><?= $page->text()->kt() ?></p>
        <br>
        <p>
            <?php if ($contact = $page->contact()->toObject()): ?>
            <a href="mailto:<?= $contact->email() ?>"><?= $contact->text() ?></a>
            <?php endif ?>
            <br>
            <?php if ($instagram = $page->instagram()->toObject()): ?>
            <a href="<?= $instagram->link() ?>" target="_blank"><?= $instagram->text() ?></a>
            <?php endif ?>
        </p>
    </main>
</body>

</html>