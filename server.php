<?php

// Emulates Apache's mod_rewrite for PHP's built-in server, serving from public_html.
// https://github.com/johannschopplich/kirby-vue3-starterkit/blob/main/server.php

$root = __DIR__ . '/public_html';
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

if ($uri !== '/' && file_exists($root . '/' . $uri)) {
    return false;
}

$_SERVER['SCRIPT_NAME'] = '/index.php';
require_once $root . '/index.php';
