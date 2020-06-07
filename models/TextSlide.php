<?php

namespace models;

include_once 'BaseSlide.php';
use BaseSlide;

class TextSlide extends BaseSlide implements Slide {
    
    private $text;
    
    const HTML_LAYOUT = ''; // TODO: 

    public function __construct($text) {
        parent::init();
        $this->text = $text;
    }

    public function getText() {
        return $this->text;
    }

    public function getHtmlLayout() {
        return HTML_LAYOUT;
    }

}
