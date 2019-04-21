<?php

if (!function_exists('includeView')) {
    function includeView($name, $data = null)
    {
        include($_SERVER["DOCUMENT_ROOT"] . "/views/$name.php");
    }
}

if (!function_exists('csrf')) {
    function csrf()
    {
        if (!isset($_SESSION['csrf_tokens'])) {
            $_SESSION['csrf_tokens'] = [];
        }

        $csrfString = generateRandomString();

        $_SESSION['csrf_tokens'][] = $csrfString;

        print "<input type='hidden' name='csrf_token' value='$csrfString'>";
    }
}

if (!function_exists('generateRandomString')) {
    function generateRandomString($length = 30)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

