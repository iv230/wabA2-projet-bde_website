<?php

namespace App\Repositories;

use App\Basket;

class BasketRepository
{

    protected $basket;

    public function __construct(Basket $basket)
    {
        $this->basket = $basket;
    }

    private function save(basket $basket, Array $inputs)
    {
        $basket->userId = $inputs['userId'];
        $basket->save();
    }

    public function store(Array $inputs)
    {
        $basket = new $this->basket;
        $basket->userId = $inputs['userId'];
        $this->save($basket, $inputs);
        return $basket;
    }

    public function getById($id)
    {
        return $this->basket->findOrFail($id);
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