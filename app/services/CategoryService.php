<?php

require_once __DIR__ . '/../repositories/CategoryRepository.php';

class CategoryService
{
    private $repo;

    public function __construct(CategoryRepository $repo)
    {
        $this->repo = $repo;
    }

    public function list()
    {
        return $this->repo->getAll();
    }

    public function find($id)
    {
        return $this->repo->getById($id);
    }

    public function create(array $request)
    {
        $category = new CategoryModel();
        $category->setName($request['name']);
        $category->setDescription($request['description']);
        $category->setTypeId($request['type_id']);
        return $this->repo->create($category);
    }

    public function update(array $request)
    {
        $category = new CategoryModel();
        $category->setId($request['id']);
        $category->setName($request['name']);
        $category->setDescription($request['description']);
        $category->setTypeId($request['type_id']);
        return $this->repo->update($category->getId(), $category->toArray());
    }

    public function delete($id)
    {
        return $this->repo->delete($id);
    }

    public function getTypes()
    {
        return $this->repo->getAllTypes();
    }
}

?>