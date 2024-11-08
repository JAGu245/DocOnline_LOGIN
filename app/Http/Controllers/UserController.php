<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Filter pengguna berdasarkan pencarian
        $users = User::query()
                    ->when($search, function ($query, $search) {
                        return $query->where('nik', 'like', "%{$search}%")
                                    ->orWhere('name', 'like', "%{$search}%");
                    })
                    ->get();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|regex:/^\d{4}-\d{4}$/|unique:users',
            'name' => 'required',
            'password' => 'required|min:8',
            'role_id' => 'required|exists:roles,id',
        ]);

        User::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'nik' => 'required|unique:users,nik,' . $user->id,
            'name' => 'required',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user->update([
            'nik' => $request->nik,
            'name' => $request->name,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil diubah.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }

}

