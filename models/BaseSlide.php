<?php

namespace models;
class BaseSlide {

    private $id;
    private $presentationId;
    private $heading;
    private $ordering;
    private $type; // type as a string, used for the visualisation

    public function __construct($id, $presentationId, $heading, $ordering) {
        $this->id = $id;
        $this->presentationId = $presentationId;
        $this->heading = $heading;
        $this->ordering = $ordering;
    }

    public function getId() {
        return $this->id;
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

    public function setHeading($heading) {
        $this->heading=$heading;
    }
}
