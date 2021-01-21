<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserCreateRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::query()->latest()->paginate();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(UserCreateRequest $request)
    {
        User::create($request->only([
            'name',
            'email',
            'password',
        ]));

        return redirect()->route('admin.users.index')->with('success', '保存成功');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit',  compact('user'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user->fill($request->only([
            'name',
            'email',
        ]));
        if ($request->input('password')) {
            $user->password = $request->input('password');
        }
        $user->save();

        return back()->with('success', '保存成功');
    }
}
