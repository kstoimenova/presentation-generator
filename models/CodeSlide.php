<?php

namespace models;

include_once 'BaseSlide.php';
include_once 'Slide.php';

class CodeSlide extends BaseSlide implements Slide {
    
    private $codeBlock;
    
    const HTML_LAYOUT = '<section>
    <h2><?php echo $this->heading ?></h2>
    <pre>
    <code>
    <?php echo $this->codeBlock ?>
    </code>
  </pre>
 </section>'; // TODO: 

    public function __construct($id, $presentationId, $heading, $ordering, $codeBlock) {
        parent::__construct($id, $presentationId, $heading, $ordering);
        $this->codeBlock = $codeBlock;
    }

    public function getCodeBlock() {
        return $this->codeBlock;
    }

    public function getHtmlLayout() {
        return self::HTML_LAYOUT;
    }

}
