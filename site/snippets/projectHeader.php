<header>
    <nav>
        <a href="<?= $pages->get('home')->url()?>"><?= $pages->get('projects')->title() ?></a>
    </nav>
    <h1><?= $page->title()->kt() ?></h1>
    <h2><?= $page->subtitle()->kt() ?></h2>
</header>