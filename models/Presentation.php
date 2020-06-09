<?php

namespace models;

class Presentation {

    private $id;
    private $name;
    private $category; // category as a string
    private $pathToFile; // path to the uploaded JSON file
    private $content; // array with the headings of the slides in correct order
    private $slides; // array with the slides in correct order

    public function __construct($id, $name, $category, $pathToFile) {
        $this->id = $id;
        $this->name = $name;
        $this->category = $category;
        $this->pathToFile = $pathToFile;
    }

    public function getId() {
        return $this->id;
    }
    
    public function getName() {
        return $this->name;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getPathToFile() {
        return $this->pathToFile;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function getSlides() {
        return $this->slides;
    }

    public function setSlides($slides) {
        $this->slides = $slides;
    }
}