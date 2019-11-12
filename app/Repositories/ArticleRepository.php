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
        $article->image = $inputs['image'];
        $article->purchaseNumber = 0;
        $article->stock = 1;
        $article->save();
    }

    public function store(Array $inputs)
    {
        $article = new $this->article;
        $article->name = $inputs['name'];
        $article->description = $inputs['description'];
        $article->price = $inputs['price'];
        $article->image = $inputs['image'];
        $article->purchaseNumber = 0;
        $article->stock = 1;
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