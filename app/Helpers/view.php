<?php

if (!function_exists('view')) {
    function view($name)
    {
        include($_SERVER["DOCUMENT_ROOT"] . "/views/$name.php");
    }
}

