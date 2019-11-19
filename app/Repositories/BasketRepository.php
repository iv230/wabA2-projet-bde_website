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

    private function save(basket $basket)
    {
        $basket->userId = session('user');
        $basket->save();
    }

    public function store()
    {
        $basket = new $this->basket;
        $basket->userId = session('user');
        $this->save($basket);
        return $basket;
    }

    public function getById($id)
    {
        return $this->basket->findOrFail($id);
    }
    public function update($id)
    {
        $this->save($this->getById($id));
    }
    public function destroy($id)
    {
        $this->getById($id)->delete();
    }
}
?>
