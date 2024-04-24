<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class post extends Model
{
    use HasFactory, Sluggable;
    //fillable yang boleh di isi
    //protected $fillable=['title', 'excerpt','body'];

    //guarder yang tidak boleh di isi
    protected $guarded=['id'];
    //
    protected $with =['kategori','author'];

    public function scopeFilter($query, array $filters){
        //menggunakan isset
        // if(isset($filters['search']) ? $filters['search']: false ){
        //    return $query->where('title','like','%'.$filters['search'].'%')
        //     ->orWhere('body','like', '%'.$filters['search'].'%'); 
        // }
            //menggunakan callback
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('title','like','%'.$search.'%')
                     ->orWhere('body','like', '%'.$search.'%');
        });

        //metode pencarian yang lebih spesifik ...
        //di eksekusi dulu yang atas kalau tidak ada maka di eksekusi yang bawah ini, kalau ada dua duanya maka akan tampil dua duanya.
        //nul koalesing operator ?? saat kita butuh tenari dan juga cek iset

        $query->when($filters['kategori'] ?? false, function($query, $kategori){
            return $query->whereHas('kategori', function($query) use ($kategori){
                $query->where('slug',$kategori);
            });
        });
       //menggunakan arrow function
        $query->when($filters['author'] ?? false, fn($query, $author)=> $query->whereHas('author', fn($query) =>
                    $query->where('userName',$author)
            )
        );

        
    }

    public function kategori()
    {
        return $this->belongsTo(kategori::class);
    }
   
    public function author(){
         //mengganti alias user_id dengan author
        return $this->belongsTo(user::class,'user_id');
    }

    public function getRouteKeyName(){
        //merubah/menampilkan slug sebagai pengganti id
        return'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
   
}
