<?php 

interface BaseInterface
{
    public function getAll();
    public function getById($id);
    public function create($model);   
    public function update($model);
    public function delete($id);
}

?>