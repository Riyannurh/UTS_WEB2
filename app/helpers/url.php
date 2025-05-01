<?php
function base_url($path = '')
{
    $base = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
    return rtrim($base, '/') . '/' . ltrim($path, '/');
}

