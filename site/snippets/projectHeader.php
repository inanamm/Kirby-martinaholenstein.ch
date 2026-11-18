<header>
    <nav>
        <a href="<?= $pages->get('home')->url()?>"><?= $pages->get('projects')->title() ?></a>
        <?php snippet('language-switcher') ?>
    </nav>
    <h1><?= $page->title()->kt() ?></h1>
</header>