<?php

namespace models;

class Category {

    private $id;
    private $name;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}