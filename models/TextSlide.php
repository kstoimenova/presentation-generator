<?php

require('BaseSlide.php');

class TextSlide extends BaseSlide {
    
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
