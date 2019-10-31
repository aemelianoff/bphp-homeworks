<?php

class Router
{
    protected $pages;

    public function __construct($availableLinks) 
    {
        $this->pages = $availableLinks;
    }

    public function isAvailablePage($page)
    {
        $result = array_search($page, $this->pages);

        if ($result === false) {
            throw new Exception('Такой страницы нет');
        } else {
            return true;
        }
    }
}