<?php

namespace App\Http\Controllers;

use App\ApiModelHydrator;
use App\Gestion\APIRequestGestion;
use App\Gestion\UserAuthApiGestion;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRequest;
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
        $users = ApiModelHydrator::hydrateAll('App\User', APIRequestGestion::get('/users', $this->token, null));

        return view('users.index', array('users' => $users));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = ApiModelHydrator::hydrateAll('App\School', APIRequestGestion::get('/schools', $this->token, null));
        return view('users.creation', array('schools' => $schools));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $params = array_merge($request->all(), array('role' => 1));
        $params['passwordHash'] = password_hash($params['passwordHash'], PASSWORD_BCRYPT);

        $users = APIRequestGestion::post('/users', $this->token, $params);

        return redirect('users');
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
        $user = ApiModelHydrator::hydrate('App\User', APIRequestGestion::get('/users', $this->token, array('id' => $id))[0]);

        return view('users.show', array('user' => $user));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = new User();
        $user = ApiModelHydrator::hydrate('App\User', APIRequestGestion::get('/users', $this->token, array('id' => $id))[0]);

        $schools = ApiModelHydrator::hydrateAll('App\School', APIRequestGestion::get('/schools', $this->token, null));

        return view('users.edit', array('user' => $user, 'schools' => $schools));
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
        $params = $request->all();
        unset($params['_token']);
        unset($params['_method']);

        APIRequestGestion::put('/users?id=' . $id, $this->token, $params);

        return redirect('/users/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        APIRequestGestion::delete('/users', $this->token, array('id' => $id));

        return redirect('/logout');
    }

    public function login()
    {
        return view('users.connection');
    }

    public function connect(UserLoginRequest $request)
    {
        $params = array('email' => $request->input('email'));
        $user = ApiModelHydrator::hydrate('App\User', APIRequestGestion::get('/users', $this->token, $params)[0]);

        if(password_verify($request->input('passwordHash'), $user->passwordHash))
        {
            session(['user'     => $user->id]);
            session(['username' => $user->name]);
            session(['role'     => $user->role]);
            return redirect('/users');
        }
        else
        {
            return redirect('/login')->withErrors(array('password' => 'Password and email don\'t match'));
        }
    }

    public function logout(Request $request)
    {
        if($request->session()->has('user'))
            $request->session()->forget('user');

        return redirect('users');
    }
}
