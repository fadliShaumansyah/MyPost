<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// jika menggunakan hash untuk enkripsi pswd panggil facades
//use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('Register.index',[
            'title'=>'Register',
            'active'=>'Register'
        ]);
    }

    public function store(request $request){
      $validatedData = $request->validate([
            'name'=>'required|max:255',
            'username'=>['required','min:3','max:255','unique:users'],
            'email'=>['required','email:rfc.dns','unique:users'],
            'password'=>'required|min:5|max:255'

        ]) ;
       //dd('registrasi berhasil');
       //enkripsi password dengan bcrypt
    //    $validatedData['password']=bcrypt($validatedData['password']);

        //enkripsi password dengan hash
    //    $validatedData['password']=hash::make($validatedData['password']);

    //kirim data ke database dengan variable validate
        User::create($validatedData);
            //berikan notifikasi ke user setelah registrasi
    //$request->session()->flash('success','Registration Succrssfull!, Please Login');
    //tampilkan halaman di bawah ini dan panggil notifikasi
        return redirect ('/Login')->with('success','Registration SuccessFull! Please Login');

        

        
    }
}
