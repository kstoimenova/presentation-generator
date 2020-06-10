<?php

namespace dao;

include_once '../db/Database.php';
use db\Database;

/**
 * Class SlideTypeDao
 * @package dao
 */
class SlideTypeDao
{
    private static $db = null;

    public function __construct()
    {
        self::$db = new Database();
    }

    public function getSlideTypeIdByLayout($layout)
    {
        try {
            $sql = "SELECT id
                    FROM slides_types
                    WHERE layout = :layout";
            $stmt = self::$db->getConnection()->prepare($sql);
            $stmt->execute(['layout' => $layout]);
            $slideTypeId = $stmt->fetch(\PDO::FETCH_ASSOC);

        } catch (\PDOException $e) {
            throw $e;
        }
        return $slideTypeId["id"];
    }
}
