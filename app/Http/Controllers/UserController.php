<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole(1) || Auth::user()->hasRole(18)) {
            $users = User::paginate(15);
            return view('user.index', compact('users'));
        }
        return view('not-authorize');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->hasRole(1) || Auth::user()->hasRole(19)) {
            return view('user.create');
        }
        return view('not-authorize');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'password' => 'required']);

        $user = User::create(['name' => $request->name, 'email' => $request->name, 'password' => bcrypt($request->password)]);
        $user->roles()->sync($request->roles);

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->hasRole(1) || Auth::user()->hasRole(20)) {
            $user = User::find($id);
            return view('user.edit', compact('user'));
        }
        return view('not-authorize');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->hasRole(1) || Auth::user()->hasRole(20)) {
            $user = User::find($id);
            return view('user.edit', compact('user'));
        }
        return view('not-authorize');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['name' => 'required']);

        $user = User::find($id);
        $user->update(['name' => $request->name, 'email' => $request->name, 'password' => bcrypt($request->password)]);

        $user->roles()->sync($request->roles);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('user.index');
    }
}
