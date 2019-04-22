<?php


namespace Views;


class Redirect implements View
{
    private $url;
    private $prams;

    /**
     * Redirect to a specific url with parameters.
     * @param $url
     * @param $prams
     */
    public function __construct($url, $prams = array())
    {
        $this->url = $url;
        $this->prams = $prams;

        $parts = parse_url($url);
        parse_str($parts['query'], $query);

        $this->prams = array_merge($query, $this->prams);
    }

    public function render()
    {
        $url = strtok($this->url, '?');
        if (!empty($this->prams)) {
            $url .= '?' . http_build_query($this->prams);
        }
        header('Location: ' . $url);
        die();
    }
}