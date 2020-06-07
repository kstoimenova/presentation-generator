<?php

namespace models;

include_once 'BaseSlide.php';
use BaseSlide;

class ListSlide extends BaseSlide implements Slide {

    private $list;
    
    const HTML_LAYOUT = ''; // TODO: 

    public function __construct($list) {
        parent::init();
        $this->list = $list;
    }

    public function getList() {
        return $this->list;
    }

    public function getHtmlLayout() {
        return HTML_LAYOUT;
    }
}