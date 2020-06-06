<?php

require('BaseSlide.php');

class CodeSlide extends BaseSlide {
    
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
