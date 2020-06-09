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
        return $this->codeBlock;
    }

    public function getHtmlLayout() {
        return '<section>
        <h2>' . $this->getHeading() . '</h2>
        <div class="codeSlide">
        <pre class="code">
        <textarea readonly>
        ' .
        $this->getCodeBlock() 
         .
        '</textarea>
        </pre>
        </div>
     </section>';
    }

}
