<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use App\Level;

class UserController extends Controller
{
    public function index($level)
    {
    	$level_id = Level::where('name', $level)->first()->id;
    	$users = User::where('level_id', $level_id)->paginate(10);

    	return view('admin.users.index', compact('users'));
    }

    public function create()
    {
    	$levels = Level::where('name', '!=', 'admin')->get();
    	return view('admin.users.create', compact('levels'));
    }

    public function store(UserRequest $request)
    {
    	$user = User::create([
    		'name' => $request->name,
    		'username' => $request->username,
    		'password' => bcrypt(str_slug($request->username)),
    		'level_id' => $request->level
    	]);

    	$level = Level::find($user->level_id)->name;

    	return redirect()->route('user.index', $level)->withSuccess('Akun user telah dibuat.');
    }

    public function edit(User $user)
    {
        $levels = Level::where('name', '!=', 'admin')->get();
        return view('admin.users.edit', compact('user', 'levels'));
    }

    public function update(UserRequest $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt(str_slug($request->username)),
            'level_id' => $request->level
        ]);

        $level = Level::find($user->level_id)->name;

        return redirect()->route('user.index', $level)->withSuccess('Akun user telah diupdate.');
    }

    public function destroy(User $user)
    {
        $level = Level::find($user->level_id)->name;
        $delete = $user->delete();
        return redirect()->route('user.index', $level)->withSuccess('Akun user telah dihapus.');
    }
}
