<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile');
    }

    // View Edit Profile With Compact Data
    public function edit()
    {
        $userId = Auth::id();
        $users = User::findOrFail($userId);
        return view('admin.profile-edit', compact('users'));
    }

    // Update Data
    public function update(Request $request)
    {
        try {
            $userId = Auth::id();
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,'. $userId,
                'password' => 'required|string|min:5',
                'confirmPassword' => 'required|string|same:password',
            ]);
            $user = User::findOrFail($userId);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->save();
            return response()->json(['success' => 'User updated successfully']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
