<!doctype html>
<!-- MARTINA HOLENSTEIN — <?php echo date("m Y");?> -->

<html lang="en">

<?php snippet('head') ?>

<body id="landing-page" data-barba="wrapper">
    <div data-barba="container" data-barba-namespace="home">
        <header>
            <nav>
                <a href="<?= $pages->get('about')->url()?>">
                    <h1><?= $page->title() ?></h1>
                </a>
            </nav>
        </header>
        <main>
            <ul class="projektliste">
                <?php foreach($pages->get('projects')->children() as $item): ?>
                    <li class="marquee3k liste" data-speed="<?= $item->speed() ?>" data-pausable="true">
                        <a href="<?= $item->url()?>"><?= $item->title()?> <?= $item->subtitle() ?>&nbsp;</a>
                    </li>
                <?php endforeach ?>
                    <li>
                        <?php echo date("d m Y");?>
                    </li>
                </ul>
            </main>
        </div>    
    <?= js('assets/js/marquee3k.js') ?>
</body>

</html>