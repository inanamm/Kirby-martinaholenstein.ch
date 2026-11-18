<!doctype html>
<!-- MARTINA HOLENSTEIN — <?php echo date('m Y'); ?> -->

<html lang="<?= $kirby->language()?->code() ?? 'de' ?>">

<?php snippet('head') ?>

<body id="landing-page">
    <header>
        <nav>
            <a href="<?= $pages->get('about')->url() ?>">
                <h1>
                    <?= $page->title() ?>
                </h1>
            </a>
            <?php snippet('language-switcher') ?>
        </nav>
    </header>
    <main>
        <ul class="projektliste">
            <?php foreach ($pages->get('projects')->children() as $item): ?>
                <li class="listitem" onmouseover="showImage(this)" onmouseout="hideImage()">
                    <a href="<?= $item->url() ?>">
                        <?= $item->title() ?>
                    </a>
                    <a href="<?= $item->url() ?>" class="listItemSubtitle">
                        <?= $item->subtitle() ?>
                    </a>
                    <div class="hover-image" data-image="<?= $item->image()->url() ?>"></div>
                </li>
            <?php endforeach ?>
            <li>
                <time id="today"><?php echo date('d m Y'); ?></time>
            </li>
        </ul>
    </main>

    <script>
        // The page is cached (Staticache), so set today's date in the browser
        const today = new Date();
        document.getElementById('today').textContent = [today.getDate(), today.getMonth() + 1]
            .map((n) => String(n).padStart(2, '0'))
            .concat(today.getFullYear())
            .join(' ');

        let hoverImage;
        let delayTimer;

        function showImage(element) {
            // Check if the .hover-image element exists, if not, create it
            if (!hoverImage) {
                hoverImage = document.createElement('img');
                hoverImage.classList.add('hover-image');
                document.body.appendChild(hoverImage);
            }

            // Get the image URL from the data attribute
            const imageUrl = element.querySelector('.hover-image').dataset.image;

            // Preload the image to ensure it's ready when displayed
            const preloadedImage = new Image();
            preloadedImage.src = imageUrl;

            // Position the image near the cursor when the preloading is complete
            preloadedImage.onload = function () {
                hoverImage.src = imageUrl;
                document.addEventListener('mousemove', updateImagePosition);
            };
        }

        function updateImagePosition(e) {
            if (hoverImage) {
                hoverImage.style.left = e.pageX + 'px';
                hoverImage.style.top = e.pageY - (hoverImage.height/2)+ 'px';
            }
        }

        function hideImage() {
            // Delay hiding the image to improve synchronization
            delayTimer = setTimeout(() => {
                if (hoverImage && !isMouseOverListItem()) {
                    hoverImage.src = ''; // Clear the image source
                    document.removeEventListener('mousemove', updateImagePosition);
                }
            }, 200); // Adjust the delay time (in milliseconds) as needed
        }

        function clearHideImageDelay() {
            // Clear the hide image delay timer when the mouse reenters the list item
            clearTimeout(delayTimer);
        }

        function isMouseOverListItem() {
            // Check if the mouse is over any list item
            const listItem = document.querySelector('.listitem:hover');
            return listItem !== null;
        }

        // Make hideImage globally accessible
        window.hideImage = hideImage;

    </script>

</body>

</html>