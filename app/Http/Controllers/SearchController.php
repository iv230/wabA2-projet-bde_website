<?php

namespace App\Http\Controllers;

use App\Events;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    public function search(){

        $input = 'cinema chezmoi';
        $events = Events::query()->whereRaw("`name` LIKE '%" . $input . "%'")->get();

        $names = [];

        foreach ($events as $event) {
            array_push($names, $event->name);
        }

        return json_encode($names);
    }
}
