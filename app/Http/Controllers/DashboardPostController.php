<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\kategori;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        return view('dashboard.posts.index',[
            'posts'=> Post::where('user_id',auth()->user()->id)->get()
        ]);
   }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('dashboard.posts.create',[
            'kategoris'=> kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'=>'required|max:255',
            'slug'=> 'required|unique:posts',
            'kategori_id'=>'required',
            'images'=>'image|file|max:1024',
            'body'=>'required'

        ]);

        if($request->file('images')){
            $validatedData['images']=$request->file('images')->store('post-images');
        }

        $validatedData['user_id']= auth()->user()->id;
        $validatedData['excerpt']=Str::limit(strip_tags($request->body,100));

        post::create($validatedData);
        return redirect('/dashboard/posts')->with('success',' New Post Hasben Added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
     //menampilkan detail tiap post tanpa membuate route karena sudah di handle resource
        return view('dashboard.posts.show',[
            'post'=>$post
        ]);
     }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        return view ('dashboard.posts.edit',[
            'post'=>$post,
            'kategoris'=> kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post)
    {
        //membuat rules 
        $rules = [
            'title'=>'required|max:255',
            'kategori_id'=>'required',
            'images'=>'image|file|max:1024',
            'body'=>'required'

        ];
       
      
        //mengkondisikan slug saat update karena slug itu unique
        if($request->slug != $post->slug){
            $rules['slug']='required|unique:posts';
        }
        //memvalidasi ata
        $validatedData = $request->validate($rules);
        if($request->file('images')){
            if ($request->oldimages){
                Storage::delete($request->oldimages);
            }
            $validatedData['images']=$request->file('images')->store('post-images');
        }
        $validatedData['user_id']= auth()->user()->id;
        $validatedData['excerpt']=Str::limit(strip_tags($request->body,100));

        post::where('id',$post->id)
        ->update($validatedData);
        return redirect('/dashboard/posts')->with('success',' Post Hasben Updated.');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
       
        post::destroy($post->id);
        if ($post->images){
            Storage::delete($post->images);
        }
        return redirect('/dashboard/posts')->with('success',' Post Hasben Delete.');

    }
    public function checkSlug(request $request)
    {
        $slug= SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug'=>$slug]);
    }
}
