<?php
// require_once 'BaseInterface.php';

// interface CategoryInterface extends BaseInterface
// {
//     public function getAllTypes(); // For dropdown
// }

interface CategoryInterface {
    public function create(CategoryModel $category);
    public function getAll();
    public function getById($id);
    public function update(CategoryModel $category);
    public function delete($id);
}

?>