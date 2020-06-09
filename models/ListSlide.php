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
        $listJson = json_decode($this->list, true);
        return $listJson;
    }

    private function getListAsHtml() {
        echo '<ul>';
        foreach($this->getList() as $item){
          echo '<li>'.$item.'</li>';
        }
        echo '</ul>';
    }

    public function getHtmlLayout() {
        return '<section class="slide">
        <h2>' . $this->getHeading() . '</h2>
        <div class="list">' 
        .
        $this->getListAsHtml()
        .
        '</div>
     </section>';
    }

}