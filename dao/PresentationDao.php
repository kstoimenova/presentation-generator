<?php

namespace dao;

include_once '../db/Database.php';
use db\Database;

include_once '../models/Presentation.php';
use models\Presentation;

include_once 'CategoryDao.php';

/**
 * Class PresentationDao
 * @package dao
 */
class PresentationDao
{
    private static $db = null;
    private static $categoryDao = null;

    public function __construct()
    {
        self::$db = new Database();
        self::$categoryDao = new CategoryDao();
    }

    /**
     * @return presentation
     */
    public function getPresentationById($id)
    {
        try {
            $sql = "SELECT id, name, category_id, path 
                    FROM presentations
                    WHERE id = :id";
            $stmt = self::$db->getConnection()->prepare($sql);
            $stmt->execute(['id' => $id]);

            $row = $stmt->fetch(\PDO::FETCH_ASSOC);
            $categoryFromDb = self::$categoryDao->getCategoryById($row['category_id']);
            $presentation = new Presentation($row["id"], $row["name"], $categoryFromDb->getName(), $row["path"]);
        } catch (\PDOException $e) {
            throw $e;
        }
        return $presentation;
    }

    public function getPresentationByCategoryId($category_id) {
        try {
            $sql = "SELECT id, name, category_id, path FROM presentations WHERE category_id = :category_id";
            $stmt = self::$db->getConnection()->prepare($sql);
            $stmt->execute(['category_id' => $category_id]);

            $presentations = array();
            while($row = $stmt->fetch(\PDO::FETCH_ASSOC)){
                $categoryFromDb = self::$categoryDao->getCategoryById($row['category_id']);
                $presentation = new Presentation($row["id"], $row["name"], $categoryFromDb->getName(), $row["path"]);
                $presentations[] = $presentation;
            } 
        } catch (\PDOException $e) {
            throw $e;
        }
        return $presentations;
    }

        
    public function save($name, $categoryId, $path){
        try{
            $sql = "INSERT INTO presentations (name, category_id, path)
            VALUES (?, ?, ?);";
            $stmt = self::$db->getConnection()->prepare($sql);
            $stmt->execute(array($name, $categoryId, $path));

            $presentationId = self::$db->getConnection()->lastInsertId();
        } catch(\PDOException $e){
            throw $e;
        }
        
        return $presentationId;
    }
}
