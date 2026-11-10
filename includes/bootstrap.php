<?php

declare(strict_types=1);

$config = require __DIR__ . '/config.php';

$requiredPhp = (string) ($config['require_php'] ?? '8.1.0');
if (version_compare(PHP_VERSION, $requiredPhp, '<')) {
    http_response_code(500);
    header('Content-Type: text/plain; charset=UTF-8');
    echo 'This website requires PHP ' . $requiredPhp . ' or newer. Current version: ' . PHP_VERSION;
    exit;
}

$site = require __DIR__ . '/site.php';
require_once __DIR__ . '/helpers.php';

$defaultLang = 'fr';
$supportedLangs = ['fr', 'en'];

$configuredBase = trim((string) ($config['base_path'] ?? ''), '/');
if ($configuredBase !== '') {
    $basePath = '/' . $configuredBase;
} else {
    $scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
    $basePath = ($scriptDir === '/' || $scriptDir === '.' || $scriptDir === '') ? '' : $scriptDir;
}

// Prefix local asset paths so subdirectory installs work on cPanel.
$site['logo'] = with_base_path((string) $site['logo']);
foreach ($site['images'] as $key => $path) {
    $site['images'][$key] = with_base_path((string) $path);
}
foreach ($site['heroSlides'] as $index => $slide) {
    $site['heroSlides'][$index]['src'] = with_base_path((string) $slide['src']);
}

$requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$requestPath = rawurldecode($requestPath);
$requestPath = '/' . trim($requestPath, '/');
if ($requestPath === '/') {
    $requestPath = '/';
}

if ($basePath !== '' && str_starts_with($requestPath, $basePath)) {
    $requestPath = substr($requestPath, strlen($basePath)) ?: '/';
}

$segments = array_values(array_filter(explode('/', trim($requestPath, '/'))));

if ($segments === []) {
    header('Location: ' . url_path($defaultLang), true, 302);
    exit;
}

$lang = $segments[0] ?? '';
if (!is_lang($lang)) {
    header('Location: ' . url_path($defaultLang), true, 302);
    exit;
}

$page = $segments[1] ?? 'home';
$extra = array_slice($segments, 2);

$routes = [
    'home' => 'home.php',
    'new-here' => 'new-here.php',
    'vision' => 'vision.php',
    'ministries' => 'ministries.php',
    'teachings' => 'teachings.php',
    'testimonies' => 'testimonies.php',
    'prayer' => 'prayer.php',
    'support' => 'support.php',
    'privacy' => 'privacy.php',
];

$notFound = $extra !== [] || !isset($routes[$page]);
$pageFile = $notFound ? 'not-found.php' : $routes[$page];

$messagesPath = dirname(__DIR__) . '/lang/' . $lang . '.json';
$t = json_decode((string) file_get_contents($messagesPath), true, 512, JSON_THROW_ON_ERROR);

$navPages = [
    ['slug' => 'new-here', 'key' => 'newHere'],
    ['slug' => 'vision', 'key' => 'vision'],
    ['slug' => 'ministries', 'key' => 'ministries'],
    ['slug' => 'teachings', 'key' => 'teachings'],
    ['slug' => 'testimonies', 'key' => 'testimonies'],
    ['slug' => 'prayer', 'key' => 'prayer'],
    ['slug' => 'support', 'key' => 'support'],
];

$metaTitle = $t['meta']['title'];
$metaDescription = $t['meta']['description'];
$hideMobileCta = $page === 'prayer';
$httpStatus = $notFound ? 404 : 200;
