<?php
require_once __DIR__ . "/model/User.php";

include_once __DIR__ . "/components/root/html_head.php";

if (!isset($_GET["p"])) {
    include_once __DIR__ . "/view/landing_page.php";
}

if (file_exists(__DIR__ . "/view/{$_GET['p']}.php")) {
    include_once (__DIR__ . "/view/{$_GET['p']}.php");
} else {
    include_once (__DIR__ . "/view/error_404.php");
    http_response_code(404);
}

$new_user = new User("oi", "ola@gmail.com", "oisenha");
$new_user->create();

include_once __DIR__ . "/components/root/html_bottom.php";