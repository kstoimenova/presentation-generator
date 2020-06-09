<?php

namespace dao;

include_once '../db/Database.php';
use db\Database;

include_once '../models/TextSlide.php';
include_once '../models/CodeSlide.php';
include_once '../models/ListSlide.php';
include_once '../models/BaseSlide.php';
use models\TextSlide;
use models\CodeSlide;
use models\ListSlide;

/**
 * Class SlideDao
 * @package dao
 */
class SlideDao
{
    private static $db = null;
    private static $presentationDao = null;

    public function __construct()
    {
        self::$db = new Database();
        self::$presentationDao = new PresentationDao();
    }

    /**
     * @return array
     */
    public function getSlidesByPresentationId($presentation_id)
    {
        try {
            $sql = "SELECT id, presentation_id, heading, text_area, list_json, codeblock, photo, ordering, type_id
                    FROM slides
                    WHERE presentation_id = :presentation_id";
            $stmt = self::$db->getConnection()->prepare($sql);
            $stmt->execute(['presentation_id' => $presentation_id]);

            $slides = array();
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                switch ($row['type_id']) {
                    case 1:
                        $slide = new TextSlide($row['id'], $row['presentation_id'], $row['heading'], $row['ordering'], $row['text_area']);
                        $slides[] = $slide;
                    break;
                    case 2:
                        $slide = new ListSlide($row['id'], $row['presentation_id'], $row['heading'], $row['ordering'], $row['list_json']);
                        $slides[] = $slide;
                    break;
                    case 3:
                        $slide = new CodeSlide($row['id'], $row['presentation_id'], $row['heading'], $row['ordering'], $row['codeblock']);
                        $slides[] = $slide;
                    break;
                    default:
                    echo 'Not supported slyde type';
                    break;
                }
            }
        } catch (\PDOException $e) {
            throw $e;
        }
        return $slides;
    }
}
