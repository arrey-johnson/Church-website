<?php

declare(strict_types=1);

require __DIR__ . '/includes/bootstrap.php';

if ($httpStatus === 404) {
    http_response_code(404);
}

ob_start();
require __DIR__ . '/pages/' . $pageFile;
$content = ob_get_clean();

require __DIR__ . '/includes/layout.php';
