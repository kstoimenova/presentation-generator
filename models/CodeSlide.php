<?php

namespace models;

include_once 'BaseSlide.php';
include_once 'Slide.php';

class CodeSlide extends BaseSlide implements Slide {
    private $codeBlock;
    
    public function __construct($id, $presentationId, $heading, $ordering, $codeBlock) {
        parent::__construct($id, $presentationId, $heading, $ordering);
        $this->codeBlock = $codeBlock;
    }

    public function getCodeBlock() {
        return htmlentities($this->codeBlock);
    }

    public function getHtmlLayout() {
        return '<section class="slide" id="'.$this->getId().'">
        <h2>' . $this->getHeading() . '</h2>
        <div class="codeSlide">
        <pre class="code">
        <code>
        ' .
        $this->getCodeBlock()
         .
        '</code>
        </pre>
        </div>
     </section>';
    }

    
}
