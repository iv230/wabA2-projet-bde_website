<?php

namespace App\Http\Controllers;

use App\Repositories\BasketRepository;
use App\Repositories\ToContainRepository;
use App\ToContain;
use Illuminate\Http\Request;
use App\PublicArticles;
use App\Article;
use App\Basket;

class PublicArticlesController extends Controller
{
    protected $basketRepository, $containRepository;

    public function __construct(BasketRepository $basketRepository, ToContainRepository $containRepository)
    {
        $this->basketRepository = $basketRepository;
        $this->containRepository = $containRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('shop.index', array('articles' => $articles));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        return view('shop.show', array('article' => $article));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addtocart($id)
    {
        $article = Article::find($id);
        $baskets = Basket::all();
        $condition = True;
        foreach($baskets as $basket){
            if($basket->userId == session('user')){
                $condition = False;
                $contain = ToContain::where('basketId', $basket->id);
                break;
            }
        }
        if($condition) {
            $baskets = $this->basketRepository->store(session('user'));
            $contain = $this->containRepository->store($article->all(), $baskets->all());
        }
        $this->containRepository->update($contain->id, $article->all(), $baskets->all());
        return view('basket.index', array('article' => $article));
    }
}
