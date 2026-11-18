<?php if ($kirby->multilang()): ?>
    <ul class="language-switcher">
        <?php foreach ($kirby->languages() as $language): ?>
            <li>
                <a href="<?= $page->url($language->code()) ?>" hreflang="<?= $language->code() ?>" lang="<?= $language->code() ?>"<?= $kirby->language()?->is($language) ? ' aria-current="true"' : '' ?>><?= Str::upper($language->code()) ?></a>
            </li>
        <?php endforeach ?>
    </ul>
<?php endif ?>
