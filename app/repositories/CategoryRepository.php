<?php

require_once __DIR__ . '/../contracts/CategoryInterface.php';

class CategoryRepository implements CategoryInterface
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAll()
    {
        return $this->db->readAll('vw_categories_type');
    }

    public function getById($id)
    {
        return $this->db->getById('categories', $id);
    }

    public function create(CategoryModel $category)
    {
        return $this->db->create('categories', $category->toArray());
    }

    public function update(CategoryModel $category)
    {
        return $this->db->update('categories', $category->getId(), $category->toArray());
    }

    public function delete($id)
    {
        return $this->db->delete('categories', $id);
    }

    public function getAllTypes()
    {
        return $this->db->readAll('types');
    }
}

?>