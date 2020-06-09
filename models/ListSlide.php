<?php

namespace models;

include_once 'BaseSlide.php';
include_once 'Slide.php';

class ListSlide extends BaseSlide implements Slide {

    private $list;
    
    public function __construct($id, $presentationId, $heading, $ordering, $list) {
        parent::__construct($id, $presentationId, $heading, $ordering);
        $this->list = $list;
    }

    public function getList() {
        return $this->list;
    }

    public function getHtmlLayout() {
        return '<section>
        <h2>' . $this->getHeading() . '</h2>
        <p>' .  $this->getList() . '</p>
     </section>';
    }
}