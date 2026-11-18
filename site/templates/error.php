<!doctype html>
<!-- MARTINA HOLENSTEIN — <?php echo date('m Y'); ?> -->

<html lang="<?= $kirby->language()?->code() ?? 'de' ?>">

<?php snippet('head') ?>

<body id="about-page">
    <header>
        <nav>
            <a href="<?= $site->url() ?>"><?= $site->title() ?></a>
            <h1><?= t('notFound.title') ?></h1>
            <?php snippet('language-switcher') ?>
        </nav>
    </header>

    <main>
        <?= $page->text()->or(t('notFound.text'))->kt() ?>
        <br>
        <p><a href="<?= $site->url() ?>"><?= t('notFound.back') ?></a></p>
    </main>
</body>

</html>
