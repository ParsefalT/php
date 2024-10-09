<?php 
function urlIs($value) {
    return $_SERVER["REQUEST_URI"] == $value;
}

function dd($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function abort($code = 404) {
    http_response_code($code);
    // echo "Not found page, go away";
    require "views/{$code}.php";
    die();
}