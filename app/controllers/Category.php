<?php

class Category extends Controller
{
    private $service;

    public function __construct()
    {
        require_once __DIR__ . '/../services/CategoryService.php';
        require_once __DIR__ . '/../repositories/CategoryRepository.php';
        require_once __DIR__ . '/../contracts/CategoryInterface.php';

        $repo = new CategoryRepository();
        $this->service = new CategoryService($repo);
    }

    public function index()
    {
        $categories = $this->service->list();
        $this->view('category/table', ['categories' => $categories]);
    }

    public function create()
    {
        $types = $this->service->getTypes();
        $this->view('category/create', ['types' => $types, 'index' => 'category']);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->service->create($_POST);
            setMessage('success', 'Create successful!');
            redirect('category');
        }
    }

    public function edit($id)
    {
        $category = $this->service->find($id);
        $types = $this->service->getTypes();
        $this->view('category/edit', ['categories' => $category, 'types' => $types]);
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->service->update($_POST);
            setMessage('success', 'Update successful!');
            redirect('category');
        }
    }

    public function destroy($id)
    {
        $this->service->delete(base64_decode($id));
        redirect('category');
    }
}
