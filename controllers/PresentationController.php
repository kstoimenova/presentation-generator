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

        $content = '';
        foreach ($slides as $slide) {
            $content = $content . '<li><a href="#'.$slide->getId().'">'. $slide->getHeading() .'</a></li>';
        }

        return $content;
    }

    public function getPresentationIdFromUrl() {
        $queries = array();
        parse_str($_SERVER['QUERY_STRING'], $queries);
        $id = $queries['id'];

        return $id;
    }

    public function getParamFromUrl($parameter) {
        $queries = array();
        parse_str($_SERVER['QUERY_STRING'], $queries);
        $id = $queries[$parameter];

        return $id;
    }
}
