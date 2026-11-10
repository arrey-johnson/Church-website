<?php

declare(strict_types=1);

function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function base_path(): string
{
    global $basePath;
    return rtrim((string) ($basePath ?? ''), '/');
}

function app_url(string $path = ''): string
{
    $path = '/' . ltrim($path, '/');
    if ($path === '/') {
        return base_path() === '' ? '/' : base_path() . '/';
    }
    return base_path() . $path;
}

function asset(string $path): string
{
    return app_url(ltrim($path, '/'));
}

function is_lang(?string $lang): bool
{
    return $lang === 'fr' || $lang === 'en';
}

function url_path(string $lang, string $slug = ''): string
{
    $slug = trim($slug, '/');
    $path = $slug === '' ? '/' . $lang : '/' . $lang . '/' . $slug;
    return app_url($path);
}

function current_slug(): string
{
    global $page;
    return $page === 'home' ? '' : (string) $page;
}

function switch_lang_url(string $nextLang): string
{
    return url_path($nextLang, current_slug());
}

function nav_is_active(string $slug): bool
{
    global $page;
    if ($slug === '' || $slug === 'home') {
        return $page === 'home';
    }
    return $page === $slug;
}

function page_title(?string $extra = null): string
{
    global $t;
    if ($extra) {
        return $extra . ' | ' . $t['brand']['name'];
    }
    return $t['meta']['title'];
}

function button(string $href, string $label, string $variant = 'gold', string $tag = 'a'): string
{
    $class = 'btn btn-' . $variant;
    if ($tag === 'button') {
        return '<button class="' . e($class) . '" type="submit">' . e($label) . '</button>';
    }
    return '<a class="' . e($class) . '" href="' . e($href) . '">' . e($label) . '</a>';
}

function reveal_open(string $class = '', string $tag = 'div', string $variant = 'up', int $delay = 0): string
{
    $classes = trim('reveal reveal-' . $variant . ' ' . $class);
    $delayAttr = $delay > 0 ? ' style="transition-delay:' . $delay . 'ms"' : '';
    return '<' . $tag . ' class="' . e($classes) . '"' . $delayAttr . '>';
}

function reveal_close(string $tag = 'div'): string
{
    return '</' . $tag . '>';
}

function with_base_path(string $path): string
{
    if ($path === '' || str_starts_with($path, 'http://') || str_starts_with($path, 'https://') || str_starts_with($path, 'mailto:') || str_starts_with($path, 'tel:')) {
        return $path;
    }
    return asset($path);
}

function handle_form_post(string $kind): string
{
    global $site, $config;

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return 'idle';
    }

    if (($_POST['form_kind'] ?? '') !== $kind) {
        return 'idle';
    }

    $name = trim((string) ($_POST['name'] ?? ''));
    $contact = trim((string) ($_POST['contact'] ?? ''));
    $consent = isset($_POST['consent']);

    if ($kind === 'visit') {
        $body = trim((string) ($_POST['message'] ?? ''));
    } elseif ($kind === 'story') {
        $body = trim((string) ($_POST['story'] ?? ''));
    } else {
        $body = trim((string) ($_POST['request'] ?? ''));
    }

    if ($name === '' || $contact === '' || $body === '' || !$consent) {
        return 'error';
    }

    $payload = [
        'kind' => $kind,
        'name' => $name,
        'contact' => $contact,
        'body' => $body,
        'mode' => (string) ($_POST['mode'] ?? ''),
        'date' => (string) ($_POST['date'] ?? ''),
        'display' => (string) ($_POST['display'] ?? ''),
        'submitted_at' => gmdate('c'),
        'ip' => $_SERVER['REMOTE_ADDR'] ?? '',
    ];

    $dir = dirname(__DIR__) . '/storage/submissions';
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
    $file = $dir . '/' . date('Ymd-His') . '-' . preg_replace('/[^a-z0-9]+/i', '-', $kind) . '.json';
    file_put_contents($file, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    $from = (string) ($config['mail_from'] ?? $site['email']);
    $subject = '[' . $site['name'] . '] ' . strtoupper($kind) . ' — ' . $name;
    $message = "Kind: {$kind}\nName: {$name}\nContact: {$contact}\n\n{$body}\n";
    if ($kind === 'visit') {
        $message .= "\nMode: " . ($payload['mode'] ?: 'n/a') . "\nDate: " . ($payload['date'] ?: 'n/a') . "\n";
    }
    if ($kind === 'story') {
        $message .= "\nDisplay as: " . ($payload['display'] ?: 'n/a') . "\n";
    }

    @mail(
        $site['email'],
        $subject,
        $message,
        'From: ' . $from . "\r\nReply-To: " . $contact . "\r\nContent-Type: text/plain; charset=UTF-8"
    );

    return 'success';
}
