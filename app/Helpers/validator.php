<?php

use Views\Redirect;

if (!function_exists('validate')) {
    /**
     * Validates the request
     * @param array $validator
     */
    function validate($validator)
    {
        $errors = [];

        foreach ($validator as $field => $classes) {
            foreach ($classes as $class) {
                if (!$class->validate($field, $_POST[$field])) {
                    $errors[$field][] = $class->message($field, $_POST[$field]);
                }
            }
        }
        if (!empty($errors)) {
            (new Redirect($_SERVER['HTTP_REFERER'], ['errors' => $errors]))->render();
        }
    }
}
