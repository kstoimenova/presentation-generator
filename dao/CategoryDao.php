<?php

namespace dao;

include_once '../db/Database.php';
use db\Database;

include_once '../models/Category.php';
use models\Category;

class CategoryDao
{
    private static $db;

    public function __construct()
    {
        self::$db = new Database();
    }

    /**
     * @return presentation
     */
    public static function getCategoryById($id)
    {
        try {
            $sql = "SELECT id, name
                    FROM categories
                    WHERE id = :id";
            $stmt = self::$db->getConnection()->prepare($sql);
            $stmt->execute(['id' => $id]);

            $row = $stmt->fetch(\PDO::FETCH_ASSOC);
            $category = new Category($row["id"], $row["name"]);
        } catch (\PDOException $e) {
            throw $e;
        }
        return $category;
    }
    public static function getAllCategories()
    {
        try {
            $sql = "SELECT id, name
                    FROM categories";
            $stmt = self::$db->getConnection()->prepare($sql);
            $stmt->execute();

            $categories = array();
            while($row = $stmt->fetch(\PDO::FETCH_ASSOC)){
                $category = new Category($row["id"], $row["name"]);
                $categories[] = $category;
            }
        } catch (\PDOException $e) {
            throw $e;
        }
        return $categories;
    }
}
