<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;

class userdatacontroller extends Controller
{
    public function index()
    {
        if (session('isAdmin')) {
            $users = User::all(); // Fetch all users from the database
            return view('userdata', compact('users'));
        } else {
            abort(403, 'Unauthorized');
        }
    }

    public function destroy($id)
    {
        if (session('isAdmin')) {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->back()->with('success', 'User deleted successfully.');
        } else {
            abort(403, 'Unauthorized');
        }
    }
    
    public function edit($id)
    {
        if (session('isAdmin')) {
            $user = User::findOrFail($id);
            return view('useredit', compact('user'));
        } else {
            abort(403, 'Unauthorized');
        }
    }

    public function update(Request $request, $id)
    {
        if (session('isAdmin')) {
            $user = User::findOrFail($id);
            
            // Validate the request data
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,'.$user->id,
                'admin' => 'required|integer',
                // Add more validation rules as needed
            ]);

            // Update the user's data
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->admin = $request->input('admin');
            // Update other fields as needed

            $user->save();

            return redirect()->route('user.edit', $user->id)->with('success', 'User updated successfully.');
        } else {
            abort(403, 'Unauthorized');
        }
    }

}