<?php

namespace App\Http\Controllers;

use App\Repositories\BasketRepository;
use App\Repositories\ToContainRepository;
use App\ToContain;
use Illuminate\Http\Request;
use App\PublicArticles;
use App\Article;
use App\Basket;
use App\Category;

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
        $category = Category::find($article->categoryId);
        return view('shop.show', array('article' => $article, 'category' => $category));
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

    public function addToCart($id)
    {
        $article = Article::all();
        /*$baskets = Basket::all();*/
        $basket = Basket::where('userId', '=', session('user'));
        if(! isset($basket))
        {
            $this->basketRepository->store();
            $this->containRepository->store($article->find($id), $baskets->where('userId', session('user'))->get());
        }
        /*$contain = ToContain::where('basketId', $basket->id)->where('articleId', $article->id)->get();
        $this->containRepository->update($contain->id, $article->all(), $baskets->where('userId', session('user'))->get());
        $articles = Article::find($contain->articleId);
        return view('basket.index', array('articles' => $articles));*/
    }
}
