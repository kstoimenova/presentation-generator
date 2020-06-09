<?php

use dao\SlideDao;

class SlideController {

    private static $slideDao = null;

    public function __construct()
    {
        self::$slideDao = new SlideDao();
    }

    public function constructHTMLlayout() {
        
    }

}