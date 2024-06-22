<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user');
    }

    // Read Data
    public function read()
    {
        $data = User::select(['id', 'name', 'email', 'status'])->get();
        return Datatables::of($data)->addIndexColumn()->make(true);
    }

    // Delete Data
    public function destroy($id)
    {
        $position = User::find($id);
        if (!$position) {
            return response()->json(['message' => 'User not found.'], 404);
        }
        $position->delete();
        return response()->json(['message' => 'User deleted successfully.']);
    }

    // Update Data
    public function update(Request $request)
    {
        try {
            $userId = Auth::id();
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'password' => 'required|string|min:5',
                'status' => 'required|in:Active,Inactive',
            ]);
            $user = User::findOrFail($request->id);
            if ($userId === $user->id) {
                return response()->json(['message' => 'You cannot edit your own data.'], 403);
            }
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->status = $request->status;
            $user->save();
            return response()->json(['success' => 'User updated successfully']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
