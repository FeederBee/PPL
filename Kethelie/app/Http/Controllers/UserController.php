<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;

use Illuminate\Database\QueryException;
  
class UserController extends Controller
{
    public function register()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('auth.register', compact('user'));
        } else {
            //pass
        }
        return view('auth.register');
    }
  
    public function registerSave(Request $request)
    {
        
        Validator::make($request->all(), [
            'nama' => 'required',
            'umur' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'status' => "required",
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|max:12'
            
        ])->validate();

        User::create([
            'nama' => $request->nama,
            'umur' => $request-> umur,
            'jenis_kelamin' => $request-> jenis_kelamin,
            'no_hp' => $request-> no_hp,
            'alamat' => $request-> alamat,
            'status' => $request->status,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        // Jika operasi penyimpanan berhasil, lakukan tindakan selanjutnya
        return redirect()->route('login');        
    }
  
    public function login()
    {
        return view('auth/login');
    }
  
    public function loginAction(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();
  
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }
  
        $request->session()->regenerate();
  
        return redirect()->route('dashboard');
    }
  
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
  
        $request->session()->invalidate();
  
        return redirect('/');
    }
 
    public function profile()
    {
        return view('profile.profile');
    }

    public function show()
    {
        $user = Auth::user();
        return view('profile.profile', compact('user'));
    }

    public function update(Request $request)
    {
        // 
        $user = Auth::user();
        $UserValid = $request->validate([
            'nama' => 'required',
            'umur' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'image'=> 'image|mimes:jpeg,png,jpg,gif|max:3024',
            'password' => 'required|confirmed|max:12'
            //
        ]);

        if ($request->file('image')) {
            $UserValid['image']= $request->file('image')->store('user-images');
        } else {
            
        }

        $user->update($UserValid);
        return redirect()->route('profile');
    }
}