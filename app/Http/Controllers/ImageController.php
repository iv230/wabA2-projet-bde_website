<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ImageRepository;

class ImageController extends Controller
{
    protected $repository;
    
    public function __construct(ImageRepository $repository)
    {
        $this->repository = $repository;
    }
}

?>