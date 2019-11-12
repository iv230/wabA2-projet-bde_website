<?php

namespace App\Repositories;

use App\Category;

class CategoryRepository
{

    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    private function save(Category $category, Array $inputs)
    {
        $category->name = $inputs['name'];
        $category->description = $inputs['description'];
        $category->price = $inputs['price'];
        $category->image = $inputs['image'];
        $category->purchaseNumber = 0;
        $category->stock = 1;
        $category->save();
    }

    public function store(Array $inputs)
    {
        $category = new $this->category;
        $category->name = $inputs['name'];
        $category->description = $inputs['description'];
        $category->price = $inputs['price'];
        $category->image = $inputs['image'];
        $category->purchaseNumber = 0;
        $category->stock = 1;
        $this->save($category, $inputs);
        return $category;
    }

    public function getById($id)
    {
        return $this->category->findOrFail($id);
    }
    public function update($id, Array $inputs)
    {
        $this->save($this->getById($id), $inputs);
    }
    public function destroy($id)
    {
        $this->getById($id)->delete();
    }
}
?>