<?php

include_once __DIR__ . "/components/root/html_head.php";

if (!isset($_GET["p"])) {
    require_once __DIR__ . "/view/landing_page.php";
}

if (file_exists(__DIR__ . "/view/{$_GET['p']}.php")) {
    require_once (__DIR__ . "/view/{$_GET['p']}.php");
} else {
    require_once (__DIR__ . "/view/error_404.php");
    http_response_code(404);
}

include_once __DIR__ . "/components/root/html_bottom.php";