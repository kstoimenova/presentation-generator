<?php
namespace controllers;

use dao\SlideDao;
use dao\PresentationDao;

class PresentationController {
    private static $slideDao = null;
    private static $presentationDao = null;

    public function __construct() {
        self::$slideDao = new SlideDao();
        self::$presentationDao = new PresentationDao();
    }

    public function constructPresentationContent($presentationId) {
        $presentation = self::$presentationDao->getPresentationById($presentationId);
        $slides = self::$slideDao->getSlidesByPresentationId($presentationId);

        usort($slides, function($a, $b) {return strcmp($a->getOrdering(), $b->getOrdering());}); // sort slides so they will be in the right order

        $content = array();

        foreach ($slides as $slide) {
            $content[] = $slide->getHeading();
        }

        $presentation->setContent($content);
        $presentation->setSlides($slides);

        return $presentation->getContent();
    }
}
