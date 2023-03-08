<?php

/**
 * Category class
 */
class Category
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * Get all categories
     * @return object
     */
    public function getCategories()
    {
        $this->db->query("SELECT c.Name AS category_name, COUNT(icr.ItemNumber) AS item_count
                                FROM category c
                                LEFT JOIN Item_category_relations icr ON c.Id = icr.categoryId
                                GROUP BY c.Name
                                ORDER BY COUNT(icr.ItemNumber) DESC;");
        return $this->db->resultSet();
    }

    /**
     * Get all categories with subcategories
     * @return object
     */
    public function getCategoriesWithSubcategory()
    {

        $this->db->query("SELECT c.Id, c.Name, p.Name AS ParentCategory, p.Id as parent_id, COUNT(icr.ItemNumber) AS item_count 
                            FROM category c LEFT JOIN catetory_relations cr ON c.Id = cr.categoryId 
                            LEFT JOIN category p ON cr.ParentcategoryId = p.Id 
                            LEFT JOIN Item_category_relations icr ON c.Id = icr.categoryId
                            GROUP BY c.Name ORDER BY c.Id;");
        return $this->db->resultSet();
    }
}