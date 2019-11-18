<?php

namespace App\Repositories;

use App\ToContain;

class ToContainRepository
{

    protected $contain;

    public function __construct(ToContain $contain)
    {
        $this->contain = $contain;
    }

    private function save(ToContain $contain, Array $inputs1, Array $inputs2)
    {
        $contain->articleId = $inputs1['id'];
        $contain->basketId = $inputs2['id'];
        $contain->save();
    }

    public function store(Array $inputs1, Array $inputs2)
    {
        $contain = new $this->contain;
        $contain->articleId = $inputs1['id'];
        $inputs2['id'] = NULL;
        $this->save($contain, $inputs1, $inputs2);
        return $contain;
    }

    public function getById($id)
    {
        return $this->contain->findOrFail($id);
    }
    public function update($id, Array $inputs1, Array $inputs2)
    {
        $this->save($this->getById($id), $inputs1, $inputs2);
    }
    public function destroy($id)
    {
        $this->getById($id)->delete();
    }
}
?>
