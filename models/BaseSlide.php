<?php

namespace models;
class BaseSlide {

    private $id;
    private $presentationId;
    private $heading;
    private $ordering;
    private $type; // type as a string, used for the visualisation

    public function __construct($id, $heading, $ordering, $type) {
        $this->id = $id;
        $this->heading = $heading;
        $this->ordering = $ordering;
        $this->type = $type;
    }

    public function getPresentationId() {
        return $this->presentationId;
    }
    
    public function getHeading() {
        return $this->heading;
    }

    public function getOrdering() {
        return $this->ordering;
    }

    public function getType() {
        return $this->type;
    }
}
