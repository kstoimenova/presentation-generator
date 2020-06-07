<?php

namespace models;

include_once 'BaseSlide.php';
use BaseSlide;

class CodeSlide extends BaseSlide implements Slide {
    
    private $codeBlock;
    
    const HTML_LAYOUT = ''; // TODO: 

    public function __construct($codeBlock) {
        parent::init();
        $this->codeBlock = $codeBlock;
    }

    public function getCodeBlock() {
        return $this->codeBlock;
    }

    public function getHtmlLayout() {
        return HTML_LAYOUT;
    }

}
