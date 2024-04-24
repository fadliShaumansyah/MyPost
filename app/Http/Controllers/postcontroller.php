<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use App\Models\user;
use App\Models\kategori;


class postcontroller extends Controller
{
    public function index(){
        //
        // $posts = post::latest();
        // if(request('search')){
        //     $posts->where('title','like','%'.request('search').'%')
        //     ->orWhere('body','like', '%'.request('search').'%');
        // }
        $title='';
        if(request('kategori')){
            $kategori=kategori::firstWhere('slug', request('kategori'));
            $title='In '. $kategori->nama;
        }
        if (request('author')){
            $author=user::firstWhere('userName', request('author'));
            $title='By '. $author->name;
        }
        //mencoba fitur pagination :)
        return view('post', [
            "title"=>"Post Terbaru ". $title,
            'active'=>'post',
            //method with() untuk eager loading, menghindari n+1
            //withQueryString() ketika sedang search dan kita next ke halaman selanjutnya maka seacr pada pagination halama selanjutnya akan di reset, dengan method ini akan membawa string sebelumnya jadi tidak akan di reset.
            "post"=>post::latest()->filter(request(['search','kategori','author']))->paginate(10)->withQueryString()
        ]);
    }

    public function show(post $posts){
        return view('posts', [
            "title"=>"single post",
            "active"=>"posts",
            "post"=> $posts    
        ]);
    }
}
