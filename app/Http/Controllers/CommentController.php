<?php

namespace App\Http\Controllers;

use App\Http\Request\DeleteCommentRequest;
use Illuminate\Http\Request;
use App\Http\Request\CommentRequest;
use App\Comment as Comment;
use App\Events as Events;


class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('DeleteCommentAuth')->only(['delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', array('comments' => $comments));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $comment = new Comment;
        $comment -> autor = $request -> input('autor');
        $comment -> comment_content = $request -> input('comment_content');
        $comment -> comment_date = date("Y-m-d H:i:s");
        $comment -> id_event = $request -> input('idevent');

        $comment -> save();

        return redirect('publicevents/'.$comment->id_event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);

        $id_event = $comment->id_event;

        $comment -> destroy($id);

        return redirect('/publicevents/' . $id_event);
    }
}
