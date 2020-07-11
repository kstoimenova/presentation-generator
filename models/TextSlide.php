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
        return '<section class="slide" id="'.$this->getId().'">
        <div class="slide-header">
            <h2>' . $this->getHeading() . '</h2>
            <a class="edit-icon" href="./edit-slide.php?id='.$this->getId().'&presentationId='.$this->getPresentationId().'"><span><i class="fa fa-pencil-square-o"></i></span></a>
        </div>
        <p>' .  $this->getText() . '</p>
     </section>';
    }

}
