<?php

namespace App\Http\Controllers;

use App\Mail\UserCredentialMail;
use App\Models\Role;
use Illuminate\Http\Request;
use App\models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Exception;

class UserController extends Controller
{
    public function index()
    {
        try{$users = User::all();
        return view('admin.user.index')->with(compact('users'));
    }catch(Exception $e) {
        Log::error($e->getMessage());  
        return redirect()->back()->withErrors('Oops! Error Occured. Please Try Again Later.');   
    }
    }


    public function create()
    {
        try{$users = User::all();
        $roles = Role::all();
        return view('admin.user.create')->with(compact('users', 'roles'));
    }catch(Exception $e) {
        Log::error($e->getMessage());  
        return redirect()->back()->withErrors('Oops! Error Occured. Please Try Again Later.');   
    }
    }

    public function store(Request $request)
    {
        try{$request->validate([
            'name' => [
                'required',
                'regex:/^[A-Za-z\s]+$/',
                'max:255',
                Rule::unique('users', 'name'),
            ],
            'email' => 'required|email|unique:users',
            'role' => 'required',
        ]);

        $user = new User;
        $user->name = trim($request->input('name'));
        $user->email = trim($request->input('email'));
        $user->password = bcrypt('password2@23');
        $user->save();
        $roles = $request->input('role');
        $user->roles()->sync($roles);

        Mail::to($user->email)->send(new UserCredentialMail($user, [Role::select('role')->where('id', $request->role)->first()->role]));

        return redirect(route('user.index'))->with('success', 'User Successfully Created');
    }catch(Exception $e) {
        Log::error($e->getMessage());  
        return redirect()->back()->withErrors('Oops! Error Occured. Please Try Again Later.');   
    }
    }

    public function edit($id)
    {
        try{$users = User::find($id);
        $roles = Role::all();
        return view('admin.user.edit', compact('users', 'roles'));
    }catch(Exception $e) {
        Log::error($e->getMessage());  
        return redirect()->back()->withErrors('Oops! Error Occured. Please Try Again Later.');   
    }
    }

    public function update(Request $request, $id)
    {
       try{ $users = User::find($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $users->id,
            'role' => 'required',
        ]);
        $users->name = trim($request->input('name'));
        $users->email = trim($request->input('email'));
        $users->save();
        $roles = $request->input('role', []);
        $users->roles()->sync($roles);

        return redirect(route('user.index'))->with('success', 'User Successfully Updated');
    }catch(Exception $e) {
        Log::error($e->getMessage());  
        return redirect()->back()->withErrors('Oops! Error Occured. Please Try Again Later.');   
    }
    }

    public function delete($id)
    {
        try{$users = User::find($id);
        $users->roles()->detach();
        $users->delete();
        return redirect(route('user.index'))->with('success', 'User Successfully Deleted');
    }catch(Exception $e) {
        Log::error($e->getMessage());  
        return redirect()->back()->withErrors('Oops! Error Occured. Please Try Again Later.');   
    }
    }
}
