<?php

namespace models;

include_once 'BaseSlide.php';
include_once 'Slide.php';
// use BaseSlide;

class TextSlide extends BaseSlide implements Slide {
    
    private $text;
    
    const HTML_LAYOUT = '<section>
                            <h2><?php echo $this->heading ?></h2>
                            <p><?php echo $this->text ?></p>
                         </section>'; // TODO: 

    public function __construct($id, $presentationId, $heading, $ordering, $text) {
        parent::__construct($id, $presentationId, $heading, $ordering);
        $this->text = $text;
    }

    public function getText() {
        return $this->text;
    }

    public function getHtmlLayout() {
        return self::HTML_LAYOUT;
    }

}
