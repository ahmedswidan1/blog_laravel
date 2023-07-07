<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Apply the default authentication middleware
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image' => $imageName,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }


    public function index()
    {
        // Only allow admin users to access the dashboard
        if (auth()->user()->isAdmin()) {
            return view('dashboard');
        } else {
            abort(403); // Return a forbidden error if the user is not an admin
        }
    }

    public function showPasswordForm()
    {
        return view('admin.password');
    }


    public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:8|confirmed',
    ]);

    $user = Auth::user();

    // Verify the current password
    if (Hash::check($request->current_password, $user->password)) {
        // Update the password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'Password updated successfully.');
    }

    return back()->withErrors(['current_password' => 'Incorrect current password.']);
}
}
