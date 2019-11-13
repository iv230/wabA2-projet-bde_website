<?php

namespace App\Http\Controllers;

use App\Gestion\APIRequestGestion;
use App\Gestion\UserAuthApiGestion;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use mysql_xdevapi\Exception;

class UserController extends Controller
{
    private $token;

    public function __construct()
    {
        try
        {
            $this->token = UserAuthApiGestion::authenticate();

            if($this->token == null)
                throw new Exception('Couldn\'t get token');
        }
        catch(\Exception $e)
        {
            echo $e->getMessage();
            exit();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $users = APIRequestGestion::get('/users', $this->token, null);
        foreach($users as $user)
        {
            echo $user->{'name'} . `<br/>`;
        }
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
        $user = new User();
        $user = $user->hydrate('App\User', APIRequestGestion::get('/users', $this->token, array('id' => $id))[0]);

        return view('test', array('user' => $user));
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
}
