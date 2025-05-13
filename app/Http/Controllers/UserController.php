<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|unique:users',
            'name' => 'required',
            'position' => 'required',
            'number_phone' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:6'
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['role'] = 'member';

        User::create($validated);

        return redirect()->route('admin.users.index')
            ->with('success', 'Anggota berhasil ditambahkan');
    }

    /**
     * Display the specified user.
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
       

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user)
{
  
    $validated = $request->validate([
        'nik' => 'required|unique:users,nik,' . $user->id,
        'name' => 'required',
        'position' => 'required',
        'number_phone' => 'required',
        'username' => 'required|unique:users,username,' . $user->id,
        'password' => 'nullable|min:6',
        'role' => 'required|in:admin,member', 
    ]);

   
    if (isset($validated['password'])) {
        $validated['password'] = Hash::make($validated['password']);
    } else {
        unset($validated['password']); 
    }

   
    if (auth()->user()->id === $user->id && $validated['role'] === 'member') {
        return redirect()->route('admin.users.index')
            ->with('error', 'Maaf anda tidak bisa mengganti role anda ke member.');
    }

    
    $user->update($validated);

    
    return redirect()->route('admin.users.index')
        ->with('success', 'Data anggota berhasil diperbarui');
}




    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
{
    
    if ($user->role === 'admin') {
        return redirect()->route('admin.users.index')
            ->with('error', 'Tidak dapat menghapus admin');
    }

    
    if ($user->transactions()->where('status', 'ongoing')->exists()) {
        return redirect()->route('admin.users.index')
            ->with('error', 'Tidak dapat menghapus anggota yang memiliki peminjaman aktif');
    }

    
    $user->delete();

    return redirect()->route('admin.users.index')
        ->with('success', 'Anggota berhasil dihapus');
}

}
