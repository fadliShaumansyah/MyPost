<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\post;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AdminKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('dashboard.kategori.index',[
            'kategoris'=>kategori::all()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kategori.create',[
            'kategoris'=>kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama'=> 'required|unique:kategoris',
            'slug'=> 'required|unique:kategoris'
        ]);
        

        kategori::create($validatedData);
        return redirect('/dashboard/kategori')->with('success',' New Category Hasben Added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kategori $kategori)
    {
        
        return view ('dashboard.kategori.edit',[
            'kategoris'=> $kategori
        ]);

     
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kategori $kategori)
    {
       $rules=['nama'=>'required|unique:kategoris']; 
       
       //mengkondisikan slug saat update karena slug itu unique
       if($request->slug != $kategori->slug){
        $rules ['slug']='required|unique:kategoris';
        }
        if($request->nama != $kategori->nama){
            $rules ['nama']='required|unique:kategoris';
            }
    //memvalidasi ata
    $validatedData = $request->validate($rules);
    
    kategori::where('id',$kategori->id)->update($validatedData);
    return redirect('/dashboard/kategori')->with('success',' Kategori Hasben Updated.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kategori $kategori)
    {
        
        kategori::destroy($kategori->id);
        return redirect('/dashboard/kategori')->with('success',' Post Hasben Delete.');

    }

    public function checkSlug(request $request)
    {
        $slug= SlugService::createSlug(kategori::class, 'slug', $request->nama);
        return response()->json(['slug'=>$slug]);
    }


}
