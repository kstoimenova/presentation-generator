<?php

namespace models;

include_once 'BaseSlide.php';
include_once 'Slide.php';
// use BaseSlide;

class TextSlide extends BaseSlide implements Slide {
    
    private $text;

    public function __construct($id, $presentationId, $heading, $ordering, $text) {
        parent::__construct($id, $presentationId, $heading, $ordering);
        $this->text = $text;
    }

    public function getText() {
        return $this->text;
    }

    public function getHtmlLayout() {
        return '<section>
        <h2>' . $this->getHeading() . '</h2>
        <p>' .  $this->getText() . '</p>
     </section>';
    }

}
