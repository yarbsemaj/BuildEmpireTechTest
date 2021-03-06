<?php

if (!function_exists('includeView')) {
    /**
     * Includes a selected view,
     * @param string $name path from view dir less .php
     * @param array $data
     */
    function includeView($name, $data = null)
    {
        if (is_array($data)) {
            extract($data);
        }
        include($_SERVER["DOCUMENT_ROOT"] . "/views/$name.php");
    }
}

if (!function_exists('csrf')) {
    /**
     * Add a csrf field to the current form
     */
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

if (!function_exists('spoofMethod')) {
    /**
     * Generate a method to spoof any restful method
     * @param $method
     */
    function spoofMethod($method)
    {
        print "<input type='hidden' name='_METHOD' value='$method'>";
    }
}

if (!function_exists('safePrint')) {
    /**
     * Prints a string sans special HTML chars
     * @param $string
     */
    function safePrint($string)
    {
        echo htmlspecialchars($string);
    }
}

if (!function_exists('shortenString')) {
    /**
     * Shorten string by adding ...
     * @param $string
     * @param int $len length in char
     * @return string
     */
    function shortenString($string, $len = 140)
    {
        return mb_strimwidth($string, 0, $len, "...");
    }
}

if (!function_exists('getURL')) {
    /**
     * Gets a url based on prams
     * @param $url
     * @param $prams
     * @return string
     */
    function getURL($url, $prams)
    {
        return $url . '?' . http_build_query($prams);
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

