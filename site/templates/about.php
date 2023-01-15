<!doctype html>
<!-- MARTINA HOLENSTEIN — <?php echo date("m Y");?> -->

<html lang="en">

<?php snippet('head') ?>

<body id="about-page" data-barba="wrapper">
    <div data-barba="container" data-barba-namespace="about">
        <header>
            <nav>
                <a href="<?= $pages->get('home')->url()?>"><?= $pages->get('projects')->title() ?></a>
                <h1><?= $page->title() ?></h1>
            </nav>
        </header>

        <main>
            <p><?= $page->text() ?></p>
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
    </div>
</body>

</html>