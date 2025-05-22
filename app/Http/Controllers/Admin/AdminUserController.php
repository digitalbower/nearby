<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Admin::with('role')
            ->whereIn('user_role_id', [2, 3])
            ->latest()
            ->get();

        return view('admin.users.index')->with(['users' => $users]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
         return view('admin.users.create')->with(['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:6|confirmed',
            'user_role_id' => 'required',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password); 
        Admin::create($data); 
        return redirect()->route('admin.users.index')->with('success', 'New Admin User created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $user)
    {
        $roles = Role::all();
        return view('admin.users.edit')->with(['user'=>$user,'roles'=>$roles]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $user)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'nullable|string|min:6|confirmed',
            'user_role_id' => 'required',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $user->update($data); 
        return redirect()->route('admin.users.index')->with('success', ' Admin User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Admin $user)
    {
        $user->delete(); 
        return redirect()->route('admin.users.index')->with('success', ' Admin User deleted successfully!');

    }
}
