<?php

namespace App\Http\Controllers;

use App\Http\Request\LikeRequest;
use App\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Creates a like on an event
     *
     * @param LikeRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function likeEvent(LikeRequest $request) {
        $id_event = $request->input('id_event');
        $id_user = $request->input('id_user');

        $like = new Like;
        $like -> id_event = $id_event;
        $like -> id_user = $id_user;
        $like -> save();

        return redirect('/publicevents/' . $id_event);
    }

    /**
     * Creates a like on an event, called from API
     *
     * @param $id_event
     * @return false|mixed|string
     */
    public function likeEventByApi($id_event) {
        $id_user = session('user');
        $code = '';

        if (!isset($id_user)) {
            $code = '401';
        } else {
            if (!self::hasLiked($id_event, $id_user)) {
                $like = new Like;
                $like -> id_event = $id_event;
                $like -> id_user = $id_user;
                $like -> save();

                $code = '200';
            } else {
                $code = '403';
            }
        }

        echo json_encode($code);
    }

    /**
     * Return the number of likes for an event
     *
     * @param $id_event
     * @return int
     */
    public function countLikes($id_event) {
        $likes = Like::where('id_event', $id_event)->get();
        return count($likes);
    }

    /**
     * Say if an user has liked a specific event
     *
     * @param $id_event
     * @param $id_user
     * @return bool
     */
    public function hasLiked($id_event, $id_user) {
        $likes = Like::whereRaw('id_event=' . $id_event . ' and id_user=' . $id_user)->get();
        return count($likes) > 0;
    }
}
