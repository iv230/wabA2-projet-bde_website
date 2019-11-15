<?php

namespace App\Repositories;

use App\Article;

class ArticleRepository
{

    protected $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    private function save(Article $article, Array $inputs)
    {
        $article->name = $inputs['name'];
        $article->description = $inputs['description'];
        $article->price = $inputs['price'];
        $article->categoryId = $inputs['category'];
        $article->save();
    }

    public function store(Array $inputs)
    {
        $article = new $this->article;
        $article->name = $inputs['name'];
        $article->description = $inputs['description'];
        $article->price = $inputs['price'];
        $article->categoryId = $inputs['category'];
        $this->save($article, $inputs);
        return $article;
    }

    public function getById($id)
    {
        return $this->article->findOrFail($id);
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