<?php


namespace Middleware;


use Views\Error;
use Views\View;

class CSRFCheck implements Middleware
{

    /**
     * Returns true on pass, an action in the form of a view on fail
     * @return View|bool
     */
    public function execute()
    {
        if (isset($_SESSION['csrf_tokens']) &&
            isset($_POST['csrf_token']) &&
            in_array($_POST['csrf_token'], $_SESSION['csrf_tokens'])) {

            $_SESSION['csrf_tokens'] = array_diff($_SESSION['csrf_tokens'], [$_POST['csrf_token']]);
            return true;
        }

        return new Error(412);
    }
}