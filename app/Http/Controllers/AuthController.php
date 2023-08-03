<?php

namespace App\Http\Controllers;

use App\Http\Requests\CredentialRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function showLogin()
    {
        return view('auth.login');
    }

    public function authenticateLogin(CredentialRequest $request)
    {
        //get all validated cridentials
        $credentials = $request->validated();

        if(Auth::attempt($credentials))
        {
            return redirect()->route('dashboard')->with('message', ucfirst(Auth::user()->username).' have successfully logged in!');
        }
        //show error if incorrect cridentials
        return back()->withErrors(['invalid' => 'Incorrect Username or Password.',])->onlyInput('username');
    } 

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', "you have been logged out!");
    }
    public function index()
    {
        $users = User::all();
        return view('auth.userList',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.userAdd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate all inputs
        $userInfo = $request->validate([
            'username' => ['required', 'string', 'max:10', 'regex:/^[a-zA-Z]+$/u', Rule::unique("users", "username")],
            'password' => 'required|min:10'
        ]);

        $userInfo['password'] = bcrypt($userInfo['password']);
        //insert new User to the DB
        $user = User::create($userInfo);
        //check if a user is not login
        if(!Auth::check()){
            return redirect()->route('login');
        }
        //redirect to user list if a user is login
        return redirect()->route('userList')->with('message', 'User '.$user->username.' Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //find user base on id
        $user = User::findOrFail($id);
        return view('auth.userInfo',['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        //find User base on id
        $user = User::findOrFail($id);
        //delete user on the DB
        $user->delete();
        return redirect()->route('userList')->with('message', 'User Deleted Successfully');
    }
}
