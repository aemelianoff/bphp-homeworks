<?php
class Router {
    public $availableLinks;

    public function __construct($data) {
        $this->availableLinks = $data;
    }
    
    public function isAvailablePage($pagename) {
        foreach ($this->availableLinks as $key => $value) {
            if ($value == $pagename) {
                return true;
            }
        }
    }
}